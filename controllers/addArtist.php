<?php

require_once '../config/database.php';

/*try{
    // Récupérer les auteurs et les catégories
    $artiste = $pdo->prepare('
      Insert Into Post (nom, photo, description, date)
      Values (:nom, :photo, :description, :date)
    ');
    
    $artiste->execute([
      'nom' => $_POST['nom'],
      'photo' => $_POST['photo'],
      'description' => $_POST['description'],
      'date' => $_POST['date']
      ]);
      
      if ($artist === null) {
        throw new DomainException("La connexion a échouée", 1);
    }
    
  
}catch(DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}
    
    header('Location: showArtist.php');
    exit();*/

/*try{   
    
    if(empty($_POST))
    {
// Récupération de tous les auteurs du blog.
        $query =
        '
            SELECT
                *
            FROM
                artiste
        ';
        $resultSet = $pdo->query($query);
        $artist = $resultSet->fetchAll();

        
    }


    else
    {
        // Ajout d'un article du blog.
        $query =
        '
            INSERT INTO
                artiste
                (nom, description, photo, date)
            VALUES
                (?, ?, ?,NOW())
                

        ';
        $resultSet = $pdo->prepare($query);
        //var_dump($_POST['photo']); die;
        $resultSet->execute([$_POST['nom'], $_POST['description'], 'test.jpg'], $_POST['date']);

    
        // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
        header('Location: showArtist.php');
        exit();
    }

    if ($artist === null) {
        throw new DomainException("La connexion a échouée", 1);
    }

}catch (DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
} */

try{   
    
    if(empty($_POST))
    {
// Récupération de tous les auteurs du blog.
        $query =
        '
            SELECT
                *
            FROM
                artiste
        ';
        $resultSet = $pdo->query($query);
        $artist = $resultSet->fetchAll();

        
    }


    else
    {
        // Ajout d'un article du blog.
        $query =
        '
            INSERT INTO
                artiste
                (nom, description, photo, date)
            VALUES
                (?, ?, ?, NOW())
        ';
        $resultSet = $pdo->prepare($query);
        //var_dump($_POST['photo']); die;
        $resultSet->execute([$_POST['nom'], $_POST['description'], 'test.jpg']);
        //////
       // if($photo->hasUploadedFile('photo')) {
            // On va déplacer la photo uploaded vers le bon repertoire
           // $photo->moveUploadedFile( 'public/img/artist');
        //} else {
            // On lui affecte la photo par default
            //$photo = 'no-photo.png';
        //}
    /////////
        // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
        header('Location: showArtist.php');
        exit();
    }

    if ($artist === null) {
        throw new DomainException("La connexion a échouée", 1);
    }

}catch (DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}  





$pathToPic = '../public/img/';

$template = 'addArtist';

include '../layout.phtml';





































  
  
  