<?php

require_once '../config/database.php';

    if(empty($_POST))
    {
        // Validation de la query string dans l'URL.
        if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
        {
            header('Location: showArtist.php');
            exit();
        }

        // Récupération d'un article du blog.
        
        $artist = $pdo->prepare('Select * From artiste');
        $artist->execute();
        $artistResult = $artist->fetchAll();

        // Sélection et affichage du template PHTML.
        
    }
    else
    {
        // Edition d'un article du blog.
        
        $artist = $pdo->prepare('
        UPDATE
            artiste
        SET
            nom = :nom,
            photo = :photo,
            description =:description
        WHERE
            Id = :id
    ');
        $artistResult->execute([$_POST['nom'], $_POST['description'],  $_POST['photo'], $_POST['id']]);

        // Retour au panneau d'administration.
        header('Location: ShowArtist.php');
        exit();
    }

    $template = 'updateArtist';
    include '../layout.phtml';