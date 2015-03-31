<?php

// Connexion à la base de données

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'labo');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}