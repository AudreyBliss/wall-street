<?php

session_start();

$template = 'admin';

if(array_key_exists('admin',$_SESSION)){ 
    include '../layout-admin.phtml';
}
else{
    header('Location: logout.php'); 
}
