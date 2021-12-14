<?php if (!$muestra_consultas) { ?>
	<div class="container alturita">
		<div class="well">
			<h3>No se realizaron Consultas</h3>
		</div>
	</div>

<?php } else { ?>
	<div class="container-fluid py-4">
		<div class="well ">
			<h3>TODAS LAS CONSULTAS</h3>
		</div>
	

			<table class="datatable table-dark th table-dark td table-dark thead mt-2 th  table-responsive ">
				<!-- ver si va table-active -->
				<table borde="2" width="95%" align-middle>

					<table class="table table-bordered table-horver table-striped mt-5 shadow"style="width:100%">
					
						<thead class="table-dark">
							<tr class="subtitulo">

								<th>Nº</th>
								<th>NOMBRE</th>
								<th>EMAIL</th>
								<th>TELEFONO</th>
								<th>MENSAJE</th>
								<th>CONTESTADO</th>
								<th> CONTESTAR </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($muestra_consultas->result() as $row) { ?>
								<tr>
									<td><?php echo $row->consulta_id;  ?></td>
									<td><?php echo $row->nombre;  ?></td>
									<td><?php echo $row->email;  ?></td>
									<td><?php echo $row->telefono;  ?></td>
									<td><?php echo $row->mensaje;  ?></td>
									<td><?php echo $row->baja;  ?></td>

									<td><a href="<?php echo base_url("modificar_consu/$row->consulta_id"); ?>">NO</a>
										<i class="material-icons icono-color"> || </i></a><a href="<?php echo base_url("eliminar_consu/$row->consulta_id"); ?>">SI</a>
									</td>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</table>
			</table>
					<br>
					<br>
				</div>
	</div>
	</div>
<?php } ?>
<br>

<br>
<br>
<br>

<br>
<div class="d-flex justify-content-end"><a class="btn btn-outline-primary contenido" href="<?=base_url('panel')?>"><< Volver a inicio</a></div>
<br>