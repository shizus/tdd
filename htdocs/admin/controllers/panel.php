<?php

class Panel {
	private $id;
	private $tipo;
	private $id_tipo;
	private $mainModel;
	private $wday;
	private $months;
	private $user;
	
	function __construct(){
		if(isset($_GET["t"])) $this->tipo = $_GET["t"];
		if(isset($_GET["idt"])) $this->idt = $_GET["idt"];
		if(isset($_GET["id"])) $this->id = $_GET["id"];
		if(!isset($_GET['page'])) $this->page = 1;
		$this->mainModel = new MainModel();
		if(isset($_SESSION['registrado'])) $this->user = $_SESSION['registrado'];
		$this->wday = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
		$this->months = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		
	}

	function index(){
		$seccion = "Bienvenido";
		include("views/header.php");
		include("views/footer.php");
	}
	
	
	function login(){
		$seccion = "Login";
		include("views/login.php");
	}
	
	function portfolio(){
		$categorias = $this->mainModel->traerCategoriasPortfolio(0);
		switch($this->tipo){
			case 'categorias':
				$view = 'listado_categorias_portfolio.php';
			break;
			case 'alta':
				$view = 'alta_item_portfolio.php';
			break;
			case 'modifica':
				$registro = $this->mainModel->traerItemPortfolio($this->id);
				$slides = $this->mainModel->traerImagenesPortfolio($this->id);
				$categorias_item = $this->mainModel->traerCategoriasItemPortfolio($this->id);
				$view = 'modifica_item_portfolio.php';
			break;
			default:
				if(isset($this->id)) $idCategoria = $this->id;
				else $idCategoria = 0;
				$registros = $this->mainModel->listarPortfolio($idCategoria);
				$view = 'listado_portfolio.php';
			break;
		}
		include("views/header.php");
		include("views/{$view}");
		include("views/footer.php");		
	}
	
	function novedades(){
		$categorias = $this->mainModel->traerCategoriasNovedades();
		switch($this->tipo){
			case 'categorias':
				$view = 'listado_categorias_novedades.php';
			break;
			case 'alta':
				$view = 'alta_novedad.php';
			break;
			case 'modifica':
				$registro = $this->mainModel->traerNovedad($this->id);
				$view = 'modifica_novedad.php';
			break;
			default:
				if(isset($this->id)) $idCategoria = $this->id;
				else $idCategoria = 0;
				$registros = $this->mainModel->listarNovedades($idCategoria);
				$view = 'listado_novedades.php';
			break;
		}
		include("views/header.php");
		include("views/{$view}");
		include("views/footer.php");		
	}
		
	function usr(){
		switch($this->tipo){
			case "dologin":
				$usr = $_POST['user'];
				$pass = $_POST['password'];
				$md5 = md5($pass);
				$sql = "SELECT * FROM user WHERE password = '$md5' AND user = '$usr'";
				$MySQL = MySQL::getInstance();
				$MySQL->setQuery($sql);
				$MySQL->execute();
				$datosusuario = $MySQL->loadObject();
				$cuenta = $MySQL->getNumRows();
				if($cuenta == 1){
					$_SESSION['registrado'] = array();
					$_SESSION['registrado']['id'] = $datosusuario->id;
					$_SESSION['registrado']['usuario'] = $datosusuario->user;				
					header('Location: index.php');				
				}
				else{
					header('Location: ?a=login&err=1');
				}
				break;
			case "logout":
				session_destroy();				
				header('Location: ?m=login');
				break;
		}
	}


}


?>