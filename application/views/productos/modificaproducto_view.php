
<div class="container">
<div class="col-sm-10 col-md-10">
	<div class="well">
		<h1>Modificar Datos</h1>	
		<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
		<h6> <b>Tamaño maximo de la imagen 2MB</b></h6>		
	</div>	            
<!--verifico_modificaproducto/$id-->
	<?php echo form_open_multipart("modificar_produ/$id", ['class' => 'form-signin', 'role' => 'form']); ?>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Descripcion:', 'descripcion'); ?>
					<?php echo form_input(['name' => 'descripcion', 
													'id' => 'descripcion', 
													'class' => 'form-control',
													'placeholder' => 'Descripcion', 
													'autofocus'=>'autofocus',
													'value'=>"$descripcion"]); ?>
					<?php echo form_error('descripcion'); ?>
				</div>
			</div>
		 		<div class="col-md-6">
				
					   <div class="form-group">
						
							<?php echo form_label('Seleccione el Categoria:', 'categoria_id'); 
									$gender = array(
										    'name' => 'categoria_id',
								            'id' => 'categoria_id',
								            'class' =>  'form-control',
								            'required' => 'required',
								             'value' =>  set_select('gender'),
								             'selected' => $categoria_id
								            );
								$options_gender = array
								        (
								            '' => 'Seleccione Categor&iacute;a',
								            '1' => 'Computadoras',
								            '2' => 'Monitores',
											'3' => 'Almacenamiento',
								            '4' => 'Accesorios',
											'5' => 'Audios-Videos',
								          
								        );

							echo form_dropdown($gender, $options_gender); ?><br>
						</div>
				</div>
		</div>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Precio Costo:', 'precio_costo'); ?>
					<?php echo form_input(['name' => 'precio_costo', 
													'id' => 'precio_costo', 
													'class' => 'form-control',
													'placeholder' => 'Precio Costo', 
													'value'=>"$precio_costo"]); ?>
					<?php echo form_error('precio_costo'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Precio Venta:', 'precio_venta'); ?>
					<?php echo form_input(['name' => 'precio_venta', 
													'id' => 'precio_venta', 
													'class' => 'form-control',
													'placeholder' => 'Precio Venta',
													'value'=>"$precio_venta"]); ?>
					<?php echo form_error('precio_venta'); ?>
				</div>
			</div>
		</div>
		<div class="row">
	   		<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Stock:', 'stock'); ?>
					<?php echo form_input(['name' => 'stock', 
													'id' => 'stock', 
													'class' => 'form-control',
													'placeholder' => 'Stock',
													'value'=>"$stock"]); ?>
					<?php echo form_error('stock'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Stock minimo:', 'stock_min'); ?>
					<?php echo form_input(['name' => 'stock_min', 
													'id' => 'stock_min', 
													'class' => 'form-control',
													'placeholder' => 'Stock Minimo',
													'value'=>"$stock_min"]); ?>
					<?php echo form_error('stock_min'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Imagen actual:', 'img_ac'); ?>
					<img  id="imagen_view" name="imagen_view" height =80px class="img-thumbnail" src="<?php  echo base_url($imagen); ?>" >
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Imagen:', 'imagen'); ?>
					<?php echo form_input(['type' => 'file',
													'name' => 'filename', 
													'id' => 'filename', 
													'class' => 'form-control']); ?> 
					<?php echo form_error('filename'); ?>
					<br>
					<td><?php echo form_submit('modificar', 'Modificar','class="btn btn-outline-danger contenido"'); ?></td>
					<td><?php echo form_submit('modificar', 'Cancelar','class="btn btn-outline-warning contenido"'); ?></td>
				</div>		
			</div>
		</div>
	<?php echo form_close(); ?>
	<div>
		
	</div>
</div>
</div>
</div>
