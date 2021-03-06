<?php

session_start();

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

    if(array_key_exists('admin',$_SESSION)){ 
        $template = 'showWorksArt';
        
    }
    else{
        header('Location: ../index.php'); 
    }

}catch(DomainException $e) {
    echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}


include '../layout-admin.phtml';