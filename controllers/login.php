<?php
// Dépendances
require_once '../config/database.php';


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


$template = 'login';
// include '../templates/login.phtml';
include '../layout.phtml';

// INSERT INTO 'admin' ('id', 'email', 'password') VALUES
//(2, 'admin', '$2y$10$y.x0AzafXw82Qw3LEXLMbOdpQMRyRlXP7j//P7rk17El8rtMBAVBi');






