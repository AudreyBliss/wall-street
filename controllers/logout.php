<?php

$_SESSION = [];
session_unset();
session_destroy();
// Redirection vers l'accueil
header('Location: ../index.php');
    