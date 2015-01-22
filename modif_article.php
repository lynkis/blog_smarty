<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD 

/* Si c'est un admin de connecté uniquement */
if($_SESSION['admin'] == 1)
{
	/* On créer un objet Smarty */
	$modif_article = new Smarty();
	
	require_once('includes/messagerie.inc.php');
	$modif_article->assign('vue', $vue);
	
	/* On renvoie le template header pour l'afficher */
	$modif_article->display("includes/views/header.inc.html");

	$id_modif = (int)$_GET['modif'];

	/* On execute la requête d'affichage de l'article choisi (selon l'id) */
	$query = $connexion->prepare("SELECT * FROM news WHERE id=$id_modif");
	$query->execute();

	/* On créer une nouvelle variable tableau pour stocker les éléments */
	$articles = array();

	/* On affecte les données de l'article à une variable tableau */
	$article = $query->fetch(PDO::FETCH_ASSOC);

	$_SESSION['id_article'] = $article['id']; // On affecte id de l'article a une variable session
	
	/* On envoie les données de l'article à Smarty pour les traiter sur le template */
	$modif_article->assign('article', $article);

	/* On détruit les sessions */
	unset($_SESSION['error']);
	unset($_SESSION['success']);

	/* Si il y a une erreur on l'affecte dans une variable Session */
	if(isset($_GET['error']))
	{
		$_SESSION['error'] = $_GET['error'];
	}

	/* Si il y a un succès on l'affecte dans une variable Session */
	if(isset($_GET['success']))
	{
		$_SESSION['success'] = $_GET['success'];
		header('Refresh:3, index.php');
	}

	/* On renvoie le template modif_article pour l'afficher */
	$modif_article->display("views/modif_article.html");
	/* On renvoie le template footer pour l'afficher */
	$modif_article->display("includes/views/footer.inc.html");
	
/* Sinon ce n'est pas un admin et on redirige vers l'index */
}else{
	header('Location: index.php');
}
 ?>