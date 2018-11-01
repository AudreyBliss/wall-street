<?php

require_once '../config/database.php';

$admin = null;

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

// 

function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 
$titreOeuvre = checkInput($_POST['titre']);
$localisation = checkInput($_POST['localisation']);


if(!empty($titreOeuvre) AND !empty($localisation)  AND isset($titreOeuvre, $localisation )){  /* !empty + isset */      
    

    $file_name = $_FILES['photo']['name'];  /*  pour comprendre la variable $_FILES >>> http://php.net/manual/fr/features.file-upload.post-method.php     */
    $file_type = $_FILES['photo']['type'];
    $file_tmp_name = $_FILES['photo']['tmp_name'];
    $file_extension = strrchr($file_name, ".");         /* prend ce qu'il y a après le point, l'extension */
    $file_destination = ''.$file_name;        /* chemin.nom du fichier*/

    $valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');
    
    //$photo = $pdo->prepare('SELECT * FROM artiste WHERE photo = ?');   
   // $photo->execute(array($file_destination));
    //$verifPhoto = $photo->rowCount();   /* Compte dans ta colonne photo si le chemin apparait, s'il apparait = 1 , sinon, 0 */
                                        /* Ca évite que ton enregistrement se répète plusieurs fois */
        if($verifPhoto == 0){	/* n'apparait pas donc le fichier peut être uploader */
            if(in_array($file_extension, $valid_extensions)){
        
                if(move_uploaded_file($file_tmp_name, $file_destination)){  /* déplace fichier de son emplacement temporaire vers ta bdd */
                    
                    $req = $pdo->prepare("INSERT INTO oeuvre (photo, localisation, titre) VALUES(?, ?,? )");		
                    $req->execute(array($file_destination, $titreOeuvre, $localisation));
                    header('Location: showWorksArt.php');	
        
                }else{
                    echo 'image n a pas été envoyé';
                }
        
            }else{
        
                echo 'Seuls les fichiers au format... sont autorisé'; //l'extension de l'image n'est pas comprise dans le tableau $valid_extensions
            }

        }else{  /* donc = 1 */
            echo 'photo déjà existante';
        }

}else{
    echo 'files vide, tout le champs ne sont pas rempli';
}

























































































  




$template = 'addWorksArt';
include '../layout.phtml';