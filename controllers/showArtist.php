<?php
session_start();

require_once '../config/database.php';


try{
    // Récupération de toutes les données des artistes
    $artist = $pdo->prepare('Select * From artiste');
    $artist->execute();
    $artistResult = $artist->fetchAll();

    // Test si pas de result
    if ($artistResult === null) {
        throw new DomainException("La connexion a échouée", 1);
    }

    if(array_key_exists('admin',$_SESSION)){ 
        $template = 'showArtist';
        
    }
    else{
        header('Location: ../index.php'); 
    }

}catch(DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}


include '../layout-admin.phtml';