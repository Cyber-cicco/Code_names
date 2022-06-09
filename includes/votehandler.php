<?php
    include './cookies.php';

    echo "<p>sélectionnez la personne à éliminer :</p>";
    echo "<div class='voteButtons'>";
    foreach($lstNameRole as $person){
        $name = $person[0]->{0};
        echo "<button id='perso' class='nameButt'>$name</button>";
    }
    echo "</div>";
?>