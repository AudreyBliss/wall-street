<?php    

session_start();

require_once '../config/database.php';

try{
    $message = null;
    $isEmpty = null;


    if(!empty($_POST['nom']) AND !empty($_POST['description']) AND isset($_POST['nom'], $_POST['description'])){    
    $nom = $_POST['nom'];
    $description = $_POST['description'];     

    $file_name = $_FILES['photo']['name'];  
    $file_type = $_FILES['photo']['type'];
    $file_tmp_name = $_FILES['photo']['tmp_name'];
    $file_extension = strrchr($file_name, ".");         /* prend ce qu'il y a après le point, l'extension */
    $file_destination = '../public/img/artist/'.$file_name;        /* chemin.nom du fichier*/

    $valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');    /*pour vérifier le format de l'image*/ 

    $imageArtist = $pdo->prepare('SELECT * FROM artiste WHERE photo = ?');   
    $imageArtist->execute(array($file_destination));
    
    $verifArtist = $imageArtist->rowCount();   
        /* n'apparait pas donc le fichier peut être uploader */
        if($verifArtist == 0){	
            if(in_array($file_extension, $valid_extensions)){
        /* déplace le fichier de son emplacement temporaire vers la bdd */
        //a la plac du if plutôt un try catch
                if(move_uploaded_file($file_tmp_name, $file_destination)){  
                    
                    $req = $pdo->prepare("INSERT INTO artiste (nom, photo, description) VALUES(?, ?, ?)");		
                    
                      $req->execute(array($nom, $file_name, $description));
                    // var_dump($test);die;
                        $message = "Téléchargement terminé";

                        header('location:showArtist.php');
        //catch a la place du else
                }else{
                    $message = 'L\'image n\'a pas pu se télécharger';
                }
        
            }else{
                //l'extension de l'image n'est pas comprise dans le tableau $valid_extensions
                $message =  'Le format ne l\'image n\'est pas autorisé'; 
            }

        }else{  
            $message = 'Image déjà existante';
        }


    }else{
        $isEmpty = 'Tous les champs doivent être complétés';

        if(array_key_exists('admin',$_SESSION)){ 
            $template = 'addArtist';
            
        }
        else{
            header('Location: ../index.php'); 
        }
    }

}catch(DomainException $e) {
        echo "Une erreure est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}


include '../layout-admin.phtml';





































  
  
  