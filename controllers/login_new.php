<?php
// Dépendances
session_start();

require_once '../config/database.php';

try{

    if(isset($_POST) && !empty($_POST))
    {
        
        if(array_key_exists('email',$_POST) && array_key_exists('password',$_POST))
        {   
            
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);
            $password = sha1($password); //////
            
            $req = $pdo->prepare(
                '
                SELECT * 
                FROM `admin` 
                WHERE email = :email AND password = :password

                '
            );

            $req->execute([
                
                'email' => $email,
                'password' => $password
                
            ]);

            $admin = $req->fetch();

            
            if($admin)
            {
                $_SESSION['admin'] = $email;

                header('location:../controllers/admin.php');
            }
            else
            {
                $error = 'Mot de passe ou email incorrect !';
            }

        }

    }

}catch(DomainException $e) {
    echo "Une erreur est survenue : {$e->getMessage()} <br> Voici son code erreur {$e->getCode()}";
}


$template = 'login';

include '../layout.phtml';






