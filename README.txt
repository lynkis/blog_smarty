========================  Blog Smarty by Westelynck Jordan  ===========================

=============---------------  Les fonctionnalités du blog : ----------=================
	************ Fichier template inclus et connexion à la base de données ************
	-> Haut / Bas de page / Pagination / Notifications
		-> Page utilisées : 
			1) includes/views/header.inc.html 
			2) includes/views/footer.inc.html
			3) includes/views/pagination.inc.html
			4) includes/views/notification.inc.html
			5) includes/notification.inc.php
			
	-> Chargement de la page de 0 à 100% afin d'indiquer à l'utilisateur que celle ci soit bien chargée
		-> Page utilisées : 
			1) views/index.html (les deux premières div et le script de fin)
			2) assets/js/pageloader.js
			
	-> Connexion BDD : Utile pour pouvoir se connecter à la base de données
		-> Page utilisées : 
			1) includes/connexion_bdd.php
	***********************************************************************************
	
	***************** Si l'utilisateur n'est pas authentifier *************************
	-> Inscription : Pour cela cliqué simplement sur le bouton "Inscription" à l'index du site
		-> Explications : Remplissez tout les champs demandés
		-> Pages utilisées :
			1) inscription.php
			2) includes/views/header.inc.html (<!-- Modal Inscription -->)
	
	-> Connexion : Deux champs vous sont proposés en haut dans la barre bleu
		-> Explications : Mettez votre bon email et bon mot de passe que vous avez saisi 
		pour l'inscription
		-> Pages utilisées :
			1) includes/views/header.inc.html (<!-- Connexion  & Inscription -->)
			2) connexion.php
	
	-> Recherche : C'est l'affichage de tout les articles d'une recherche
		-> Explications : Pour effectuer la recherche il faut tout simplement ajouter 
		des mots clés dans le champs recherche en haut du site
		-> Pages utilisées :
			1) includes/views/header.inc.html (<!-- Recherche d'articles -->)
			2) views/index.html
			3) index.php (/* Si il y a une recherche */)
			
	-> Affichage articles : Tout les articles sont affichés
		-> Pages utilisées :
			1) index.php
			2) views/index.html
	***********************************************************************************	
	
	***************** Si l'utilisateur est authentifier *******************************
	
	-> Menu déroulant à droite (l'email) :
		-> Explications : Ce menu déroulant permet d'accèder à différentes fonctionnalités 
		-> Fonctionnalités : 
			"Mon compte" : (Aucun développement pour le moment)
			"Messages Privés" : C'est un historique des actions faites par les admins (ajout,modif,sup)
				-> Pages utilisées : 
					1) messagerie.php
					2) views/messagerie.html
			"Rédiger un article" : Permet d'ajouter un nouvel article
				-> Pages utilisées : 
					1) article.php
					2) views/article.html
					3) includes/add_articles.inc.php
			"Déconnexion" : Permet de se déconnecter
				-> Pages utilisées : 
					1) deconnexion.php
					
	-> Modification d'article : 
		-> Explications : C'est le bouton "Modifier" qui permet la modification d'un article
		-> Pages utilisées : 
			1) modif_article.php
			2) views/modif_article.html
			2) includes/modif_articles.inc.php
	
	-> Suppression d'article : 
		-> Explications : C'est le bouton "Supprimer" qui permet la suppression d'un article
		-> Pages utilisées : 
			1) includes/sup_articles.inc.php
					
	-> Lire la suite :
		-> Explications : Ce lien javascript permet d'afficher dans sa totalités, l'article
		possédant un texte trop long
		-> Pages utilisées : 
			1) views/afficher_article.html
			1) afficher_article.php

	***********************************************************************************