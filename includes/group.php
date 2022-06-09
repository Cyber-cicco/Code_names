
<?php
    include "./findgroup.php";

    //récupération du paramètre de la requête
    $strGrp = $_REQUEST["q"];

    //création d'un cookie permettant à l'utilisateur d'identifier son groupe pendant la partie
    $cookie_name = "group";
    $cookie_value = $strGrp;
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");

    //recherche du groupe correspondant à la requête dans le fichiers xml contenant les informations sur les joueurs
    $sessionDatas = simplexml_load_file("../Sheets/sessions.xml");
    $idxGrp = find_group($sessionDatas, $strGrp);
    $personnes = $sessionDatas->groupe[$idxGrp]->children();

    //écriture du HTML à partir des données récoltées dans le fichier XML
    echo "<div id='columnplayers'><h1 class='title'> JOUEURS</h1>";
    for($j = 0; $j<count($personnes); $j++){
        echo "<p id='nameAndPoints'>".$personnes[$j]->nom." ".$personnes[$j]->points."</p>";
    }
    echo " <button id='ok'>OK</button>";
    echo "</div>";
?>