코드 실시간 확인

https://github.com/eurekasolution/dc25

https://w3schools.com
https://www.w3schools.com/bootstrap5

이메일 : nadopro@gmail.com

과제 1

index.php 파일에 학과, 학번, 이름 등을 출력해
웹 페이지를 스크린샷 해 제출

메일 제목 : DC#01한문학과-홍길동
첨부파일에 스크린샷해서, HWP파일에 넣기
HWP파일의 이름 : DC#01한문학과-홍길동.hwp
제출 마감 : 2025-03-09 23:59:59


1. download xampp
2. download visual code


강의영상 : http://naver.me/xOxTwV4g


KAKAO : 0afda05de8855f9286462ad89edf999d

36.368491, 127.342039

https://github.com/eurekasolution/cju-smart-home


Q1. 다음과 같은 홈페이지를 만들고 싶어.
HTML5와 Bootstrap5를 이용하고, PHP로 프로그래밍할거야.
index.php파일을 만들건데,
상단은 navbar를 이용해 드랍다운 메뉴를 만들거야.
navbar에는 홈, 메뉴1, 메뉴2가 있어.
메뉴1에는 메뉴1-1, 메뉴1-2로 구성되어있고
메뉴2에는 메뉴2-1, 메뉴2-2로 구성되어 있어.

몸체부분에는 index.php?cmd=값 형태에서
cmd가 만약 test이면
include "$cmd.php"를 수행하는데, 이때는 include "test.php"야.

만약에 $cmd가 없으면 $cmd="init"로 설정해줘.
바디 아래에는 사이트 정보를 출력하는데
"충남대학교 인문대학 한문학과"라고 출력해 줘.
그런데 Body부분의 내용이 너무 적을 떄는 사이트 정보를 화면의 
맨 아래에 배치하도록 해 줘.

Q2.

위 코드에서 다음을 추가하고 싶어.
메뉴와 몸체 사이에 로그인 기능을 넣고 싶어.
로그인이 안된 경우에는 아이디(name: id), 비밀번호 (name : pw)를 입력받고
로그인 버튼을 만들어줘.
버튼을 클릭하는 경우 index.php?cmd=login으로 이동해 줘.
로그인이 된 경우에는 "홍길동 님" 로그아웃 버튼을 만들어줘.
로그아웃버튼을 누르면 index.php?cmd=logout로 이동해 줘.

javascript:alert(document.cookie);

download burp suite


DATABASE

http://localhost/phpmyadmin

1. 데이터베이스를 만든다

    데이터베이스 이름 : cnu
    사용자 아이디 : cnu
    비밀번호 : 1111

2. 테이블을 만든다.

    create table first (
        id  char(20) unique,
        pass char(50),
        name char(20)
    );

    insert into first (id,pass, name) values ('test', '1111', '테스트');
    insert into first (id,pass, name) values ('admin', '1111', '관리자');
    
    create table users (
        idx     integer auto_increment primary key,
        id      char(20) unique,
        name    char(20),
        pass    char(50)
    );

    insert into users(id, name, pass) 
        values ('test', '테스트', '1111');
    insert into users(id, name, pass) 
        values ('kdhong', '홍길동', '1111');

    insert into users(id, name, pass) 
        values ('auth', '암호화', password('1111') );


PHP로 mysql에 접속하는 코드를 만들고 싶어.
function connectDB()를 정의하는데, mysqli()함수로 접속을 해.
db name : cnu
db user : cnu
db pass : 1111

성공하면 $conn 를 반환하도록 db.php파일을 만들어 줘



========================================================

<?php
    if(isset($_POST["text"]))
    {
        $text = $_POST["text"];
    }else
    {
        $text = "충남대 충남대학교 인문대 인문대학 한문학과 국어국문학과";
    }
?>
<form method="post" action="index.php?cmd=ngram">
    <div class="row">
        <div class="col-10 colLine">
            <textarea class="form-control" name="text" rows="10"><?php echo $text; ?></textarea>
        </div>
        <div class="col colLine">
            <button type="submit" class="btn btn-primary">분석</button>
        </div>
    </div>
</form>

