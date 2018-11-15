<?php

require_once '../config/database.php';


try{
    // Récupération de toutes les données des oeuvres d'art
    $worksart = $pdo->prepare('Select * From oeuvre');
    $worksart->execute();
    $worksartResult = $worksart->fetchAll();

    // Test si pas de result
    if ($worksartResult === null) {
        throw new DomainException("La connexion a échouée", 1);
    }
}catch(DomainException $e) {
    echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}


$template = 'showWorksArt';
include '../layout-admin.phtml';