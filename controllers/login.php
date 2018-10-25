<?php
// Dépendances
require_once '../config/database.php';
$admin = null;
// Variables
//$errorMessage = [];

// Test est-ce qu'on a accès à $_POST
if(empty($_POST)) {
    // Si non :
    // Phase 1 : Affichage du form de login
    // Redirection
    header('Location: ../templates/login.phtml'); // Todo
    exit();
    
} elseif(array_key_exists('logout', $_GET) && $_GET['logout'] === true) {
    // Si on a clic qur logout dans la nav, on a récup la clé logout depuis le get
    // Todo unset session
    
    
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
    
    session_destroy($_GET['logout']);
    //$_SESSION = [];


    //$_SESSION['admin']->destroy;
    // Redirection vers l'accueil
    header('Location: ../index.php');
    exit();

} else {
    // Si oui :
    // Phase 2 : Traitement du form de login
    if (array_key_exists('email', $_POST) && array_key_exists('pwd', $_POST) && 
        isset($_POST['email']) && !empty($_POST['pwd'])) {
        
        // Test si les informations du form sont correctes ou pas
        // 1 - Requête dans Admin si email exists
        try {
            $query = $pdo->prepare('
                SELECT
                    id,
                    email,
                    password
                FROM admin
                WHERE email = :email
            ');

            // Execute, pour éxecuter ta requête(n'oublie pas de lui envoyer un param qui correspond à l'email reçu depuis ton form),
            // ci-dessus et stocker le resultat dans une variable "$admin"
            $query->execute(['email' => $_POST['email']]);

            $admin = $query->fetch();

            // Est-ce qu'on a bien trouvé un utilisateur ?
            if(empty($admin))
            {
                throw new DomainException
                (
                    "Il n'y a pas de compte admin associé à cette adresse email"
                );
            }

            // Est-ce que le mot de passe spécifié est correct par rapport à celui stocké ?
            if(!password_verify($password, $admin['password']))
            {
                throw new DomainException
                (
                    'Le mot de passe spécifié est incorrect'
                );
            }
        } catch (DomainException $e){
            echo 'Il est survenue un problême de connexion : '.$e->getMessage().' / Code : '.$e->getCode();
        }
                
        // Si on a bien récup un admin : Créé une session pour l'admin,
        // 1 - En testant si la session exist déjà
        if(session_status() == PHP_SESSION_NONE || array_key_exists('admin', $_SESSION) && 
        empty($_SESSION['admin']))
        {
            // Démarrage du module PHP de gestion des sessions.
            session_start();
            // la remplir avec les infos de ton admin
            $_SESSION['admin'] =
            [
                'adminId'   => $admin['id'],
                'email'     => $admin['email']
            ];
        } else {
            // Si elle existe :
            // Tu écrases la session existante par les infos de ton admin
            if($_SESSION['admin']['id'] !== $admin['id'] || $_SESSION['admin']['email'] !== $admin['email']) {
                $_SESSION['admin'] =
                [
                    'adminId'   => $admin['id'],
                    'email'     => $admin['email']
                ];
            }
        }
        // Redirection vers soit l'admin pour gérer les produits, soit l'accueil (qui est une page php, BIENSUR !!!)
        header('Location:../index.php');
        exit();
    } else {          
        // 2 - Sinon : ajouter un message d'erreur dans $errorMessage
            // Affecter à la variable qui est l.6

            // Redirection vers login.phtml
            header('Location:controllers/login.php');
            exit();
    }

    header('Location: ../index.php');
    exit();
}


$template = 'login';
include '../layout.phtml';

//INSERT INTO 'admin' ('id', 'email', 'password') VALUES
//(2, 'admin', '$2y$10$y.x0AzafXw82Qw3LEXLMbOdpQMRyRlXP7j//P7rk17El8rtMBAVBi');






