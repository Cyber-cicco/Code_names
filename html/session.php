<html>
    <head>
        <title>Mr White</title>
        <meta charset="UTF-8">
        <meta name="Description" content="Jeu Mr White">
        <link rel="stylesheet" href="../css/loginStyle.css">
    </head>
    <body>
        <h1 class="title">CHOISIR UN GROUPE </h1>
        <?php
        echo "<div class='sessionChoix'>";
        $sessionDatas = simplexml_load_file("../Sheets/sessions.xml");
        $i = 0;
        foreach($sessionDatas->children() as $group){
            echo "<button class='group'>".$sessionDatas->groupe[$i]->nomgroupe . "</button> <br>";
            $i++;
        }
        echo "<p> Votre groupe n'est pas présent?<a href='createSession.php'>Créer un groupe</a></p>";
        echo "</div>";
        echo "<div class='showGroup'></div>";
        ?>
        <script src="../js/session.js" type="text/javascript"></script>  
    </body>
</html>