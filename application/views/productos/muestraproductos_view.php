<?php if (!$productos) { ?>

	<div class="container py-3">
		<div class="well">
		<br>
		<h1>Lo sentimos ...</h1>
			<h2>No hay Productos stock!</h2>
		</div>
		<?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
			<a type="button" class="btn btn-success" href="<?php echo base_url('producto_agregar'); ?>">Agregar</a>
			<a type="button" class="btn btn-danger" href="<?php echo base_url('productos_eliminados'); ?>">Eliminar</a>
			<br> <br>
		<?php } ?>

	</div>
	

<?php } else { ?>

	<div class="container-fluid py-3">
		<div class="well">
			<h3>LISTADO DE LOS PRODUCTOS</h3>
		</div>	
		<a type="button" class="btn btn-success" href="<?php echo base_url('verifico_nuevoproducto'); ?>">Agregar</a>
		<a type="button" class="btn btn-danger" href="<?php echo base_url('productos_eliminados'); ?>">Eliminados</a>
		<br> <br>
	<!--------Busca por Id--------------------------------------------------->
	<br>
		
	
		<!-- <?php $this->load->view('pag_links');?>-->
			
	<table class="table table-bordered table-horver table-striped mt-5 shadow">

		<thead class="table-dark">
		<tr class="subtitulo">
					<th>ID_PRODUCTO</th>
					<th>DESCRIPCIÓN</th>
					<th>CATEGORIA</th>
					<th>PRECIO VENTA</th>
					<th>STOCK</th>
					<th>IMAGEN</th>
					<th>BAJA</th>
					<th>MODIFCAR</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos->result() as $row)
				{ 
					$imagen = $row->imagen;	?>
					<tr>
					<td><?php echo $row->id;  ?>
					<td><?php echo $row->descripcion;  ?></td>
					<td><?php echo $row->categoria_id;  ?></td>
					<!--<td><?php echo $row->precio_costo;  ?></td>-->
					<td><?php echo $row->precio_venta;  ?></td>
					<td><?php echo $row->stock;  ?></td>
					<td><img height="80px"src="<?php echo $imagen; ?>"/></td>
					<td><?php echo $row->baja;?></td>
				<td><a href="<?php echo base_url("verifico_modificar_producto/$row->id");?>">Modificar</a>|<a href="<?php echo base_url("eliminar_produ/$row->id");?>">Eliminar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>
<div class="d-flex justify-content-end"><a class="btn btn-outline-primary contenido" href="<?=base_url('panel')?>"><< Volver a inicio</a></div>

<br>
<br>
<br>