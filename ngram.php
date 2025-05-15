<form method="post" action="index.php?cmd=ngram">
    <div class="row">
        <div class="col-10 colLine">
            <textarea class="form-control" name="text" rows="10">稼亭先生年譜。大德二年戊戌七月壬寅。公生。</textarea>
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
        $words = explode("。", $text);

        for($i=0; $i<count($words); $i++)
        {
            echo "$i : $words[$i]<br>";
        }

    }
?>