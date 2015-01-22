<?php /*************************** Connexion à la BDD *******************************/
try
{
	$connexion = new PDO('mysql:host=localhost;dbname=blog_wj', 'root', 'lprsc', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
	/* En cas d'erreur, on affiche un message et on arrête tout */
	die('Erreur : '.$e->getMessage());
}
?>