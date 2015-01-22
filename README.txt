========================  Blog Smarty by Westelynck Jordan  ===========================

=============---------------  Les fonctionnalit�s du blog : ----------=================
	************ Fichier template inclus et connexion � la base de donn�es ************
	-> Haut / Bas de page / Pagination / Notifications
		-> Page utilis�es : 
			1) includes/views/header.inc.html 
			2) includes/views/footer.inc.html
			3) includes/views/pagination.inc.html
			4) includes/views/notification.inc.html
			5) includes/notification.inc.php
			
	-> Chargement de la page de 0 � 100% afin d'indiquer � l'utilisateur que celle ci soit bien charg�e
		-> Page utilis�es : 
			1) views/index.html (les deux premi�res div et le script de fin)
			2) assets/js/pageloader.js
			
	-> Connexion BDD : Utile pour pouvoir se connecter � la base de donn�es
		-> Page utilis�es : 
			1) includes/connexion_bdd.php
	***********************************************************************************
	
	***************** Si l'utilisateur n'est pas authentifier *************************
	-> Inscription : Pour cela cliqu� simplement sur le bouton "Inscription" � l'index du site
		-> Explications : Remplissez tout les champs demand�s
		-> Pages utilis�es :
			1) inscription.php
			2) includes/views/header.inc.html (<!-- Modal Inscription -->)
	
	-> Connexion : Deux champs vous sont propos�s en haut dans la barre bleu
		-> Explications : Mettez votre bon email et bon mot de passe que vous avez saisi 
		pour l'inscription
		-> Pages utilis�es :
			1) includes/views/header.inc.html (<!-- Connexion  & Inscription -->)
			2) connexion.php
	
	-> Recherche : C'est l'affichage de tout les articles d'une recherche
		-> Explications : Pour effectuer la recherche il faut tout simplement ajouter 
		des mots cl�s dans le champs recherche en haut du site
		-> Pages utilis�es :
			1) includes/views/header.inc.html (<!-- Recherche d'articles -->)
			2) views/index.html
			3) index.php (/* Si il y a une recherche */)
			
	-> Affichage articles : Tout les articles sont affich�s
		-> Pages utilis�es :
			1) index.php
			2) views/index.html
	***********************************************************************************	
	
	***************** Si l'utilisateur est authentifier *******************************
	
	-> Menu d�roulant � droite (l'email) :
		-> Explications : Ce menu d�roulant permet d'acc�der � diff�rentes fonctionnalit�s 
		-> Fonctionnalit�s : 
			"Mon compte" : (Aucun d�veloppement pour le moment)
			"Messages Priv�s" : C'est un historique des actions faites par les admins (ajout,modif,sup)
				-> Pages utilis�es : 
					1) messagerie.php
					2) views/messagerie.html
			"R�diger un article" : Permet d'ajouter un nouvel article
				-> Pages utilis�es : 
					1) article.php
					2) views/article.html
					3) includes/add_articles.inc.php
			"D�connexion" : Permet de se d�connecter
				-> Pages utilis�es : 
					1) deconnexion.php
					
	-> Modification d'article : 
		-> Explications : C'est le bouton "Modifier" qui permet la modification d'un article
		-> Pages utilis�es : 
			1) modif_article.php
			2) views/modif_article.html
			2) includes/modif_articles.inc.php
	
	-> Suppression d'article : 
		-> Explications : C'est le bouton "Supprimer" qui permet la suppression d'un article
		-> Pages utilis�es : 
			1) includes/sup_articles.inc.php
					
	-> Lire la suite :
		-> Explications : Ce lien javascript permet d'afficher dans sa totalit�s, l'article
		poss�dant un texte trop long
		-> Pages utilis�es : 
			1) views/afficher_article.html
			1) afficher_article.php

	***********************************************************************************