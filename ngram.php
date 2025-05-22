<form method="post" action="index.php?cmd=ngram">
    <div class="row">
        <div class="col-10 colLine">
            <textarea class="form-control" name="text" rows="10">충남대학교 인문대학 한문학과 국어국문학과 영문학과</textarea>
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

        //$text = preg_replace("/[a-z0-9_가-힣]/u", "", $text);
        $text = preg_replace("/[a-z0-9_]/u", "", $text);
        $words = preg_split("/[。,\s()]/u", $text, -1, PREG_SPLIT_NO_EMPTY);
        echo "text = $text<br>";



        for($i=0; $i<count($words); $i++)
        {
            echo "$i : $words[$i]<br>";
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