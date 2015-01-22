<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD

/* Extraction des informations */
$query = $connexion->prepare("SELECT * FROM utilisateurs ORDER BY id DESC");
$query->execute(); // On execute la requête

/* On créer une variable tableau */
$list_users = array();
$i = 0;

/* Boucle qui récupère ce qu'il y a dans la table utilisateurs */
while($data = $query->fetch())
{
	$list_users[] = $data;
	/* On vérifie si l'email et le mdp du formulaire correspondent avec ceux de la BDD */	
	if($list_users[$i]['email'] == $_POST['email'] && $list_users[$i]['password'] == $_POST['password'])
	{
		/* On affecte des sessions à l'id et l'email correspondant */
		$_SESSION['id'] = $data['id'];
		$_SESSION['email'] = $_POST['email'];
		
		/* Si c'est un admin */
		if($list_users[$i]['admin'] == 1)
		{
			/* On affecte une session */
			$_SESSION['admin'] = $list_users[$i]['admin'];
		/* Sinon on la détruit */
		}else{
			unset($_SESSION['admin']);
		}
	}
	$i++;
}

/* Si l'email ou le mot de passe est vide ou que l'email ne correspond pas alors on affiche un message d'erreur */
if((isset($_POST['email']) && empty($_POST['email'])) || (isset($_POST['password']) && empty($_POST['password'])) || ($_POST['email'] != $_SESSION['email']))
{
	header('Location: index.php?error=3'); // Redirection si erreur
}else{
	header('Location: index.php?success=2'); // Redirection si succès
}
?>