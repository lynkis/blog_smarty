<?php session_start(); // Initialise les Sessions
require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD

/* Si une session email existe alors on fait la déconnexion */
if(isset($_SESSION['email']))
{
	/* On supprime les toutes les sessions existantes*/
	session_unset();
	session_destroy();
	
	/* On redirige avec un message de succès */
	header('Location: index.php?success=4');
	exit();
	
/* Sinon elle n'existe pas et on redirige à l'index */
}else{
	header('Location: index.php');
}

?>