<?php
session_start();
include('bibliotheque.php');

unset($_SESSION['pseudo']);


header ('Location:traitement_deconnexion2.php');
///////////////////////////////////// PARTIE VISIBLE /////////////////////////////////////

?>
