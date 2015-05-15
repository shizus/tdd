
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
									<i class="fa fa-edit"></i>Alta de artículo</h3>
							</div>
							<div class="box-content">
							<form action="Cpanel.php?op=7" method="POST" class='form-horizontal' enctype="multipart/form-data" >
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Fecha</label>
										<div class="col-sm-10">
											<input type="text" name="fecha" id="fecha" class="form-control datepicker" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Título</label>
										<div class="col-sm-10">
											<input type="text" name="titulo" id="titulo" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Texto corto</label>
										<div class="col-sm-10">
											<textarea name="texto_corto" id="texto_corto" class="form-control"></textarea>
											<script> CKEDITOR.replace( 'texto_corto' ); </script>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Texto</label>
										<div class="col-sm-10">
											<textarea name="texto" id="texto" class="form-control"></textarea>
											<script> CKEDITOR.replace( 'texto' ); </script>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Imagen</label>
										<div class="col-sm-10">
											<input type="file" name="imagen" id="imagen" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Palabras claves</label>
										<div class="col-sm-10">
											<input type="text" name="tags" id="tags" class="form-control" />
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
														<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->categoria; ?></option>
													<?php
													}
												?>
                                            </select>
										</div>
										<div class="clearfix"></div>
									</div>
									
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Guardar</button>
										<a href="index.php" class="btn">Cancelar</a>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>