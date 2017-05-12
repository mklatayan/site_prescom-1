<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=prescom;charset=utf8', 'root', '');
}

catch (Exception $e)
{
  die('Erreur :'.$e->getMessage()) ;
}

$nom_utilisateur = $_POST['nom_utilisateur'];

$motdepasse = $_POST['motdepasse'];

$requete = $bdd->prepare('SELECT nom_utilisateur, motdepasse, statut FROM membre');


if (empty($nom_utilisateur) || empty ($motdepasse))
  {
    $message='<p> Une erreur s\'est produite pendant votre identification. Vous devez remplir tous les champs</p>';
  }
else 
  {
    $requete->bindValue(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR);
    $requete->execute() ;
    $donnes= $requete-> fetch() ;
      if ($donnes['motdepasse'] == $motdepasse)
        {
            $_SESSION['nom_utilisateur'] = $donnes['nom_utilisateur'] ;
            $message = '<p> Bienvenue '.$nom_utilisateur.'vous êtes maintenant connecté </p>' ;

            if ($donnes['statut']= 'utilisateur')
              {
                include ('page_utilisateur.php') ;
              }

            else
              {
                include ('page_administrateur.php') ;
              }
        }
      else
        {
            $message = '<p> Une erreur s\'est produite pendant votre identification.<br/> Le mot de passe ou le mon d\'utilisateur est incorrecte.</p>
                        <p> Cliquez <a href="connexion.php"> ici </a> pour revenir à la page précédente. </p>' ;
        }
  }

$requete->closeCursor();

?>