<?php
    

    if(isset($_POST["text"]) and $_POST["text"])
    {
        $text = $_POST["text"];
        //$words = explode("。", $text);
        $text = preg_replace("/\n+/u", "\n", $text);
        
        $text = str_replace("/", "", $text);
        $text = preg_replace('/\s+/u', ' ', $text);

        $text = preg_replace("/[a-zA-Z0-9_가-힣]/u", "", $text);
        //$text = preg_replace("/[a-z0-9_]/u", "", $text);
        $words = preg_split("/[。,\s()]/u", $text, -1, PREG_SPLIT_NO_EMPTY);
        //echo "text = $text<br>";



        for($i=0; $i<count($words); $i++)
        {
            //echo "$i : $words[$i]<br>";
            $len = strlen($words[$i]);
            $chars = mb_strlen($words[$i]);
            // echo "len = $len, len2 = $len2<br>";

            for($gram = 1; $gram <= $chars; $gram ++)
            {
                //echo "$gram start<br>";

                for($pos = 0; $pos < $chars; $pos++)
                {
                    if($pos + $gram <= $chars)
                    {
                        $subText = mb_substr($words[$i], $pos, $gram);
                        //echo "$subText<br>";

                        if(isset($dict[$subText])) // 이미 사전에 있어?
                        {
                            $dict[$subText] ++;
                        }else
                        {
                            // 단어가 처음나오면 1회 출현
                            $dict[$subText] = 1;
                        }

                        //echo "$subText : $dict[$subText]<br>";
                    }
                    
                }
            }

        }

        arsort($dict);
        $count = count($dict);
        echo "종류 : $count<br>";

        foreach($dict as $key => $value)
        {
            echo "$key : $value <br>";
        }

    }
?>

textarea에 입력한 문장을 ngram 분석하는 코드를 위와 같이 만들었어.
이 프로그램을 수정해서 다음과 같이 개선하고 싶어.
$dict[음절수][출현단어] 형태로 정리하도록 변경하고 싶어.
그런다음 출력은 표 형태로 하고 싶어.
표의 열 정보는 다음과 같어.
순서, 1음절어, 1음절어 빈도, 2음절어, 2음절어 빈도, 3음절어, 3음절어 빈도 와 같이 
5음절까지만 필요해
표는 각 음절별로 내림차순으로 정렬하는데, 상위 20개만 있으면 돼.

위 코드를 조건과 같이 수정해 줘.


============================================================
코드를 확인한 후 조금 수정했어. 수정한 코드는 다음과 같아.
그런데 나는 반복문을 사용할 때, foreach()가 어색해서 
for()형태로 이 코드 전체를 수정하고 싶어.ㅣ
이를 반영해서 전체 코드를 다시 만들어 줘.

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

    foreach ($words as $word) {
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

    // 내림차순 정렬 및 상위 20개 자르기
    for ($i = 1; $i <= 5; $i++) {
        if (isset($dict[$i])) {
            arsort($dict[$i]);
            $dict[$i] = array_slice($dict[$i], 0, 20, true);
        } else {
            $dict[$i] = [];
        }
    }

    // 최대 20개의 행 기준으로 표 만들기
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>순서</th>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<th>{$i}음절어</th><th>빈도</th>";
    }
    echo "</tr></thead><tbody>";

    for ($row = 0; $row < 20; $row++) {
        echo "<tr><td>" . ($row + 1) . "</td>";
        for ($i = 1; $i <= 5; $i++) {
            $keys = array_keys($dict[$i]);
            $values = array_values($dict[$i]);

            if (isset($keys[$row])) {
                echo "<td>{$keys[$row]}</td><td>{$values[$row]}</td>";
            } else {
                echo "<td></td><td></td>";
            }
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}
?>


==============================================================

https://d3js.org


다음과 같은 조건에 맞는 JSON 파일을 만들어 줘.
- 관계 표현을 위한 JSON
  - nodes는 사람의 이름(name)
  - links는 두 노드의 관계(relation)을 표현
- nodes에는 홍대감, 홍길동, 사임당, 율곡
- 관계를 위한 정보
  - 홍대감의 아들 홍길동
  - 사임당의 아들 율곡
  - 홍길동의 친구 율곡


답

{
  "nodes": [
    { "name": "홍대감" },
    { "name": "홍길동" },
    { "name": "사임당" },
    { "name": "율곡" }
  ],
  "links": [
    {
      "source": "홍대감",
      "target": "홍길동",
      "relation": "father"
    },
    {
      "source": "사임당",
      "target": "율곡",
      "relation": "mother"
    },
    {
      "source": "홍길동",
      "target": "율곡",
      "relation": "friend"
    }
  ]
}


=====================================

앞에서 나온 JSON파일을 test.json으로 저장해 놓았어.

이 json 데이터를 이용해서 시각화하고 싶어.
데이터를 활용해 d3js의 네트워크 다이어그램으로 그리고 싶어.
노드에는 사람 이름을 출력하고 싶어.
관계를 나타내는 LINK는 선으로 연결하도록 HTML 코드를 만들어 줘.


결과 : ngram1.html
확인 : localhost/ngram1.html

이 json 데이터를 이용해서 시각화하고 싶어.
데이터를 활용해 d3js의 네트워크 다이어그램으로 그리고 싶어.
노드에는 사람 이름을 출력하고 싶어.
관계를 나타내는 LINK는 선으로 연결하도록 HTML 코드를 만들어 줘.
이때, 마우스를 스크롤하면 확대, 축소가 되면 좋겠고, 
화면이 고정되지 않고, 마우스를 드래그했을 때, 이동하도록 변경해 줘

결과 : ngram2.html
확인 : localhost/ngram2.html
