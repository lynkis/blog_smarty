<?php ob_start(); // Initialise les headers de la page
session_start(); // Initialise les Sessions

require_once('/usr/share/php/smarty3/Smarty.class.php');
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD 

/* Si il y a une recherche */
if(isset($_GET['r']))
{
	$r = $_GET['r'];
	/* On compte le nombre d'éléments dans la table news avec la recherche */
	$query_page = $connexion->prepare("SELECT COUNT(*) AS nb FROM news WHERE titre LIKE '%{$r}%' OR contenu LIKE '%{$r}%' ORDER BY id DESC ");
	$query_page->execute(); // Execution de la requête
	$row = $query_page->fetch(PDO::FETCH_ASSOC); // Affectation des données dans un variable tableau

	/* On affiche un nombre défini d'articles par page (ici 3) */
	$nb_app = 3; // Nombre d'articles par page voulu
	$nb_pages = ceil($row['nb']/$nb_app); // On arrondi le nombre de pages en entier
	$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page']: 1; // On vérifie si le get existe
	$debut = ($page-1)*$nb_app; // On calcul le début de la requête
	
	/* On affiche tout les articles de la recherche avec pagination */
	$query = $connexion->prepare("SELECT *, news.id AS id_news FROM news INNER JOIN utilisateurs ON news.id_user_ajout = utilisateurs.id WHERE titre LIKE '%{$r}%' OR contenu LIKE '%{$r}%' ORDER BY news.id DESC LIMIT $debut,$nb_app");

/* Sinon pareil mais sans les éléments de recherche */
}else{
	$query_page = $connexion->prepare("SELECT COUNT(*) AS nb FROM news ORDER BY id DESC");
	$query_page->execute();
	$row = $query_page->fetch(PDO::FETCH_ASSOC);

	$nb_app = 3;
	$nb_pages = ceil($row['nb']/$nb_app); 
	$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page']: 1;
	$debut = ($page-1)*$nb_app; 

	$query = $connexion->prepare("SELECT *,news.id AS id_news FROM news INNER JOIN utilisateurs ON news.id_user_ajout = utilisateurs.id ORDER BY news.id DESC LIMIT $debut,$nb_app");
}
/* On execute les requêtes d'affichage des articles (selon si il y a recherche ou pas) */
$query->execute();

/* On créer une nouvelle variable tableau pour stocker les éléments */
$list_news = array();
$i = 0;

/* Boucle qui permet de récupérer tout les éléments de la table news en les stockants dans le tableau  */
while($data = $query->fetch())
{
	$list_news[] = $data;
}


/* On créer un objet Smarty */
$index = new Smarty();

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

/************************************ Pagination *****************************************/
$page=1;
$page_actuelle = array();
if(isset($_GET['page']))
{
	$p = $_GET['page'];
	$before = $p - 1;
	$next = $p + 1;
	$index->assign('page',$p);
	$index->assign('before',$before);
	$index->assign('next',$next);
}

while($page != $nb_pages+1)
{
	$page_actuelle[$page] = $page;
	if($page == 4)
	{
		$troncat_page = 0;
		$index->assign('troncat_page',$troncat_page);
	}
	$page++;
}

if(isset($_GET['page']) && ($_GET['page'] < 1 || $_GET['page'] > $page))
{
	header('Location: index.php?page=1');
}

if(isset($_GET['page']) && isset($_GET['r']) && ($_GET['page'] < 1 || $_GET['page'] > $page))
{
	header('Location: index.php?r='.$_GET['r'].'&page=1');
}

require_once('includes/messagerie.inc.php');
$index->assign('vue', $vue);

/****************************************************************************************/

/* On envoie les données à traiter dans smarty pour les réutiliser sur le template */
$index->assign('list_news', $list_news);
/* Données de la pagination */
$index->assign('page_actuelle',$page_actuelle);

/* On renvoie le template header pour l'afficher */
$index->display("includes/views/header.inc.html");
/* On renvoie le template index pour l'afficher */
$index->display("views/index.html");
$index->display("includes/views/pagination.inc.html");
/* On renvoie le template footer pour l'afficher */
$index->display("includes/views/footer.inc.html");

?>