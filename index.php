<?php

require_once 'config/database.php';


try{

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

// Affichage des artistes sur la page home.phtml
$template = 'home';

include 'layout.phtml';