<form method="post" action="index.php?cmd=ngram">
    <div class="row">
        <div class="col-10 colLine">
            <textarea class="form-control" name="text" rows="10">稼亭先生年譜。abcd1234 한글大德,二年戊戌七月壬寅。公生。</textarea>
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

        $text = preg_replace("/[a-z0-9_가-힣]/u", "", $text);
        $words = preg_split("/[。,\s]/u", $text);
        echo "text = $text<br>";



        for($i=0; $i<count($words); $i++)
        {
            echo "$i : $words[$i]<br>";
        }

    }
?>