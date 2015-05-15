
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
									<i class="fa fa-edit"></i>Nuevo proyecto</h3>
							</div>
							<div class="box-content">
							<form action="Cpanel.php?op=1" method="POST" class='form-horizontal'>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Título del proyecto</label>
										<div class="col-sm-10">
											<input type="text" name="nombre" id="nombre" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Cliente</label>
										<div class="col-sm-10">
											<input type="text" name="cliente" id="cliente" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Expo</label>
										<div class="col-sm-10">
											<input type="text" name="expo" id="expo" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Lugar</label>
										<div class="col-sm-10">
											<input type="text" name="lugar" id="lugar" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Año</label>
										<div class="col-sm-10">
											<input type="text" name="fecha" id="fecha" class="form-control" />
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Tareas</label>
										<div class="col-sm-10">
											<input type="checkbox" name="disenio" id="disenio" value="1" /> Diseño<br>
											<input type="checkbox" name="construccion" id="construccion" value="1" /> Construcción<br>
											<input type="checkbox" name="instalacion" id="instalacion" value="1" /> Instalación<br>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="textfield" class="control-label col-sm-2">Categorías</label>
										<div class="col-sm-10">
											<select name="categoria_id[]" multiple="MULTIPLE" class="form-control" id="categoria_id">
												<?php
													foreach($categorias as $categoria){
														$subcategorias = $this->mainModel->traerCategoriasPortfolio($categoria->id);
													?>
														<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->categoria; ?></option>
													<?php
														if(count($subcategorias)>0){
															foreach($subcategorias as $subcategoria){
															?>
																<option value="<?php echo $subcategoria->id; ?>">- <?php echo $subcategoria->categoria; ?></option>
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
										<button type="submit" class="btn btn-primary">Guardar</button>
										<a href="index.php" class="btn">Cancelar</a>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			