<?php

try {
	$pdo = new PDO
	(
		'mysql:host=localhost;dbname=wall_street;charset=UTF8',
		'',
		'',
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]
	);
	
    if($pdo === null){
        throw new Exception("La connection a échouée", 1);
    }
} catch (Exception $e){
	// Affichage du message définit dans le throw
	echo "Message d'erreur : ".$e->getMessage()." /n Code erreur : ".$e->getCode()." !";
}