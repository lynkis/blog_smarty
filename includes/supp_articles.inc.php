<?php /************************************CREATED BY JORDAN*********************************\

/* Ouverture des sessions*/
session_start();
/* Si la session email et le cookie Sid existe ET que c'est un admin, alors on execute le code suivant */
if(isset($_SESSION['email']) &&  $_SESSION['admin'] == '1')
{
	/* Fonction pour le formulaire qui permet de faire la suppression a la BDD */
	function delete_articles($id)
	{

		/* Inclusion de la connexion */
		require_once('connexion_bdd.inc.php');
		
		$id = $_GET['supp'];	
		$_SESSION['id_sup'] = $id;
		
		/* Ajout de la date d'aujourd'hui */
		$time=time();
		$date=date("Y-m-d H:i:s",$time);
		
		/* Requête servant à insérer dans la table archives la suppressions d'une news */
		$query_archive = $connexion->prepare("INSERT INTO archives (id_article,titre,contenu,date_sup,id_user) VALUES ('$id','$date','{$_SESSION['id']}')");
		$query_archive->execute();
		
		/* Requête servant à supprimer une news */
		$query_delete = $connexion->prepare("DELETE FROM news WHERE id='$id'"); // Requête SQL
		$query_delete->execute();

		/* Requête servant à ajouter un message de suppression d'une news */
		$query_messagerie = $connexion->prepare("INSERT INTO messagerie (id_article,titre,a_m_s) VALUES ('$id','Suppression','s')");
		$query_messagerie->execute();
		

		header('Location: ../index.php?success=1'); // Redirection
		exit();
	}

	/* Si le paramètre "supp" existe, on envoi la fonction */
	if(isset($_GET['supp']))
	{
		echo delete_articles($id);
		header('Location: ../index.php');
		exit();
	}

}else{
	header('Location: ../index.php');
}
 ?>