<?php

    $conn = mysqli_connect('localhost', 'root', 'root', 'projet_purge');//Connection à le base de données souhaitée avec le: nom/numero du serveur, l'identifiant,le mot de passe, le nom de la base de données
    if(!$conn){//Condition disant que si on arrive pas(!=) a se connecter d'afficher le message a l'interieur
        echo "Erreur de connexion :" .mysqli_connect_error(), mysqli_connect_errno();//mysqli_connect_error():Retourne le message d'erreur de connexion MySQL et mysqli_connect_errno(): Retourne le code d'erreur de la connexion MySQL
    }
?>