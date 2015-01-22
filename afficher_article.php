<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD

/* Si il y a un get id alors on affiche que l'article choisi (pour le lien , 'lire la suite) */
if(isset($_GET['id']))
{
	$id = (int)$_GET['id'];
	
	/* On affiche l'article correspondant */
	$query = $connexion->prepare("SELECT * FROM news INNER JOIN utilisateurs ON news.id_user_ajout = utilisateurs.id WHERE news.id={$id}");
	$query->execute(); // On execute la recherche
	$row = $query->fetch(PDO::FETCH_ASSOC); // On affecte les données dans une variable tableau
	
	$afficher_article = new Smarty(); // On créer un nouvel objet Smarty
	
	require_once('includes/messagerie.inc.php');
	$afficher_article->assign('vue', $vue);

	$afficher_article->assign('news', $row); // On renvoie les données à Smarty pour les traiter sur le template
	$afficher_article->display("views/afficher_article.html"); // On renvoie le template afficher_article à Smarty
}	


?>