<?php
@set_time_limit(0);
class MainController {
    private $MySQL;
	
	public function __construct(){
        $this->MySQL = MySQL::getInstance();
	}
	
	
	
	public function nuevoProyecto($datos){
		
		$sql = "INSERT INTO portfolio_items SET ";
		$sql .= "nombre = '{$datos['nombre']}', ";
		$sql .= "cliente = '{$datos['cliente']}', ";
		$sql .= "expo = '{$datos['expo']}', ";
		$sql .= "lugar = '{$datos['lugar']}', ";
		$sql .= "fecha = '{$datos['fecha']}', ";
		$sql .= "disenio = '{$datos['disenio']}', ";
		$sql .= "construccion = '{$datos['construccion']}', ";
		$sql .= "instalacion = '{$datos['instalacion']}', ";
		$sql .= "categoria_id = '{$datos['categoria_id'][0]}', ";
		$sql .= "`orden` = 999 ";
		
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
		$id =  $this->MySQL->getId();
		
		$this->categoriasProyecto($id,$datos['categoria_id']);		
		
		return $id;
	}
	
	public function modificaProyecto($datos){
		
		$sql = "UPDATE portfolio_items SET ";
		$sql .= "nombre = '{$datos['nombre']}', ";
		$sql .= "cliente = '{$datos['cliente']}', ";
		$sql .= "expo = '{$datos['expo']}', ";
		$sql .= "lugar = '{$datos['lugar']}', ";
		$sql .= "fecha = '{$datos['fecha']}', ";
		$sql .= "disenio = '{$datos['disenio']}', ";
		$sql .= "construccion = '{$datos['construccion']}', ";
		$sql .= "instalacion = '{$datos['instalacion']}', ";
		$sql .= "categoria_id = '{$datos['categoria_id'][0]}' ";
		$sql .= "WHERE id = '{$datos['id']}' ";
		
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
		
		$this->categoriasProyecto($datos['id'],$datos['categoria_id']);		
		
		return $datos['id'];
	}
	
	
	public function categoriasProyecto($id,$categorias){
		
		$sql = "DELETE FROM portfolio_item_categoria WHERE item_id = '{$id}';";
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
	
		foreach($categorias as $categoria){
			$sql = "INSERT INTO portfolio_item_categoria SET ";
			$sql .= "item_id = '{$id}', ";
			$sql .= "categoria_id = '{$categoria}'; ";
			
			$this->MySQL->setQuery($sql);
			$this->MySQL->execute();
		}
	}
	
	public function nuevoSlideMulti($datos,$image){
		
		$sql = "INSERT INTO portfolio_item_image SET ";
		$sql .= "item_id = '{$datos['id']}', ";
		$sql .= "image = '{$image}', ";
		$sql .= "`order` = 999 ";
		
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
		
		return $this->MySQL->getId();
	}
	
	
	
	
	public function nuevoArticulo($datos){
		
		if($_FILES['imagen']){
			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->image_resize         = true;
				$handle->image_x              = 800;
				$handle->image_y              = 390;
				$handle->image_ratio_crop     = true;
				
				$handle->process('../uploads/novedades/');
				if ($handle->processed) {
					$datos['imagen'] = "$handle->file_dst_name_body.$handle->file_dst_name_ext";
					$thumb = "$handle->file_dst_name_body";
				} else {
					echo 'error : ' . $handle->error;
				}
			}
			
			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->file_new_name_body   = $thumb;
				$handle->image_resize         = true;
				$handle->image_x              = 380;
				$handle->image_y              = 190;
				$handle->image_ratio_crop     = true;
				
				$handle->process('../uploads/novedades/thumbs');
				if ($handle->processed) {
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}
		list($d,$m,$y) = explode('/',$datos['fecha']);
		$fecha = "{$y}-{$m}-{$d}";
		$sql = "INSERT INTO novedades SET ";
		$sql .= "titulo = '{$datos['titulo']}', ";
		$sql .= "texto_corto = '{$datos['texto_corto']}', ";
		$sql .= "texto = '{$datos['texto']}', ";
		$sql .= "categoria_id = '{$datos['categoria_id']}', ";
		$sql .= "fecha = '{$fecha}', ";
		$sql .= "imagen = '{$datos['imagen']}', ";
		$sql .= "tags = '{$datos['tags']}' ";
		
		echo $sql;
		
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
		
		return true;
	}
	
	public function modificaArticulo($datos){
		
		if($_FILES['imagen']){
			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->image_resize         = true;
				$handle->image_x              = 800;
				$handle->image_y              = 390;
				$handle->image_ratio_crop     = true;
				
				$handle->process('../uploads/novedades/');
				if ($handle->processed) {
					$datos['imagen'] = "$handle->file_dst_name_body.$handle->file_dst_name_ext";
					$thumb = "$handle->file_dst_name_body";
				} else {
					echo 'error : ' . $handle->error;
				}
			}
			
			$handle = new upload($_FILES['imagen']);
			if ($handle->uploaded) {
				$handle->file_new_name_body   = $thumb;
				$handle->image_resize         = true;
				$handle->image_x              = 380;
				$handle->image_y              = 190;
				$handle->image_ratio_crop     = true;
				
				$handle->process('../uploads/novedades/thumbs');
				if ($handle->processed) {
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}
		
		list($d,$m,$y) = explode('/',$datos['fecha']);
		$fecha = "{$y}-{$m}-{$d}";
		
		$sql = "UPDATE novedades SET ";
		$sql .= "titulo = '{$datos['titulo']}', ";
		$sql .= "texto_corto = '{$datos['texto_corto']}', ";
		$sql .= "texto = '{$datos['texto']}', ";
		$sql .= "categoria_id = '{$datos['categoria_id']}', ";
		$sql .= "fecha = '{$fecha}', ";
		if($datos['imagen']!='') $sql .= "imagen = '{$datos['imagen']}', ";
		$sql .= "tags = '{$datos['tags']}' ";
		$sql .= "WHERE id = '{$datos['id']}' ";
		
		$this->MySQL->setQuery($sql);
		$this->MySQL->execute();
		
		return true;
	}
	
}

?>