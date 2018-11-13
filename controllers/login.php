<?php
// Dépendances
require_once '../config/database.php';
$admin = null;
// Variables
//$errorMessage = [];

// Test est-ce qu'on a accès à $_POST
// if(empty($_POST)) {
//     // Si non :
    // Phase 1 : Affichage du form de login
    // Redirection
    // header('Location: ../templates/login.phtml'); // Todo
    // exit();
//}   
//  if(array_key_exists('logout', $_GET) && $_GET['logout'] === true) {
//     // Si on a clic qur logout dans la nav, on a récup la clé logout depuis le get
//     // Todo unset session
    
    
    // Destruction du tableau de session
    //var_dump($_SESSION['admin']); die;
    
   // session_start();
    //session_destroy();


    //session_start();
    //unset($_SESSION['id']);
    //setcookie($_SESSION_name());
    //session_destroy();
    
    //unset($_GET['logout']);
     //unset($admin);
     //unset($_GET);
    //$admin->destroy();
    //$_GET->destroy();
    //unset($admin['id']);
    
    //session_destroy($_GET['logout']);
    //$_SESSION = [];


    //$_SESSION['admin']->destroy;

    // $_SESSION = [];
    // session_unset();
    // session_destroy();

    // // Redirection vers l'accueil
    // header('Location: ../index.php');
    // exit();

// } else {
    // Si oui :
    // Phase 2 : Traitement du form de login
//     if (array_key_exists('email', $_POST) && array_key_exists('pwd', $_POST) && 
//         isset($_POST['email']) && !empty($_POST['pwd'])) {
        
//         // Test si les informations du form sont correctes ou pas
//         // 1 - Requête dans Admin si email exists
//         try {
//             $query = $pdo->prepare('
//                 SELECT
//                     id,
//                     email,
//                     password
//                 FROM admin
//                 WHERE email = :email
//             ');

//             // Execute, pour éxecuter ta requête(n'oublie pas de lui envoyer un param qui correspond à l'email reçu depuis ton form),
//             // ci-dessus et stocker le resultat dans une variable "$admin"
//             $query->execute(['email' => $_POST['email']]);

//             $admin = $query->fetch();

//             // Est-ce qu'on a bien trouvé un utilisateur ?
//             if(empty($admin))
//             {
//                 throw new DomainException
//                 (
//                     "Il n'y a pas de compte admin associé à cette adresse email"
//                 );
//             }

//             // Est-ce que le mot de passe spécifié est correct par rapport à celui stocké ?
//             if(!password_verify($password, $admin['password']))
//             {
//                 throw new DomainException
//                 (
//                     'Le mot de passe spécifié est incorrect'
//                 );
//             }
//         } catch (DomainException $e){
//             echo 'Il est survenue un problême de connexion : '.$e->getMessage().' / Code : '.$e->getCode();
//         }
                
//         // Si on a bien récup un admin : Créé une session pour l'admin,
//         // 1 - En testant si la session exist déjà
//         if(session_status() == PHP_SESSION_NONE || array_key_exists('admin', $_SESSION) && 
//         empty($_SESSION['admin']))
//         {
//             // Démarrage du module PHP de gestion des sessions.
//             session_start();
//             // la remplir avec les infos de ton admin
//             $_SESSION['admin'] =
//             [
//                 'adminId'   => $admin['id'],
//                 'email'     => $admin['email']
//             ];
//         } else {
//             // Si elle existe :
//             // Tu écrases la session existante par les infos de ton admin
//             if($_SESSION['admin']['id'] !== $admin['id'] || $_SESSION['admin']['email'] !== $admin['email']) {
//                 $_SESSION['admin'] =
//                 [
//                     'adminId'   => $admin['id'],
//                     'email'     => $admin['email']
//                 ];
//             }
//         }
//         // Redirection vers soit l'admin pour gérer les produits, soit l'accueil (qui est une page php, BIENSUR !!!)
//         header('Location:../index.php');
//         exit();
//     } else {          
//         // 2 - Sinon : ajouter un message d'erreur dans $errorMessage
//             // Affecter à la variable qui est l.6

//             // Redirection vers login.phtml
//             header('Location: login.php');
//             exit();
//     }

//     header('Location: ../index.php');
//     exit();
// //}
///////////////////////////////////////////////////////////////

if(isset($_POST) && !empty($_POST))
{
     
    if(!empty(htmlspecialchars($_POST['email'])) && !empty(sha1($_POST['password'])))
    {   
        $_POST['password'] = sha1($_POST['password']);
        
        $req = $pdo->prepare(
            '
            SELECT * 
            FROM `admin` 
            WHERE email = :email AND password = :password

            '
        );

        $req->execute([
            
            'email' => $_POST['email'],
            'password' => $_POST['password']
            
        ]);

        $admin = $req->fetch();

        
        if($admin)
        {
            $_SESSION['admin'] = $_POST['email'];

            header('location:../templates/admin.phtml');
        }
        else
        {
            $error = 'Identifiant incorrect !';
        }

        if($_POST['password'] != ['password'])
        {
            $error = 'Mot de passe incorrect !';
        }
    }

    else
    {
        $error = 'Veuillez remplir tout les champs !';
    }
}

