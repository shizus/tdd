
				<div class="row">
					<div class="col-sm-12">
					<div id="DataTables_Table_8_filter" class="dataTables_filter">
						<p></p>
						<p></p>
						<p></p>
						<form action="index.php?a=l&t=usuarios" method="GET" class='form-horizontal'>
							<label>
							<span>Buscar:</span>
							<select name="id" id="id">
								<option value="0">Todas las Categorías</option>
								<?php
									foreach($categorias as $categoria){
										$subcategorias = $this->mainModel->traerCategoriasPortfolio($categoria->id);
									?>
										<option value="<?php echo $categoria->id; ?>" <?php if($categoria->id==$this->id) echo 'selected="selected"'; ?>><?php echo $categoria->categoria; ?></option>
									<?php
										if(count($subcategorias)>0){
											foreach($subcategorias as $subcategoria){
											?>
												<option value="<?php echo $subcategoria->id; ?>" <?php if($subcategoria->id==$this->id) echo 'selected="selected"'; ?>>- <?php echo $subcategoria->categoria; ?></option>
											<?php
											}
										}
									}
								?>
							</select>
							<input type="hidden" name="a" value="portfolio" >
							<button type="submit" class="btn btn-primary">BUSCAR</button>
							</label>
						</form>
						
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Listado</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin table-bordered usertable">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Expo</th>
											<th>Categoría</th>
											<th width="100">Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php										
										foreach($registros as $registro){
											$categorias_item = $this->mainModel->traerCategoriasItemPortfolio($registro->id);
											$cat = array();
											foreach($categorias_item as $categoria){
												$cat[] = $categoria->categoria;
											}
										?>
										<tr id="list_<?php echo $registro->id; ?>">
											<td><?php echo ($registro->nombre); ?></td>
											<td><?php echo ($registro->expo); ?></td>
											<td><?php echo implode(', ',$cat); ?></td>
											<td>
												<a href="javascript:borrar('<?php echo $registro->id; ?>')" class="btn" rel="tooltip" title="Eliminar">
													<i class="fa fa-times"></i>
												</a>
												<a href="index.php?a=portfolio&t=modifica&id=<?php echo $registro->id; ?>" class="btn" rel="tooltip" title="Modificar">
													<i class="fa fa-edit"></i>
												</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">

function borrar(id) {
  if (confirm('Desea borrar este proyecto?')){   
		jQuery.post('Cpanel.php?op=6',{'id':id},function(data){
				$('#list_'+id).remove();
		});
	}
}
</script>