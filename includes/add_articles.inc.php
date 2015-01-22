<?php /************************************CREATED BY JORDAN*********************************\
/* Ouverture des sessions*/
session_start();


/* Si la session email d existe ET que c'est un admin, alors on execute le code */
if(isset($_SESSION['email']) && $_SESSION['admin'] == '1')
{
	/* Fonction pour le formulaire qui permet de faire l'ajout a la BDD */
	function add_articles($titre,$texte,$id)
	{
		/* On inclus Smarty */
		require_once("../tpl/smarty.class.php");
		/* On fait la connexion à la BDD */
		require_once('connexion_bdd.inc.php');
		
		/* Ajout de la date d'aujourd'hui */
		$time=time();
		$date=date("Y-m-d H:i:s",$time);
		
		/* Upload */
		$uploads_dir = '../assets/images/';
		$rep_image = 'assets/images/';
		$file_name_tmp = $_FILES["image"]["tmp_name"];
		$file_name = $_FILES["image"]["name"];
		$url = $uploads_dir.$file_name;
		$url_image = $rep_image.$file_name;
		$result = move_uploaded_file($file_name_tmp, $url);
			
		$size = getimagesize('../'.$url_image); 
		
		switch ($size['mime']) { 
			case "image/gif": 
				$image = imagecreatefromgif('../'.$url_image);
				break; 
			case "image/jpeg": 
				$image = imagecreatefromjpeg('../'.$url_image); 
				break; 
			case "image/png": 
				$image = imagecreatefrompng('../'.$url_image);
				break; 
		} 

		list($width, $height) = $size;
		$new_width = 250;
		$new_height = 250;

		if(($width < $new_width) && ($height < $new_height))
		{
			$redimension_image = imagecreatetruecolor($width,$height);
			imagecopyresampled($redimension_image,$image,0,0,0,0,$width,$height,$width,$height);

		}else{
			$redimension_image = imagecreatetruecolor($new_width,$new_height);
			imagecopyresampled($redimension_image,$image,0,0,0,0,$new_width,$new_height,$width,$height);
		}
		
		$url_vignette_image = '../assets/images/vignette_'.$file_name;
		$url_image = 'assets/images/vignette_'.$file_name;
		imagepng($redimension_image,$url_vignette_image);		
		
		/* On execute l'insertion de l'article */
		$query_add_article = $connexion->prepare("INSERT INTO news (titre,contenu,date_ajout,id_user_ajout,image) VALUES ('$titre','$texte','$date','$id','$url_image')");
		$query_add_article->execute();
		
		/* Requête servant à récupérer la dernière news ajoutée */
		$query_last_news = $connexion->prepare("SELECT MAX(id) FROM news");
		$query_last_news->execute();
		$row = $query_last_news->fetch();
		$id_article = $row[0];

		/* Requête servant à ajouté un message d'ajout d'une news */
		$query_messagerie = $connexion->prepare("INSERT INTO messagerie (id_article,titre,a_m_s) VALUES ('$id_article','Ajout','a')");
		$query_messagerie->execute();

		/* Suppression des sessions titre & texte */
		unset($titre);
		unset($texte);
		
		header('Location: ../article.php?success=0'); // Redirection
		exit();
		
	}
	
	/* Si le titre & le texte sont remplis, on envoi la fonction */
	if(!empty($_POST['titre']) && !empty($_POST['texte']))
	{
		$titre = $_POST['titre'];
		$texte = $_POST['texte'];
		$id = $_SESSION['id'];
		echo add_articles($titre,$texte,$id);
		
	/* Sinon si le titre & le texte sont vide, on envoie une erreur en GET (2) */
	}elseif(empty($_POST['titre']) && empty($_POST['texte'])){
		unset($_SESSION['titre']); // On supprime la session titre
		unset($_SESSION['texte']); // On supprime la session texte
		header('Location: ../article.php?error=2');
		
	/* Sinon si le texte est vide, on envoie une autre erreur en GET (1) */
	}elseif(empty($_POST['texte'])){
		$_SESSION['titre'] = $_POST['titre'];
		unset($_SESSION['texte']); // On supprime la session texte
		header('Location: ../article.php?error=1');
		
	/* Sinon si le titre est vide, on envoie une autre erreur en GET (0) */
	}elseif(empty($_POST['titre'])){
		$_SESSION['texte'] = $_POST['texte'];
		unset($_SESSION['titre']); // On supprime la session titre
		header('Location: ../article.php?error=0');
	}
	
}else{
	header('Location: ../index.php');
} ?>