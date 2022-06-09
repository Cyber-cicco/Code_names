<?php
/*
$lstNameRole = json_decode($_COOKIE["lstnamerole"]);
$wrdCouple = json_decode($_COOKIE["wordcouple"]);
$idx = json_decode($_COOKIE["value"]);*/

include './cookies.php';

//récupération du paramètre de la requête
$strGrp = $_REQUEST["q"];
$i = 0;
foreach($lstNameRole as $person){
    if ($strGrp == $person[0]->{0}){
        switch ($lstNameRole[$i][1]){
            case "c":
                echo "<p> $strGrp était un civil.</p>";
                break;
            case "i":
                echo "<p> $strGrp était un imposteur.</p> ";
                break;
            case "w":
                echo "<p> $strGrp était Mr. White.</p>";
                echo "<p> Essaye de deviner le mot :</p>";
                echo "<input type='text' id='response'><br>";
        }
        \array_splice($lstNameRole, $i, 1);
        setcookie("lstnamerole", json_encode($lstNameRole), time() + (86400), "/");
    }
    $i++;
}

echo "<button id='checkifwin' class='button'>OK</button>";