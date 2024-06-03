<?php
    

    require "./views/Header.php";
    echo"<h1>This a a web</h1>";
    require "./views/Footer.php";
    $name = "Hello T2401E";
    echo "$name FPT-Aptech So 8a Ton That Thuyet </br>";
    $arr = [
        "a",
        "b",
        "c",
        "d"
    ];

    $arr1 = [
       "a" => "a",
        "b" => "b",
        "c" => "c",
        "d" =>  "d"
    ];
    
    print_r($arr);
    echo "<br/>";
    print_r($arr1);
    echo "<br/>";

    var_dump($arr);


?>