<?php 
require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute les class de Smarty
require_once('includes/connexion_bdd.inc.php'); // On fait la connexion à la BDD

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];

/* Extraction des informations */
$query = $connexion->prepare("INSERT INTO utilisateurs (nom,prenom,email,password) VALUES ('$nom','$prenom','$email','$password')");
$query->execute(); // On execute la requête

header('Location: index.php?success=5'); // Redirection
exit();
?>