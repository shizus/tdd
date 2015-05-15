<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
session_start();

include("clases/MySQL.php");
include("clases/Upload.php");
include("controllers/mainController.php");
include("models/mainModel.php");
include("controllers/panel.php");


$panel = new Panel();
if(!isset($_GET['a'])){
	$metodo = "index";
}
else{
	$metodo = $_GET['a'];
}

if($metodo != "usr"){
	if(!isset($_SESSION['registrado'])){
		$metodo = "login";
	}
}
if($metodo == ""){
	$metodo = "index";
}

$panel->$metodo();



?>