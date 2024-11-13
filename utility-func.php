<?php
    $angka = 123;
    $array = array("satu", "dua", "tiga");
    var_dump($angka);
    echo "<br>";
    var_dump($array);

    echo "<br>";
    echo is_int($angka);
    echo "<br>";
    echo is_array($array);
    echo "<br>";
    echo is_string($angka);

    echo "<br>";
    echo gettype($angka);
    echo "<br>";
    echo gettype($array);
    echo "<br>";

    echo "<br>";
    echo empty($angka);
    echo "<br>";
    echo empty($array);

    // isset
    echo "<br>";
    echo isset($angka);
    echo "<br>";
    echo isset($array);
?>