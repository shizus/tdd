<?php
include ('clases/MySQL.php');
include("models/mainModel.php");
if(isset($_POST['op']))$operacion = $_POST['op'];
else $operacion = $_GET['op'];

if(isset($_POST['id']))$id = $_POST['id'];
$MySQL = MySQL::getInstance();
$mainModel = new MainModel();


function ValidaMail($email) {
    if (ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $email ) ) {
       return true;
    } else {
       return false;
    }
} 

switch($operacion){
	
	case 'suscription':
		$email = $_POST['email'];
		
		if(ValidaMail($email)){
			$sql = "INSERT INTO suscriptions SET email = {$email} ";
			$MySQL->setQuery ($sql);
			
			if($MySQL->execute()) {	
				$data['msg'] = 'gracias por suscribirte al newsletter!';
			}
			else {
				$data['err'] = 1;
				$data['msg'] = 'por favor intente nuevamente';
			}
		}
		else {
			$data['err'] = 1;
			$data['msg'] = 'revisá que el correo esté escrito correctamente';
		}
		
	break;
}
	
	?>