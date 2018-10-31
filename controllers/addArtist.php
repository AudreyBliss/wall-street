<?php

require_once '../config/database.php';

$admin = null;

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

// try{   
    
//     if(empty($_POST))
//     {
// // Récupération de tous les auteurs du blog.
//         $query =
//         '
//             SELECT
//                 *
//             FROM
//                 artiste
//         ';
//         $resultSet = $pdo->query($query);
//         $artist = $resultSet->fetchAll();

        
//     }


//     else
//     {
//         // Ajout d'un article du blog.
//         $query =
//         '
//             INSERT INTO
//                 artiste
//                 (nom, description, photo, date)
//             VALUES
//                 (?, ?, ?, NOW())
//         ';
//         $resultSet = $pdo->prepare($query);
//         //var_dump($_POST['photo']); die;
//         $resultSet->execute([$_POST['nom'], $_POST['description'], 'test.jpg']);
//         //////
//     //    if($photo->UploadedFile('photo')) {
//     //         //On va déplacer la photo uploaded vers le bon repertoire
//     //        $photo->moveUploadedFile( 'public/img/artist');
//     //     } else {
//     //         //On lui affecte la photo par default
//     //         $photo = 'no-photo.png';
//     //     }
//     /////////
//         // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
//         header('Location: showArtist.php');
//         exit();
//     }

//     if ($artist === null) {
//         throw new DomainException("La connexion a échouée", 1);
//     }

// }catch (DomainException $e) {
//     echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
// }  















///////////////////
// $nameError = $descriptionError = $imageError = $name = $description = $photo = " ";

// if(!empty($_POST))
// {
//     $name               = checkInput($_POST['nom']);
//     $description        = checkInput($_POST['description']);
//     //var_dump($nom);die;
//     $photo              = checkInput($_FILES['photo']['name']);
//     //var_dump($nom);die;
//     $imagePath          = '../public/img/artist'.basename($photo);
//     $imageExtension     = pathinfo($imagePath, PATHINFO_EXTENSION);
//     $isSuccess          = true;
//     $isUploadSuccess    = false;

//     if (empty($name))
//     {
//         $nameError = 'Ce champ ne peut pas être vide';
//         $isSuccess = false;     
//     }
    
    
    
//     if (empty($photo))
//     {
//         $imageError = 'Ce champ ne peut pas être vide';
//         $isSuccess = false;     
//     }

//     if (empty($description))
//     {
//         $descriptionError = 'Obligation de rentrer une description de chaque élément';
//         $isSuccess = false;     
//     }

//     else
//     {
//         $isUploadSuccess    = true;
//         if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" )
//         {
//             $imageError = " Les fichiers possibles sont : .jpg, .png, .jpeg, .gif";
//             $isUploadSuccess = false;
//         }
//         if (file_exists($imagePath))
//         {
//             $imageError = " Le fichier existe déjà ";
//             $isUploadSuccess = false;
//         }
//         if ($_FILES["photo"]["size"] > 500000)
//         {
//             $imageError = " Le fichier ne doit pas dépasser 500KB";
//             $isUploadSuccess = false;
//         }
//         if($isUploadSuccess)
//         {
//             if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $imagePath))
//             {
//                 $imageError = " Il y a eu une erreur lors du chargement";
//                 $isUploadSuccess = false;
//             }
//         }
//     }
//     if($isSuccess && $isUploadSuccess)
//     {
//        // $pdo = Database::connect();
//         $statement = $pdo->prepare("INSERT INTO artiste (nom, photo, description ) values(?,?,?)");
//         $statement->execute([$name,$description,$photo]);
//        // $statementphoto = $statement->fetchAll();
//        $show= $pdo->prepare("SELECT * artiste (nom, photo, description) ");
//        $show->execute();
//        $showphoto = $show->fetchAll();

//        //Database ::disconnect();
//         //header("location: showArtist.php");
    
//     }

// }

// function checkInput($data)
// {
// $data = trim($data);
// $data = stripslashes($data);
// $data = htmlspecialchars($data);
// return $data;

// }

// if(!empty($_FILES)){

//     $nomArtiste = $_POST['nom'];
//     $description = $_POST['description'];

//     //tu peux utiliser ta fonction checkInput en haut

//     $file_name = $_FILES['photo']['name'];
//     $file_type = $_FILES['photo']['type'];
//     $file_tmp_name = $_FILES['photo']['tmp_name'];

//     $file_extension = strrchr($file_name, ".");
//     $file_destination = '../public/img/artist'.$file_name;

//     $valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');	

//     if(in_array($file_extension, $valid_extensions)){

//         if(move_uploaded_file($file_tmp_name, $file_destination)){
            
//             $req = $database->prepare("INSERT INTO artiste (photo, description, nom) values(?, ?, ?)");		
//             $req->execute(array($file_destination, $description, $nomArtiste));
//             echo 'fichiers envoyé avec succès';	

//         }else{
//             echo 'image n a pas été envoyé';
//         }

//     }else{

//         echo 'Seuls les fichiers au format... sont autorisé'; //l'extension de l'image n'est pas compris dans le tableau $valid_extensions
//     }
// }else{
//     echo 'files vide';
// }

// $info = $pdo->prepare('SELECT * FROM artiste(nom, photo, description)');
// $info->execute();
// $showInfo = $info->fetchAll();


function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nomArtiste = checkInput($_POST['nom']);
$description = checkInput($_POST['description']);

if(!empty($nomArtiste) AND !empty($description) AND isset($nomArtiste, $description)){  /* !empty + isset */      

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
                    
                    $req = $pdo->prepare("INSERT INTO artiste (photo, description, nom) VALUES(?, ?, ?)");		
                    $req->execute(array($file_destination, $description, $nomArtiste));
                    echo 'fichiers envoyé avec succès';	
        
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
    

    // $info = $pdo->prepare('SELECT * FROM artiste');     /* AFFICHE TOUT TES ENREGISTREMENTS */
    // $info->execute();
    // $showInfo = $info->fetchAll();



$template = 'addArtist';

include '../layout.phtml';





































  
  
  