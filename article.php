<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD 

/* Si c'est un admin de connecté uniquement */
if($_SESSION['admin'] == 1){

	/* On créer un objet Smarty */
	$article = new Smarty();
	
	/* On détruit les sessions */
	unset($_SESSION['error']);
	unset($_SESSION['success']);

	/* Si il y a une erreur on l'affecte dans une variable Session */
	if(isset($_GET['error'])){
		$_SESSION['error'] = $_GET['error'];
		
		/* Si le POST titre et texte existe on leur affecte une variable Session */
		if(isset($_POST['titre'])){
			$_SESSION['titre'] = $_POST['titre'];
		}
		if(isset($_POST['texte'])){
			$_SESSION['texte'] = $_POST['texte'];
		}
	}

	/* Si il y a un succès on l'affecte dans une variable Session */
	if(isset($_GET['success'])){
		$_SESSION['success'] = $_GET['success'];
		header('Refresh:3, index.php');
	}
	
	require_once('includes/messagerie.inc.php');
	$article->assign('vue', $vue);

	
	/* On renvoie le template header pour l'afficher */
	$article->display("includes/views/header.inc.html");
	/* On renvoie le template article pour l'afficher */
	$article->display("views/article.html");
	/* On renvoie le template footer pour l'afficher */
	$article->display("includes/views/footer.inc.html");
	
/* Sinon ce n'est pas un admin et on redirige vers l'index */
}else{
	header('Location: index.php');
}
?>