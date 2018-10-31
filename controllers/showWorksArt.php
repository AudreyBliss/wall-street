<?php


$admin = null;
require_once '../config/database.php';

// Check si on a récup un id (array__key_exists)
//if(array_key_exists('id', $_POST) && ctype_digit($_POST['id'])) {
    
    // Get Artist
    //try {
       /* $artist = $pdo->prepare('
            SELECT
                nom,
                
            FROM
                artiste
            
        ');

        $artist->execute();

        $artist = $artist->fetch();


        
        // Get Oeuvres
        /*$worksart = $pdo->prepare('
            SELECT
                id,
                titre,
                photo,
                localisation,
                date
            FROM
                oeuvre 
            
        ');

        $worksart->execute();

        $worksartResult = $worksart->fetchAll();

        // Test si tu as bien récupérer un resultats, sinon, faire throw new Exception('Il n'y a aucun resultat')
        if ($worksartResult === null)
            throw new Exception('Il n\'y a aucun resultat');
    }catch (Exception $e){            
        echo "Message d'erreur : ".$e->getMessage()." /n Code erreur : ".$e->getCode()." !";
    }

    
}*/

try{
    // Test de récupération d'un artist, et je dis bien 1 One
    $worksart = $pdo->prepare('Select * From oeuvre');
    $worksart->execute();
    $worksartResult = $worksart->fetchAll();

    /*$artist = $pdo->prepare('Select nom  From artiste');
    $artist->execute([$_GET['id']]);
    $artist = $artist->fetch();*/


    // Test si pas de result
    if ($worksartResult === null) {
        throw new DomainException("La connexion a échouée", 1);
    }
}catch(DomainException $e) {
    echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}

//}
/*try{
    // Test de récupération d'un artist, et je dis bien 1 One
    $worksart = $pdo->prepare('Select * From oeuvre Inner join artiste ON nom = nom');
    $worksart->execute();
    $worksartResult = $worksart->fetchAll();

    // Test si pas de result
    if ($worksartResult === null) {
        throw new DomainException("La connexion a échouée", 1);
    }
}catch(DomainException $e) {
    echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}*/




$template = 'showWorksArt';
include '../layout.phtml';