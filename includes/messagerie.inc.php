<?php
/************************************ Messagerie *****************************************/
/* Requête servant à compter le nombre de message non vu */
$query_vue = $connexion->prepare("SELECT COUNT(vue) FROM messagerie WHERE vue='0'");
$query_vue->execute();

$row2 = $query_vue->fetch();
$vue = $row2[0];

/****************************************************************************************/
?>