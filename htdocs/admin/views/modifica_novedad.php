
			<div class="page-header">
				<div class="pull-left">
					<h1>Novedades</h1>
				</div>
			</div>
			<div class="row">
					<div class="col-sm-12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-edit"></i>Modificar artículo</h3>
							</div>
							<div class="box-content">
							<form action="Cpanel.php?op=8" method="POST" class='form-horizontal' enctype="multipart/form-data" >
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Fecha</label>
										<div class="col-sm-10">
											<input type="text" name="fecha" id="fecha" class="form-control datepicker" value="<?php echo date('d/m/Y',strtotime($registro->fecha)); ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Título</label>
										<div class="col-sm-10">
											<input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $registro->titulo; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Texto corto</label>
										<div class="col-sm-10">
											<textarea name="texto_corto" id="texto_corto" class="form-control"><?php echo $registro->texto_corto; ?></textarea>
											<script> CKEDITOR.replace( 'texto_corto' ); </script>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Texto</label>
										<div class="col-sm-10">
											<textarea name="texto" id="texto" class="form-control"><?php echo $registro->texto; ?></textarea>
											<script> CKEDITOR.replace( 'texto' ); </script>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Imagen</label>
										<div class="col-sm-10">
											<input type="file" name="imagen" id="imagen" class="form-control" />
											<?php if($registro->imagen!=''){ ?><br><img src="../uploads/novedades/<?php echo $registro->imagen; ?>" width="200" /><?php } ?>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Palabras claves</label>
										<div class="col-sm-10">
											<input type="text" name="tags" id="tags" class="form-control" value="<?php echo $registro->tags; ?>" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Categorías</label>
										<div class="col-sm-10">
											<select name="categoria_id" class="form-control" id="categoria_id">
												<?php
													foreach($categorias as $categoria){
													?>
														<option value="<?php echo $categoria->id; ?>" <?php if($categoria->id==$registro->categoria_id) echo 'selected="selected"'; ?>><?php echo $categoria->categoria; ?></option>
													<?php
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
							
						</div>
					</div>
				</div>