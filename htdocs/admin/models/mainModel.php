<?php

class MainModel {

    private $MySQL;

    public function __construct(){
        $this->MySQL = MySQL::getInstance();
    }
	
	//PORTFOLIO
	
    public function traerCategoriasPortfolio($idPadre){		
      $sql = "SELECT * from portfolio_categorias WHERE parent_id = {$idPadre}";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
    public function traerCategoriaPortfolio($idCategoria){		
      $sql = "SELECT * from portfolio_categorias WHERE categoria_id = {$idCategoria}";
      $this->MySQL->setQuery($sql);
	  $categoria = $this->MySQL->loadObject();
	  return $categoria->categoria;
	}
	
    public function listarPortfolio($idCategoria){		
      $sql = "SELECT * from portfolio_items ";
      if($idCategoria>0) $sql .= "WHERE id IN (SELECT item_id as id FROM portfolio_item_categoria WHERE categoria_id = {$idCategoria}) ";
      $sql .= "ORDER BY orden ASC ";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
    public function traerItemPortfolio($id){		
      $sql = "SELECT * from portfolio_items WHERE id = {$id}";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObject();
	}
	
    public function traerImagenesPortfolio($id){		
      $sql = "SELECT * from portfolio_item_image WHERE item_id = {$id} ORDER BY `order` ASC";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
    public function traerCategoriasItemPortfolio($id){		
      $sql = "SELECT pic.*, pc.categoria from portfolio_item_categoria pic INNER JOIN portfolio_categorias pc ON pic.categoria_id = pc.id  WHERE item_id = {$id}";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
	
	//NOVEDADES
	
    public function traerCategoriasNovedades(){		
      $sql = "SELECT * from novedades_categorias";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
    public function traerNovedad($id){		
      $sql = "SELECT * from novedades WHERE id = {$id}";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObject();
	}
	
    public function listarNovedades($idCategoria){		
      $sql = "SELECT n.*, nc.categoria from novedades n INNER JOIN novedades_categorias nc ON n.categoria_id = nc.id ";
      if($idCategoria>0) $sql .= "WHERE categoria_id = {$idCategoria} ";
      $sql .= "ORDER BY fecha DESC ";
      $this->MySQL->setQuery($sql);
	  return $this->MySQL->loadObjectList();
	}
	
}
?>
