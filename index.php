<?php

// define('PATH_WS', $_SERVER['DOCUMENT_ROOT'].'/WALL-STREET/');

/******* Constantes ***********/
// define(INDEX, __DIR__); // Racine du projet
// define(CTRL, INDEX."\controllers\\"); // Chemin vers le répertoire controllers
// define(TPLT, INDEX."\templates\\"); // Chemin vers le répertoire templates
// define(PBL, INDEX."\public\\"); // Chemin vers le répertoire templates
// define(IMG, INDEX."\public\\img\\"); // Chemin vers le répertoire templates

require_once 'config/database.php';

// Test si quelqu'un est connecté
// Tu dois check si la session est déjà en cours, ou si quelqu'un est déjà connecté sur $_SESSION,
// Une fois que tu as identifié si oui ou non tu affectes $admin, afin de pouvoir l'utiliser dans le layout pour tes menus
// if en mode ternaire
// Si la session admin n'est pas vide, alors $admin vaudra '$_SESSION['admin']', sinon  $admin vaudra 'null'
session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// $admin = array_key_exists('admin', $_SESSION) && !empty($_SESSION['admin']) ? $_SESSION['admin'] : null;
// if(!empty($_SESSION['admin'])) {
//     $admin = $_SESSION['admin'];
// } else {
//     $admin = null;
// }

try{
    // Test de récupération d'un artist, et je dis bien 1 One
    $artist = $pdo->prepare('Select * From artiste');
    $artist->execute();
    $artistResult = $artist->fetchAll();

    // Test si pas de result
    if ($artistResult === null) {
        throw new DomainException("La connexion a échouée", 1);
    }
}catch(DomainException $e) {
    echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}

// Affiche moi mes artistes sur la page home.phtml
$template = 'home';

include 'layout.phtml';