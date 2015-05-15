
				<div class="row">
					<div class="col-sm-12">
					<div id="DataTables_Table_8_filter" class="dataTables_filter">
						
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Listado</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin table-bordered usertable">
									<thead>
										<tr>
											<th width="100">Fecha</th>
											<th>Título</th>
											<th width="100">Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php										
										foreach($registros as $registro){
										?>
										<tr id="list_<?php echo $registro->id; ?>">
											<td><?php echo date('d/m/Y',strtotime($registro->fecha)); ?></td>
											<td><?php echo ($registro->titulo); ?></td>
											<td>
												<a href="javascript:borrar('<?php echo $registro->id; ?>')" class="btn" rel="tooltip" title="Eliminar">
													<i class="fa fa-times"></i>
												</a>
												<a href="index.php?a=novedades&t=modifica&id=<?php echo $registro->id; ?>" class="btn" rel="tooltip" title="Modificar">
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
  if (confirm('Desea borrar este artículo?')){   
		jQuery.post('Cpanel.php?op=9',{'id':id},function(data){
				$('#list_'+id).remove();
		});
	}
}
</script>