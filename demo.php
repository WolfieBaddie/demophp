<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $x1 = 100;
    $y = "T2401E";
    
    $arr1 = [
        "a" => "a",
         "b" => "b",
         "c" => "c",
         "d" =>  "d"
     ];
    
     foreach($arr1 as $key => $value){
        echo $key. "=" .$value. "</br>";
     }
    
    ?>

<h1>Hello <?php echo $x1?></h1>
<h1>Hello <?= $y ?></h1>
</body>
</html>