<?php
    $nama = "adil ganteng";
    $umur = 20;
    echo strlen($nama);
    echo "<br>";
    echo strcmp($nama, "a");
    echo "<br>";
    echo strpos($nama, "g");
    echo "<br>";
    echo substr($nama, 1, 3);
    echo "<br>";
    echo str_replace("a", "b", $nama);
    echo "<br>";
    echo strtoupper($nama);
    echo "<br>";
    echo strtolower($nama); 
?>