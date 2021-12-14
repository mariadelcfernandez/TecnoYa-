<?php if (!$usuarios) { ?>

	<div class="container-fluid">
		<div class="well">
			<h1>No hay Usuarios</h1>
		</div>
		<?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
			
			<a type="button" class="btn btn-success" href="<?php echo base_url('usuarios_agrega'); ?>">Agregar</a>
			<a type="button" class="btn btn-danger" href="<?php echo base_url('usuarios_eliminados'); ?>">Eliminar</a>
			<br> 
			<br>
	  	<?php } ?>	
	</div>
<?php } else { ?>

	<div class="container-fluid py-3">
		<div class="well">
			<h3>TODOS LOS USUARIOS</h3>
		</div>	
		<a type="button" class="btn btn-danger" href="<?php echo base_url('usuarios_eliminados'); ?>">ELIMINADOS</a>
		
		<br> 
		<div class=" ">
		
			<div class="header-tools">
				<div class="tools">
					<ul>
						<li>
							<a href="<?php echo base_url('verifico_nuevousuario'); ?>">
							<i class="material-icons icono-color">Agregar</i></a>
						</li>
						<li>
							<a href="<?php echo base_url('usuarios_eliminados'); ?>">
							<i class="material-icons icono-color">Eliminar</i></a>
						</li>
					</ul>
				</div>
				
			</div>
			<table class="datatable table-dark th table-dark td table-dark thead mt-2 th  table-responsive ">
         <table borde="2" width="95%" align-middle>		
		<table class="  table table-bordered table-horver table-striped mt-3 shadow">

		<thead class="table-dark">
		<tr class="subtitulo">
			
							<th>ID</th>
							<th>APELLIDO</th>
							<th>NOMBRE</th>
							<th>EMAIL</th>
							<th>USUARIO</th>
							<th>PERFIL</th>
							<th>ACTIVO</th>
							<th>MODIFCAR</th>
							
				</tr>
			</thead>
			<tbody>
				<?php foreach($usuarios->result() as $row){ ?>
				<tr>
				    <td><?php echo $row->id_usuario;  ?></td>
					<td><?php echo $row->apellido;  ?></td>
					<td><?php echo $row->nombre;  ?></td>
					<td><?php echo $row->email;  ?></td>
				   <td> <?php echo $row->usuario;  ?>
					<!--<td><?php echo $row->pass;  ?></td>-->
					<td><?php echo $row->perfil_id;  ?></td>
					<td><?php echo $row->baja;?></td>
					
					<td>	<a href="<?php echo base_url("verifico_modificar_usuario/$row->id_usuario");?>">Modificar</a>
						<i class="material-icons icono-color">editar</i></a>
						<a href="<?php echo base_url("eliminar_us/$row->id_usuario");?>">Eliminar</a></td>
						<i class="material-icons icono-color"></i></a>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="footer-tools">
				<div class="list-items">
					Mostrar
					<select name="n-entries" id="n-entries" class="n-entries">
						<option value="15">5></option>
						<option value="10" selected>10></option>
						<option value="15">15></option>
					</select>
					Registros
				</div>
				<div class="pages">
					<ul>
						<li><span class="active">1></span></li>
						<li><button>2</button></li>
						<li><button>3</button></li>
						<li><button>4</button></li>
						<li><span>...</span></li>
						<li><button>9</button></li>
						<li><button>10</button></li>
					</ul>
				</div>
			</div>
		</div>	            
	</div>

<?php } ?>
<div class="d-flex justify-content-end"><a class="btn btn-outline-primary contenido" href="<?=base_url('panel')?>"><< Volver a inicio</a></div>