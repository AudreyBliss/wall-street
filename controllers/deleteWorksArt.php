<?php

require_once '../config/database.php';

  // Validation de la query string dans l'URL.
  if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
  {
      header('Location: index.php');
      exit();
  }

  // Suppression d'une oeuvre d'art.
  $query =
  '
      DELETE FROM
          oeuvre
      WHERE
          Id = ?
  ';
  $resultSet = $pdo->prepare($query);
  $resultSet->execute([$_GET['id']]);

  // Redirection vers la geston des oeuvres d'art.
  header('Location: showWorksArt.php');
  exit();


include '../layout.phtml';