<?php
include('entete.php');
include('bibliotheque.php');

$message = $_GET['message'];
$erreur = $_GET['erreur'];



///////////////////////////////////// PARTIE VISIBLE /////////////////////////////////////
echo $message;
if ($erreur)
  {
    echo ' <a href="connexion.php">Veuillez réessayer</a>';
  }
include('pied.html');
?>
