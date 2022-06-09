<?php

include './cookies.php';
include './findgroup.php';

$strResponse = $_REQUEST["q"];

function write_xml($type, $points, $realGroup){
    $sessionDatas = new DOMDocument();
    $sessionDatas->load("../Sheets/sessions.xml");
    $sessionDatas->formatOutput = true;
    $root = $sessionDatas->documentElement;
    $names = $root->getElementsByTagName("nom");
    for($i = 0; $i < count($names); $i++){
        for($j = 0; $j < count($realGroup); $j++){
            if($realGroup[$j][0]->{0} == $names->item($i)->nodeValue && $realGroup[$j][1] == $type){
                $sessionDatas->getElementsByTagName("points")->item($i)->nodeValue += $points;
            }
        }
    }
    $sessionDatas->save("../Sheets/sessions.xml");
}


$nbrVivants = 0;
$nbrWhite = 0;
$White;
$nbrImp = 0;
$Imp;
$Civils = [];
$fin = "<button id='fin' class='button'>OK</button>";

foreach($lstNameRole as $person){
    switch ($person[1]){
        case "c":
            $nbrVivants++;
            $Civils[] = $person[0]->{0};
            break;
        case "w":
            $nbrVivants++;
            $nbrWhite++;
            $White = $person[0]->{0};
            break;
        case "i":
            $nbrVivants++;
            $nbrImp++;
            $Imp = $person[0]->{0};
            break;
    }
}

if ($strResponse == $wrdCouple[0] && $strResponse != null){
    echo "<p> Mr White a gagné!</p>";
    echo "<p> Il gagne 10 points </p>";
    write_xml("w", 10, $realGroup);
    echo $fin;
}elseif ($nbrWhite == 0 && $nbrImp == 0){
    echo "<p>Les civils ont gagnés!</p>";
    echo "<p>Il gagnent tous 5 points</p>";
    write_xml("c", 5, $realGroup);
    echo $fin;
} elseif ($nbrVivants <= 2 && $nbrWhite > 0){
    echo "<p> Mr White a gagné!</p>";
    echo "<p> Il gagne 10 points </p>";
    write_xml("w", 10, $realGroup);
    echo $fin;
} elseif ($nbrImp * 2 >= $nbrVivants){
    echo "<p> Victoire des / de l'imposteur(s)!</p>";
    echo "<p> Il(s) gagne(nt) 10 points</p>";
    write_xml("i", 10, $realGroup);
    echo $fin;
} else {    
    echo "<p>Nouveau tour!</p>";
    echo "<p>Une fois que le tour est finis, appuyez sur le bouton ci-dessous pour voter</p>";
    echo "<button id='suivant' class='button'>VOTER</button>";
}

?>