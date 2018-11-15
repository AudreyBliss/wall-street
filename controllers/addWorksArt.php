<?php

require_once '../config/database.php';

$message = null;
$isEmpty = null;


if(!empty($_POST['titre']) AND !empty($_POST['localisation']) AND isset($_POST['titre'], $_POST['localisation'])){    
$titre = $_POST['titre'];
$localisation = $_POST['localisation'];     
$artisteId = $_POST['artiste_id'];
$file_name = $_FILES['photo']['name'];  
$file_type = $_FILES['photo']['type'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
$file_extension = strrchr($file_name, ".");         /* prend ce qu'il y a après le point, l'extension */
$file_destination = '../public/img/worksart/'.$file_name;        /* chemin.nom du fichier*/

$valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');    //vérification des formats autorisés

$imageOeuvre = $pdo->prepare('SELECT * FROM oeuvre WHERE photo = ?');   
$imageOeuvre->execute(array($file_destination));
$verifOeuvre = $imageOeuvre->rowCount();  /* Ca évite que l' enregistrement se répète plusieurs fois */


    if($verifOeuvre == 0){	/* n'apparait pas donc le fichier peut être uploader */
        if(in_array($file_extension, $valid_extensions)){
    
            if(move_uploaded_file($file_tmp_name, $file_destination)){  /* déplace le fichier de son emplacement temporaire vers la bdd */
                
                $req = $pdo->prepare("INSERT INTO oeuvre (titre, photo, localisation, artiste_id) VALUES(?, ?, ?,?)");		
                $req->execute(array($titre, $file_name, $localisation, $artisteId));
                    $message = "Téléchargement terminé";

                    header('location:showWorksArt.php');
    
            }else{
                $message = 'L\'image n\'a pas pu se télécharger';
            }
    
        }else{
    
            $message =  'Le format ne l\'image n\'est pas autorisé'; //l'extension de l'image n'est pas comprise dans le tableau $valid_extensions
        }

    }else{  
        $message = 'Image déjà existante';
    }


}else{
    $isEmpty = 'Tous les champs doivent être complétés';
}



$template = 'addWorksArt';

include '../layout.phtml';
















































































  



