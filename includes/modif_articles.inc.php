<?php /************************************CREATED BY JORDAN*********************************\
/* Ouverture des sessions*/
session_start();

/* Si la session email d existe ET que c'est un admin, alors on execute le code */
if(isset($_SESSION['email']) && $_SESSION['admin'] == '1')
{
	function modif_article($titre,$texte)
	{
		/* On inclus Smarty */
		require_once("../tpl/smarty.class.php");
		/* On fait la connexion à la BDD */
		require_once('connexion_bdd.inc.php');
		
		/* Ajout de la date d'aujourd'hui */
		$time=time();
		$date=date("Y-m-d H:i:s",$time);
		
		/* Requête servant à modifier une news */
		$query_update = $connexion->prepare("UPDATE news SET titre='$titre', contenu='$texte', date_modif='$date', id_user_modif='".$_SESSION['id']."' WHERE id='".$_SESSION['id_article']."'");
		$query_update->execute();
		
		/* Requête servant à récupérer l'id d'une news */
		$query_recup_id = $connexion->prepare("SELECT id FROM news WHERE id={$_SESSION['id_article']}");
		$query_recup_id->execute();
		$row = $query_recup_id->fetch();
		$id_article = $row[0];
		
		/* Requête servant à ajouter un message de modification d'une news */
		$query_messagerie = $connexion->prepare("INSERT INTO messagerie (id_article,titre,a_m_s) VALUES ('$id_article','Modification','m')");
		$query_messagerie->execute();
	}
}
/* Si le titre & le texte sont remplis, on envoi la fonction */
if(!empty($_POST['titre']) && !empty($_POST['texte']))
{
	$titre = $_POST['titre'];
	$texte = $_POST['texte'];
	echo modif_article($titre,$texte);
	header('Location: ../modif_article.php?success=3&modif='.$_SESSION['id_article']);
	exit();
	
/* Sinon si le titre & le texte sont vide, on envoie une erreur en GET (2) */
}elseif(empty($_POST['titre']) && empty($_POST['texte'])){
	header('Location: ../modif_article.php?error=2&modif='.$_SESSION['id_article']);
	
/* Sinon si le texte est vide, on envoie une autre erreur en GET (1) */
}elseif(empty($_POST['texte'])){
	$_SESSION['titre_article'] = $_POST['titre'];
	header('Location: ../modif_article.php?error=1&modif='.$_SESSION['id_article']);
	unset($_SESSION['titre_article']);
	
/* Sinon si le titre est vide, on envoie une autre erreur en GET (0) */
}elseif(empty($_POST['titre'])){
	unset($_SESSION['texte_article']);
	$_SESSION['texte_article'] = $_POST['texte'];
	header('Location: ../modif_article.php?error=0&modif='.$_SESSION['id_article']);
}
?>