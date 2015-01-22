<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD 

/* On execute l'insertion de l'article */
$query = $connexion->prepare("SELECT utilisateurs.id,
									 utilisateurs.email,
									 messagerie.id_article, 
									 messagerie.id AS id_message, 
									 messagerie.titre AS titre_message, 
									 messagerie.a_m_s, 
									 news.id_user_ajout, 
									 news.id_user_modif, 
									 news.date_ajout, 
									 news.date_modif, 
									 news.id, 
									 news.id_user_ajout  	  
							  FROM messagerie 
							  INNER JOIN news ON messagerie.id_article = news.id 
							  INNER JOIN utilisateurs ON news.id_user_ajout = utilisateurs.id
							 ");
$query->execute();

$query1 = $connexion->prepare("UPDATE messagerie SET vue = '1' WHERE vue = '0' ");
$query1->execute();

$query2 = $connexion->prepare("SELECT utilisateurs.id AS id_user,
									  utilisateurs.email,
									  messagerie.id AS id_message,
									  messagerie.id_article AS id_article_messagerie,
									  messagerie.a_m_s, 
									  messagerie.titre, 
									  archives.id_article,
									  archives.date_sup,
									  archives.id_user AS id_user_sup
									  
							   FROM messagerie 
							   INNER JOIN archives ON archives.id_article = messagerie.id_article  
							   INNER JOIN utilisateurs ON utilisateurs.id = archives.id_user  
							   WHERE a_m_s='s'");
$query2->execute();

// var_dump($query->errorInfo());
$messages = array();
$i=0;
while($data = $query->fetch())
{
	$messages[] = $data;
}

$messages_sup = array();
$i2=0;
while($data2 = $query2->fetch())
{
	$messages_sup[] = $data2;
}


/* On créer un objet Smarty */
$messagerie = new Smarty();

require_once('includes/messagerie.inc.php');
$messagerie->assign('vue', $vue);

$messagerie->assign('messages', $messages);
$messagerie->assign('messages_sup', $messages_sup);
/* On renvoie le template header pour l'afficher */
$messagerie->display("includes/views/header.inc.html");
/* On renvoie le template messagerie pour l'afficher */
$messagerie->display("views/messagerie.html");
/* On renvoie le template footer pour l'afficher */
$messagerie->display("includes/views/footer.inc.html");

?>