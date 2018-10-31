<?php
$admin = null;

require_once '../config/database.php';


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
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}

$template = 'showArtist';

include '../layout.phtml';
