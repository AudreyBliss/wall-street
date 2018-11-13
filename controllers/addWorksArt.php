<?php

require_once '../config/database.php';

$admin = null;
$message = null;
$isEmpty = null;


if(!empty($_POST['titre']) AND !empty($_POST['localisation']) AND isset($_POST['titre'], $_POST['localisation'])){     /* !empty + isset */ 
$titre = $_POST['titre'];
$localisation = $_POST['localisation'];     
$artisteId = $_POST['artiste_id'];
$file_name = $_FILES['photo']['name'];  /*  pour comprendre la variable $_FILES >>> http://php.net/manual/fr/features.file-upload.post-method.php     */
$file_type = $_FILES['photo']['type'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
$file_extension = strrchr($file_name, ".");         /* prend ce qu'il y a après le point, l'extension */
$file_destination = '../public/img/worksart/'.$file_name;        /* chemin.nom du fichier*/

$valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');    //C'est mieux de vérifier le format de ton image, tu peux ajouter des extensions

$imageOeuvre = $pdo->prepare('SELECT * FROM oeuvre WHERE photo = ?');   
$imageOeuvre->execute(array($file_destination));
$verifOeuvre = $imageOeuvre->rowCount();   /* Compte dans ta colonne photo si le chemin apparait, s'il apparait = 1 , sinon, 0 */
                                            /* Ca évite que ton enregistrement se répète plusieurs fois */


    if($verifOeuvre == 0){	/* n'apparait pas donc le fichier peut être uploader */
        if(in_array($file_extension, $valid_extensions)){
    
            if(move_uploaded_file($file_tmp_name, $file_destination)){  /* déplace fichier de son emplacement temporaire vers ta bdd */
                
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

    }else{  /* donc = 1 */
        $message = 'Image déjà existante';
    }


}else{
$isEmpty = 'Tous les champs doivent être complétés';
}



$template = 'addWorksArt';

include '../layout.phtml';
















































































  



