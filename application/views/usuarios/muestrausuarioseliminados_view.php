<?php if (!$usuarios) { ?>

	<div class="container margen-sup" style="padding-bottom:18rem;">
		<div class="well">
			<h3>NO HAY USUARIOS ELIMINADOS</h3>
		</div>	
	</div>

<?php } else { ?>

	<div class="container-fluid " style="padding-bottom:10rem;">
		<div class="well py-3">
		<br>
			<h3>TODOS LOS USUARIOS ELIMINADOS</h3>
		</div>	

		<table class="datatable table-dark th table-dark td table-dark thead mt-2 th  table-responsive ">
         <table borde="2" width="95%" align-middle>		
		<table class="  table table-bordered table-horver table-striped mt-3 shadow">

		<thead class="table-dark">
		<tr class="subtitulo">
				<tr>
					<!--<th>ID</th>-->
					<th>AEPLLIDO</th>
					<th>NOMBRE</th>
					<th>EMAIL</th>
				<!--<th>USUARIO</th>
					<th>PASSWORD</th>-->
					<th>PERFIL</th>
					<th>BAJA</th>
					<th>ACCIONES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($usuarios->result() as $row){ ?>
				<tr>
				<!--<td><?php echo $row->id_usuario;  ?></td>-->
					<td><?php echo $row->apellido;  ?></td>
					<td><?php echo $row->nombre;  ?></td>
					<td><?php echo $row->email;  ?></td>
				<!--<td><?php echo $row->username;  ?></td>
					<td><?php echo $row->password;  ?></td>-->
					<td><?php echo $row->perfil_id;  ?></td>
					<th><?php echo $row->baja;  ?></th>
					<td><a href="<?php echo base_url("modificar_us/$row->id_usuario");?>">Modificar</a>|<a href="<?php echo base_url("activar_us/$row->id_usuario");?>">Activar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>	            
	</div>

<?php } ?>