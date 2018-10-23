<?php

require_once '../config/database.php';

/*try{   
    
    if(empty($_POST))
    {
// Récupération de tous les auteurs du blog.
        $query =
        '
            SELECT
                *
            FROM
                oeuvre

        ';
        $resultSet = $pdo->query($query);
        $worksart = $resultSet->fetchAll();

        
    }


    else
    {
        // Ajout d'un article du blog.
        $query =
        '
            INSERT INTO
                oeuvre
                (titre, photo, localisation, date)
            VALUES
                (?, ?, ?, ?)

            INNER JOIN
                artiste

            ON
                oeuvre.artiste_id = artiste.id

            WHERE
                artiste.id = :id
                artiste.nom = :nom
        ';
        $resultSet = $pdo->prepare($query);
        
        $resultSet->execute([$_POST['titre'], 'test.jpg'], $_POST['localisation'], $_POST['date']);




    
        // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
        header('Location: showWorksArt.php');
        exit();
    }

    if ($worksart === null) {
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
                oeuvre
                (titre, localisation, photo, date)
            VALUES
                (?, ?, ?, now())
        ';
        $resultSet = $pdo->prepare($query);
        //var_dump($_POST['photo']); die;
        $resultSet->execute([$_POST['titre'], $_POST['localisation'], 'test.jpg']);

    
        // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
        header('Location: showWorksArt.php');
        exit();
    }

    if ($artist === null) {
        throw new DomainException("La connexion a échouée", 1);
    }

}catch (DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}  






$template = 'addWorksArt';
include '../layout.phtml';