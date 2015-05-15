
			<div class="page-header">
				<div class="pull-left">
					<h1>Portfolio</h1>
				</div>
			</div>
			<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Modificar proyecto</h3>
							</div>
							<div class="box-content">
							<form action="Cpanel.php?op=2" method="POST" class='form-horizontal'>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Título del proyecto</label>
										<div class="col-sm-10">
											<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $registro->nombre; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Cliente</label>
										<div class="col-sm-10">
											<input type="text" name="cliente" id="cliente" class="form-control" value="<?php echo $registro->cliente; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Expo</label>
										<div class="col-sm-10">
											<input type="text" name="expo" id="expo" class="form-control" value="<?php echo $registro->expo; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Lugar</label>
										<div class="col-sm-10">
											<input type="text" name="lugar" id="lugar" class="form-control" value="<?php echo $registro->lugar; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Año</label>
										<div class="col-sm-10">
											<input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo $registro->fecha; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Tareas</label>
										<div class="col-sm-10">
											<input type="checkbox" name="disenio" id="disenio" value="1" <?php if($registro->disenio==1) echo ' checked="checked"'; ?> /> Diseño<br>
											<input type="checkbox" name="construccion" id="construccion" value="1" <?php if($registro->construccion==1) echo ' checked="checked"'; ?> /> Construcción<br>
											<input type="checkbox" name="instalacion" id="instalacion" value="1" <?php if($registro->instalacion==1) echo ' checked="checked"'; ?> /> Instalación<br>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Categorías</label>
										<div class="col-sm-10">
											<select name="categoria_id[]" multiple="MULTIPLE" class="form-control" id="categoria_id">
												<?php
													$cat = array();
													foreach($categorias_item as $categoria){
														$cat[] = $categoria->categoria_id;
													}
													foreach($categorias as $categoria){
														$subcategorias = $this->mainModel->traerCategoriasPortfolio($categoria->id);
													?>
														<option value="<?php echo $categoria->id; ?>" <?php if(in_array($categoria->id,$cat)) echo 'selected="selected"'; ?>><?php echo $categoria->categoria; ?></option>
													<?php
														if(count($subcategorias)>0){
															foreach($subcategorias as $subcategoria){
															?>
																<option value="<?php echo $subcategoria->id; ?>" <?php if(in_array($subcategoria->id,$cat)) echo 'selected="selected"'; ?>>- <?php echo $subcategoria->categoria; ?></option>
															<?php
															}
														}
													}
												?>
                                            </select>
										</div>
										<div class="clearfix"></div>
									</div>
									
									<div class="form-actions">
										<input type="hidden" name="id" id="id" value="<?php echo $registro->id; ?>" />
										<button type="submit" class="btn btn-primary">Guardar</button>
										<a href="index.php" class="btn">Cancelar</a>
									</div>
								</form>
							</div>
							
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Administrar Imagenes</h3>
							</div>
							<div class="box-content">
								
								<div class="form-group">
									<input id="image" name="image" type="file" multiple>
									<div class="clearfix"></div>
								</div>
								<ul id="slides" class="img">
									<?php 
									foreach($slides as $slide){
									$ruta = '../portfolio/'.$registro->id.'/'.$slide->image;
									?>
										<li id="list_<?php echo $slide->id; ?>">
											<a href="javascript:borrarSlide(<?php echo $slide->id; ?>,'<?php echo $ruta; ?>')" class="btn" rel="tooltip" title="Eliminar">
													<i class="fa fa-times"></i>
												</a>
											<img src="<?php echo $ruta; ?>" width="200" />
										</li>
									<?php } ?>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			
	<script src="uploadifive/jquery.uploadifive.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="uploadifive/uploadifive.css">
	<script type="text/javascript">
		<?php 
		$timestamp = time();		
		$nombreArchivo = 'port_'.$registro->id;
		$targetFolder = '/portfolio/'.$registro->id;
		$targetFolderThumb = '/portfolio/thumbs/'.$registro->id;
		?>
		jQuery(function() {
		
		
			$("#slides").sortable({ opacity: 0.8, cursor: 'move', update: function() {			
					var order = $(this).sortable("serialize");; 
					$.post("Cpanel.php?op=4", order); 															 
				}								  
			});
			
			jQuery('#image').uploadifive({
				'formData'     : {
					'<?php echo session_name();?>' : '<?php echo session_id();?>',
					'timestamp'   : '<?php echo $timestamp;?>',
					'token'       : '<?php echo md5('unique_salt' . $timestamp);?>',
					'newFileName' : '<?php echo $nombreArchivo;?>',
					'targetFolder' : '<?php echo $targetFolder;?>',
					'targetFolderThumb' : '<?php echo $targetFolderThumb;?>',
					'target': 'portfolio',
					'session': <?php echo $registro->id; ?>,
					'x'      : '700',
					'y'      : '600',
					'thumb_x'      : '280',
					'thumb_y'      : '220'
				},
				'width'      : 120,
				'uploadScript' : 'uploadifive/uploadifive.php',
				'buttonText' : 'Imagenes',
				'onQueueComplete' : function(queueData) {
					var id = jQuery('#id').val();
					var conteiner = $('#slides');
					console.log(id);
					jQuery.post('Cpanel.php?op=3',{'id':id},function(data){	
						conteiner.append(data);
						jQuery('#uploadifive-image-queue').html('');
					});
				}
			});
		});
	
		function borrarSlide(id,ruta) {
			var item_id = jQuery('#id').val();
		  if (confirm('Desea borrar esta imagen?')){   
				jQuery.post('Cpanel.php?op=5',{'id':id, 'ruta': ruta, 'item_id': item_id},function(data){
						$('#list_'+id).remove();
				});
			}
		}
	</script>