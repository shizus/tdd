<?php
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);

include("clases/MySQL.php");
include("clases/Upload.php");
include("controllers/mainController.php");

$MySQL = MySQL::getInstance ();

if(isset($_POST['op'])){
	$operacion = $_POST['op'];
}
else{
	$operacion = $_GET['op'];
}
				
$mainController = new MainController();

switch($operacion){
	
	case 1:
		$id = $mainController->nuevoProyecto($_POST);
		if($id!==false){
			header("location: index.php?a=portfolio&t=modifica&id=".$id);
		}
		break;
	
	case 2:
		$id = $mainController->modificaProyecto($_POST);
		if($id!==false){
			header("location: index.php?a=portfolio");
		}
		break;
	
	case 3:
		$item_id = $_POST['id'];
		foreach($_SESSION['slides'][$_POST['id']] as $slide){
			$id = $mainController->nuevoSlideMulti($_POST,$slide);
			$ruta = '../portfolio/'.$item_id.'/'.$slide;
			?>			
				<li id="list_<?php echo $id; ?>">
					<a href="javascript:borrarSlide(<?php echo $id; ?>,'<?php echo $ruta; ?>')" class="btn" rel="tooltip" title="Eliminar">
							<i class="fa fa-times"></i>
						</a>
					<img src="<?php echo $ruta; ?>" width="200" />
				</li>
			<?php
		}
		unset($_SESSION['slides'][$item_id]);
		break;
	
	case 4:		
		$i = 1;
		foreach($_POST['list'] as $id){
			$sql = "UPDATE portfolio_item_image SET `order` = {$i} WHERE id = {$id}";
			$MySQL->setQuery($sql);
			$MySQL->execute();	
			$i++;
		}
		break;
	
	case 5:
		$id = $_POST['id'];
		$item_id = $_POST['item_id'];
		$ruta = $_POST['ruta'];
		$ruta_thumbs = str_replace('portfolio/','portfolio/thumbs/',$_POST['ruta']);
		
		$sql = "DELETE FROM portfolio_item_image WHERE id = {$id}";
		$MySQL->setQuery($sql);
		$MySQL->execute();
		
		break;		
		
	
	case 6:
		$id = $_POST['id'];
		
		$sql = "SELECT * FROM portfolio_item_image WHERE item_id = {$id}";
		$MySQL->setQuery($sql);
		$slides = $MySQL->loadObjectList();
		
		foreach($slides as $slide){
			$ruta = '../portfolio/'.$id.'/'.$slide->image;
			$ruta_thumbs = '../portfolio/thumbs/'.$id.'/'.$slide->image;		
			if(file_exists($ruta)){ unlink($ruta); }
			if(file_exists($ruta_thumbs)){ unlink($ruta_thumbs); }
		}
		
		$sql = "DELETE FROM portfolio_item_image WHERE item_id = {$id}";
		$MySQL->setQuery($sql);
		$MySQL->execute();
		
		$sql = "DELETE FROM portfolio_item_categoria WHERE item_id = {$id}";
		$MySQL->setQuery($sql);
		$MySQL->execute();
		
		$sql = "DELETE FROM portfolio_items WHERE id = {$id}";
		$MySQL->setQuery($sql);
		$MySQL->execute();
		
		break;
	
	case 7:
		$id = $mainController->nuevoArticulo($_POST);
		if($id!==false){
			header("location: index.php?a=novedades");
		}
		break;
	
	case 8:
		$id = $mainController->modificaArticulo($_POST);
		if($id!==false){
			header("location: index.php?a=novedades");
		}
		break;
	
	case 9:
		$id = $_POST['id'];
		
		$sql = "SELECT * FROM novedades WHERE id = {$id}";
		$MySQL->setQuery($sql);
		$novedad = $MySQL->loadObject();
		
		$ruta = '../uploads/novedades/'.$novedad->imagen;
		$ruta_thumbs = '../uploads/novedades/thumbs/'.$novedad->imagen;		
		if(file_exists($ruta)){ unlink($ruta); }
		if(file_exists($ruta_thumbs)){ unlink($ruta_thumbs); }
		
		$sql = "DELETE FROM novedades WHERE id = {$id}";
		$MySQL->setQuery($sql);
		$MySQL->execute();
		
		break;
}

?>