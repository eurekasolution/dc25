<?php
    if (isset($_POST["text"])) {
        $text = $_POST["text"];
    } else {
        $text = "충남대 충남대학교 인문대 인문대학 한문학과 국어국문학과";
    }
?>
<form method="post" action="index.php?cmd=ngram">
    <div class="row">
        <div class="col-10 colLine">
            <textarea class="form-control" name="text" rows="10"><?php echo htmlspecialchars($text); ?></textarea>
        </div>
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">분석</button>
        </div>
    </div>
</form>

<?php
if (isset($_POST["text"]) && $_POST["text"]) {
    $text = $_POST["text"];
    $text = preg_replace("/\n+/u", "\n", $text);
    $text = str_replace("/", "", $text);
    $text = preg_replace('/\s+/u', ' ', $text);
    $text = preg_replace("/[a-zA-Z0-9_]/u", "", $text);
    $words = preg_split("/[。，.,?\s()]/u", $text, -1, PREG_SPLIT_NO_EMPTY);

    $dict = [];

    for ($w = 0; $w < count($words); $w++) {
        $word = $words[$w];
        $chars = mb_strlen($word);
        for ($gram = 1; $gram <= 5; $gram++) {
            for ($pos = 0; $pos + $gram <= $chars; $pos++) {
                $subText = mb_substr($word, $pos, $gram);
                if (!isset($dict[$gram])) {
                    $dict[$gram] = [];
                }
                if (isset($dict[$gram][$subText])) {
                    $dict[$gram][$subText]++;
                } else {
                    $dict[$gram][$subText] = 1;
                }
            }
        }
    }

    // 내림차순 정렬 및 상위 20개 잘라내기
    for ($i = 1; $i <= 5; $i++) {
        if (isset($dict[$i])) {
            arsort($dict[$i]);
            $tempKeys = array_keys($dict[$i]);
            $tempVals = array_values($dict[$i]);
            $tempDict = [];
            for ($j = 0; $j < min(5000, count($tempKeys)); $j++) {
                $tempDict[$tempKeys[$j]] = $tempVals[$j];
            }
            $dict[$i] = $tempDict;
        } else {
            $dict[$i] = [];
        }
    }

    // 표 출력
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>순서</th>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<th>{$i}음절어</th><th>빈도</th>";
    }
    echo "</tr></thead><tbody>";

    for ($row = 0; $row < 5000; $row++) {
        echo "<tr><td>" . ($row + 1) . "</td>";
        for ($i = 1; $i <= 5; $i++) {
            $keys = array_keys($dict[$i]);
            $values = array_values($dict[$i]);
            if ($row < count($keys)) {
                echo "<td>{$keys[$row]}</td><td>{$values[$row]}</td>";
            } else {
                echo "<td></td><td></td>";
            }
        }
        echo "</tr>";
    }

    echo "</tbody></table>";


    // JSON 파일 생성을 위한 nodes, links 구성
    $nodes = [];
    $nodeSet = []; // 중복 방지
    $links = [];
    $linkMap = []; // 중복 링크 방지

    for ($n = 1; $n <= 5; $n++) {
        foreach ($dict[$n] as $ngram => $count) {
            if (!isset($nodeSet[$ngram])) {
                $nodes[] = ["id" => $ngram, "count" => $count];
                $nodeSet[$ngram] = $count;
            }

            // 이전 n-1 gram과 연결
            if ($n > 1) {
                $prefix = mb_substr($ngram, 0, $n - 1);
                if (isset($dict[$n - 1][$prefix])) {
                    $value = min($count, $dict[$n - 1][$prefix]);
                    $linkKey = $prefix . '→' . $ngram;
                    if (!isset($linkMap[$linkKey])) {
                        $links[] = [
                            "source" => $prefix,
                            "target" => $ngram,
                            "value" => $value
                        ];
                        $linkMap[$linkKey] = true;
                    }
                }
            }
        }
    }

    $jsonData = [
        "nodes" => $nodes,
        "links" => $links
    ];

    $jsonFile = "ngram.json";
    if (file_exists($jsonFile)) {
        unlink($jsonFile); // 기존 파일 삭제
    }
    file_put_contents($jsonFile, json_encode($jsonData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    echo "<p><strong>ngram.json 파일이 생성되었습니다.</strong></p>";

}
?>
