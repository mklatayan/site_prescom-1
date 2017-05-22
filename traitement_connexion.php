<?php
ini_set('display_errors',1);
	
error_reporting( E_ALL );
try
	{
		$bdd = new PDO ('mysql:host=localhost;dbname=prescom;charset=utf8','root','');
	}

catch(Exception $e)
{
// En cas d’erreur, on affiche un message et on arrête tout
die('Erreur :'.$e->getMessage());
}
// Si tout va bien, on peut continuer

if (empty($_POST['nom_utilisateur']) || empty ($_POST ['motdepasse']))
	{
		$message ='<p> Une erreur s\'est produite pendant votre identification. Vous devez remplir tous les champs. </p>
					<p> Cliquez <a href="index.php"> ici </a> pour revenir à la page de connexion.  </p>' ;
	}

else 
	{
		$nom_utilisateur = $_POST['nom_utilisateur'] ;
		$motdepasse = $_POST['motdepasse'] ;

		$reponse = $bdd->prepare ('SELECT * FROM membre') ;
		$reponse->bindValue(':nom_utilisateur',$_POST['nom_utilisateur'], PDO::PARAM_STR);
		$reponse->execute();
		$donnes = $reponse -> fetch() ;

		if ($donnes['nom_utilisateur'] == md5($_POST['motdepasse'])) 
			{
				$_SESSION['nom_utilisateur'] = $donnes ['nom_utilisateur'] ;
				$message ='<p> Bienvenue' .$donnes['nom_utilisateur']. '</p>';
				if ($donnes['statut'] = administrateur)
					{
						header ("location : page_administrateur.php") ;
						echo $donnes['nom_utilisateur'] ;
					}

				else
					{
						header ("location : page_utilisateur.php") ;
						echo $donnes['nom_utilisateur'] ;
					}
			}

		else
			{
				$message ='<p> Vous avez saisi un mauvais nom d\'utilisateur ou un mauvais mot de passe </p>
							<p> Cliquez <a href ="index.php" ici </a> pour reveneir à la page de connexion. </p>' ;
			}
					
	}

?>