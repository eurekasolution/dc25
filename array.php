<?php
    $name1 = "홍길동";
    $name2 = "이순신";

    $names = array("이순신", "홍길동", "정약용", "이도", "세종", "세조", "송시열");
    echo "$names[0]<br>";
    echo "$names[1]<br>";

    for($i=0; $i<count($names); $i++)
    {
        echo "$i : $names[$i]<br>";
    }

    $std = array();
    $std[] = "aaa";
    $std[] = "bbb";
    $std[] = "ccc";

    for($i=0; $i<count($std); $i++)
    {
        echo "$i : $std[$i]<br>";
    }



    
?>