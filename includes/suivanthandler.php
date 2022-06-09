<?php

    //initialisation des variables à partir des cookies
    include './cookies.php';


    //condition vérifiant si tout le monde a déjà découvert sa carte
    if($idx < count($lstNameRole)){
        $nom = $lstNameRole[$idx][0]->{0};
        echo "<p>C'est à $nom de découvrir sa carte!</p>";
        echo "<button id='btnDecouvrir' class='button'>CARTE</button>";

    //lancement du jeu, annonce de la personne qui commence le tour.
    } else {
        do{
            $firstoplay = mt_rand(0, count($lstNameRole) - 1);
        } while($lstNameRole[$firstoplay][1] == "w");
        $nom = $lstNameRole[$firstoplay][0]->{0};

        //écriture du HTML
        echo "<p>C'est à $nom de commencer.</p>";
        echo "<p>Une fois que le tour est finis, appuyez sur le bouton ci-dessous pour voter</p>";
        echo "<button id='voter' class='button'>VOTER</button>";
    }
?>