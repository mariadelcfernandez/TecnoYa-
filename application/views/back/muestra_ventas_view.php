<?php if (!$ventas_cabecera) { ?>
	<div class="container alturita">
		<div class="well py-3">
			<h3>No se realizaron ventas</h3>
		</div>
	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php } else { ?>
<div class="container-fluid py-4">
		<div class="well">
			<h3>TODAS LAS VENTAS</h3>
		</div>	
		
		<div class="container datatable-container">
			<div class="header-tools">
			
			<table class="table text-center table-bordered table-horver table-striped mt-5 shadow">

						<thead class="table-dark">
							<tr class="subtitulo">
							<th>ID_VENTAS</th>
							<th>FECHA</th>
							<th>APELLIDO</th>
							<th>NOMBRE</th>
							<th>PRODUCTOS</th>
							<th>TOTAL DE VENTAS</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($ventas_cabecera->result() as $row)
						{ ?>
						<tr>
							<td><?php echo $row->id_ventas;  ?></td>
							<td><?php echo $row->fecha;  ?></td>
							<td><?php echo $row->apellido;  ?></td>
							<td><?php echo $row->nombre;  ?></td>
							<td><?php echo $row->total_venta;  ?></td>
							<td>
                    			 <a href="<?php echo base_url("muestra_detalle/$row->id_ventas");?>">Detalle</a></td>
							</tr>
						
						<?php } ?>
					</tbody>
				</table>
				<?php } ?>
</div>
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
						<li><span class="active">01></span></li>
						<li><button>02</button></li>
						<li><button>03</button></li>
						<li><button>04</button></li>
						<li><span>...</span></li>
						<li><button>09</button></li>
						<li><button>10</button></li>
					</ul>
				</div>
			</div>
		</div>
</div>

<div class="d-flex justify-content-end"><a class="btn btn-outline-primary contenido" href="<?=base_url('panel')?>"><< Volver a inicio</a></div>