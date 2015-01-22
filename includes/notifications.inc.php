<?php  /************************************CREATED BY JORDAN*********************************\
/* Ouverture des sessions*/
session_start();

/* On inclus Smarty */
require_once("../tpl/smarty.class.php");

/* On créer un nouvel objet Smarty */
$notifs = new Smarty();

/* On renvoi le template notifications à Smarty */
$notifs->display("views/notifications.inc.html");
?>