if (isset($error))
{
    echo '<span class="erreur">'. $error .'</span>';
}

///////////////////////////////////////////////////////////////////////R///////////////////////////////////////////////////////////////////

// session_start();
// // controllAdmin($connexion);

// function requestUser($connexion){
//     $compareLogPW = $connexion->prepare(
//     '
//                 SELECT * 
//                  FROM `admin` 
//                 WHERE email = :email AND password = :password
    
//                  '
                
    
//     );
//     return $compareLogPW;
// }

// function controllAdmin($connexion){
//     if(array_key_exists("submit",$_POST)){ //si le formulaire a été validé
//         $userMail = strip_tags($_POST["email"]); //on nettoie le contenu des champ de toute balise HTML et PHP
//         $userPW = strip_tags($_POST["password"]);

//         $userLoginHash = hash('sha512',$userpassword); //On hash le mot de passe avec l'algo sha512 codé sur 128 caractères

//         $LogPW = requestUser($connexion); //fonction de requête présente dans le fichier login-model.php
//         $LogPW->execute(array(
//             "password" => $userLoginHash, //on cherche dans la BDD un compte qui a le même login hashé
//         ));

//         $tabLogPW = $LogPW->fetchAll(); //on revoie un tableau avec la ligne du compte trouvé

//         //on compare si le login hashé est le même et si le pw (non crypté), correspond au pw décrypté. Si oui
//         if($userLoginHash === $tabLogPW[0]["email"] && password_verify($userPW, $tabLogPW[0]["password"])) {
//             if(array_key_exists("error",$_SESSION)){ //si une variable de session "error" existe, alors on détruit la variable pour ne pas avoir de message parasite
//                 unset($_SESSION["error"]);
//             }

//             //et on crée des variables de session "admin" afin d'y stocker certaines infos provenant du compte, afin de les afficher dans la page admin.php
//             //A faire que si nécessaire. Ici c'est juste pour vérifier que le système fonctionne bien.
           
//             $_SESSION["admin"]["user_email"] = $tabLogPW[0]["user_email"];
            
//             header("Location: admin.phtml"); //on redirige vers la page admin.php
//         }
//         else { //sinon si le login et/ou le pw sont incorrects
//             $_SESSION = array(); //on vide le tableau de session
//             $_SESSION["error"] = "<p>Login et/ou password incorrects !</p>"; //on crée une variable de session "error" avec un message d'alert"
//             header("Location: index.php"); //et on revoie vers la page index.php (ici la page de connexion aux comptes)
//         }
//     }
// }
















////////////////////////////////////////////////////////////////////////////////////////////
// if(isset($_POST['connexion']))
//     {
//         $email = htmlspecialchars($_POST['email']);
//         $password = sha1($_POST['password']);

//         if(!empty($email) && !empty($password))
//         {
//             if(filter_var($mail, FILTER_VALIDATE_EMAIL))
//             {
//                 $requser = $pdo->prepare(
//                     '
//                     SELECT `email`,`password`
//                     FROM `admin` 
//                     WHERE email = :email AND password = :password
//                     '
//                 );

//                 $requser->execute(array(':email' => $email, ':password' => $password));
//                 $connectadmin = $requser->fetch();
//                 //var_dump($connectuser);

//                 if($connectadmin)
//                 {
                    
//                     $_SESSION['email'] = $connectadmin['email'];
//                     $_SESSION['password'] = $connectadmin['password'];

//                     header('Location:admin.phtml');
//                 }
//                 else
//                 {
//                     $error = 'Vos identifiants sont incorrectes !';
//                 }

//                 if($password != $_SESSION['password'])
//                 {
//                     $error = 'Mot de passe incorrecte !';
//                 }
                
//             }
//             else
//             {
//                 $error = "Votre adresse mail n'est pas valide !";
//             }
//         }
//         else
//         {
//             $error = "Tous les champs doivent être complétés !";
//         }

//         if(isset($error))
//         {
//             echo "<span class='erreur'>".$error."</span>";
//         }
//     }









$template = 'login';
// include '../templates/login.phtml';
include '../layout.phtml';

// INSERT INTO 'admin' ('id', 'email', 'password') VALUES
//(2, 'admin', '$2y$10$y.x0AzafXw82Qw3LEXLMbOdpQMRyRlXP7j//P7rk17El8rtMBAVBi');






