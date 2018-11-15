<?php

require_once '../config/database.php';

if(array_key_exists('id', $_GET) && ctype_digit($_GET['id'])) {
    
    // Get Artist
    try {
        $artist = $pdo->prepare('
            SELECT
                nom,
                photo,
                description
            FROM
                artiste
            WHERE
                id = :id
        ');
        $artist->execute([
            'id'  => $_GET['id']
        ]);
        $artist = $artist->fetch();
        
        // Get Oeuvres
        $worksart = $pdo->prepare('
            SELECT
                titre,
                photo,
                localisation
                
            FROM
                oeuvre 
            WHERE
                artiste_id = :id
        ');
        $worksart->execute([
            'id'  => $_GET['id']
        ]);
        $worksartResult = $worksart->fetchAll();

        if ($worksartResult === null)
            throw new Exception('Il n\'y a aucun resultat');
    }catch (Exception $e){            
        echo "Message d'erreur : ".$e->getMessage()." /n Code erreur : ".$e->getCode()." !";
    }
    $pathToPic = '../public/img/';
}  

$template = 'artist';
include '../layout.phtml';