<?php
    
    //règles:
    //lstNameRole[n] = [<nom n-1ième personne>, <c,w,i>]
    //wrdCouple[0] = <mot_civil>
    include './cookies.php';
    
    $nom = $lstNameRole[$idx][0]->{0};
    $chrRole = $lstNameRole[$idx][1];
    $strCivil = $wrdCouple[0];
    $strImp = $wrdCouple[1];
    setcookie("value", ++$idx, time() + (86400), "/");
    switch ($chrRole){
        case "w":
            echo "<p>".$nom.", tu es Mr White </p>";
            break;
        case "c":
            echo "<p>".$nom.", ton mot est: </p>";
            echo "<p>".$strCivil."</p>";
            break;
        case "i":
            echo "<p>".$nom.", ton mot est: </p>";
            echo "<p>".$strImp."</p>";
            break;
    }
    echo "<button id='suivant' class='button'>SUIVANT</button>";
    
?>
