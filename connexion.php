<?php

session_start();

$titre="Connexion";

if  (!isset($_SESSION['pseudo']))// si une session est ouverte pour ce pseudo
	{
		echo 
		'<table  WIDTH="100%"> <tr> <td ALIGN="CENTER"> <table border> <fieldset class="connexion">
		<head>
		<legend align="center"><b> <h2>CONNEXION</h2> </b></legend>
		</head>
		<form action="traitement_connexion.php" method="post" > 
		<span style="font-weight: bold;">Nom d\'utilisateur :</span>&nbsp; <input id ="nom_tuilisateur" name="nom_utilisateur"> &nbsp;<br>
		<br/>
		<span style="font-weight: bold;">Mot de passe :</span>&nbsp;<input id="motdepasse" name="motdepasse" type="password"> 
		<br/>
		<br/>
		<button>         <!-- un bouton -->
	    Connexion
		</button>
		</form>
		</table> </tr> </table>   
		</fieldset>
		</td>' ;
	}
		
?>