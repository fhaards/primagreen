<?php 
    $str = 'Monstera Augela';
    $getSku = mb_substr($str, 0, 3);
    $getSkuCode= '0053'.'PLNT'.strtoupper($getSku);
    echo $getSkuCode;
    echo(rand() . "<br>");
    echo(rand() . "<br>");
    echo(rand(100,300). "<br>");
    echo(rand(100,300). "<br>");
    echo(rand(100,300). "<br>");

    echo password_hash("google37", PASSWORD_DEFAULT);
?>