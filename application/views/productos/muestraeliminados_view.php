<?php if (!$productos) { ?>

	<div class="container">
		<div class="well">
			<h1>No hay Eliminados</h1>
		</div>	
	</div>

<?php } else { ?>

	<div class="container">
		<div class="well">
			<h1>Todos los Eliminados</h1>
		</div>	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>DESCRIPCION</th>
					<th>CATEGORIA</th>
					<th>PRECIO VENTA</th>
					<th>STOCK</th>
					<th>BAJA</th>
					<th>ACCION</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos->result() as $row){ ?>
				<tr>
					<td><?php echo $row->id;  ?></td>
					<td><?php echo $row->descripcion;  ?></td>
					<td><?php echo $row->categoria_id;  ?></td>
					<td><?php echo $row->precio_venta;  ?></td>
					<td><?php echo $row->stock;  ?></td>
					<td><?php echo $row->baja;  ?></td>
					<td><a href="<?php echo base_url("verifico_modificar_producto/$row->id");?>">Modificar</a>|<a href="<?php echo base_url("activar_produ/$row->id");?>">Activar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>