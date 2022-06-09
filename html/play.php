<?php
            
    // inclusion de la fonciton pour chercher le groupe et de la liste de mots.
    include '../includes/findgroup.php';
    include '../includes/words.php';

    //récupération du nom du groupe et de ses différents attributs
    $strGrp = htmlspecialchars($_COOKIE["group"]);
    $sessionDatas = simplexml_load_file("../Sheets/sessions.xml");
    $idxGrp = find_group($sessionDatas, $strGrp);
    $personnes = $sessionDatas->groupe[$idxGrp]->children();

    //assignation du mot des civils et du mot de l'imposteur.
    $intWordCouple = mt_rand(0,count($lstMots)-1);
    $intCivilWord = mt_rand(0,1);
    $strCivilWord = $lstMots[$intWordCouple][$intCivilWord];
    $strImpWord = $lstMots[$intWordCouple][($intCivilWord -1)*-1];
    
    //création et assignation des rôles
    $lstNameRole = [];
    for( $i = 1; $i<count($personnes); $i++){
        $lstNameRole[] = [$personnes[$i]->nom, "c"];
    }
    $intRandWhite = mt_rand(0,count($lstNameRole)-1);
    do {
        $intRandImp = mt_rand(0, count($lstNameRole)-1);
    }while($intRandImp == $intRandWhite);
    $lstNameRole[$intRandImp][1] = "i";
    $lstNameRole[$intRandWhite][1] = "w";

    //création des cookies, permettant de garder une trace des objets php créés pour les futures queries.
    $wrdCouple = [$strCivilWord, $strImpWord];
    setcookie("lstnamerole", json_encode($lstNameRole), time() + (86400), "/");
    setcookie("wordcouple", json_encode($wrdCouple), time() + (86400), "/");
    setcookie("value", json_encode(0), time() + (86400), "/");
    setcookie("lstallplayers", json_encode($lstNameRole), time() + (86400), "/");

?>
<html>
    <head>
        <title>Mr White</title>
        <meta charset="UTF-8">
        <meta name="Description" content="Jeu Mr White">
        <link rel="stylesheet" href="../css/playStyle.css">
    </head>
    <body>
        <div>
        <?php


            //création du HTML de la page
            $name = $lstNameRole[0][0];
            echo "<div id='annonce'><p>C'est à $name de découvrir sa carte!</p>";
            echo "<button id='btnDecouvrir' class='button'>CARTE</button></div>";
            
        ?>
    <script src="../js/play.js" type="text/javascript"></script>
    </div>
    </body>
</html>
