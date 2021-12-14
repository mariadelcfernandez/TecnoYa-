<div class="container altura">
	<div class="row justify-content-center">
    	<div class="col-sm-12 col-md-4 bottom-padding">
  	      <div class="form-box">
            <div class="text-center">  
            <h5><b>MODIFICAR USUARIO</b></h5><br> 
            </div> 
        		<div>     
					<?php echo form_open_multipart("modificar_us/$id_usuario",
					['class' => 'form-signin', 'role' => 'form']); ?>

					
						<div class="form-group">
							<?php echo form_label('Apellido:', 'apellido'); ?>	
							<?php echo form_input(['name' => 'apellido', 
															'id_usuario' => 'apellido', 
															'class' => 'form-control',
															'placeholder' => 'Apellido', 
															'value'=>"$apellido"]); ?>
							<?php echo form_error('apellido'); ?>
						</div>
						<div class="form-group">
							<?php echo form_label('Nombre:', 'nombre'); ?>
							<?php echo form_input(['name' => 'nombre', 
															'id_usuario' => 'nombre', 
															'class' => 'form-control',
															'placeholder' => 'Descripcion', 
															'autofocus'=>'autofocus',
															'value'=>"$nombre"]); ?>
							<?php echo form_error('nombre'); ?>
						</div>
						<div class="form-group">
							<?php echo form_label('Email:', 'email'); ?>
							<?php echo form_input(['name' => 'email', 
															'id_usuario' => 'email', 
															'class' => 'form-control',
															'placeholder' => 'Email', 
															'value'=>"$email"]); ?>
							<?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
						
						<?php echo form_label('Seleccione el Perfil:', 'perfil_id'); 
									$gender = array(
										    'name' => 'perfil_id',
								            'id_usuario' => 'perfil_id',
								            'class' =>  'form-control',
								            'required' => 'required',
								             'value' =>  set_select('gender'),
								             'selected' => $perfil_id
								            );
								$options_gender = array
								        (
								            '' => 'Seleccione Categor&iacute;a',
								            '1' => 'Administrador',
								            '2' => 'Cliente'
								        );

							echo form_dropdown($gender, $options_gender); ?><br>
						</div>
						
					<!--	<div class="form-group">
              				<label class="control-label">id_usuario</label>
                				<div>
                  					<?php echo form_input(['name' => 'id_usuario', 
                                        					'id_usuario' => 'id_usuario', 
                                        					'class' => 'form-control',
                                        					'placeholder' => 'id_usuario', 
                                        					'value'=>"$id_usuario"]);
															?>
              					</div>
								  
							
            			</div>
						-->
						<td><?php echo form_submit('submit', 'Modificar',"class='btn btn-secondary btn-dark fuenteBotones btn-md'"); ?></td>	
						<td><?php echo form_submit('us', 'Cancelar',"class='btn btn-secondary  item-rithg btn-dark fuenteBotones btn-md'"); ?><br></td>
						<?php echo form_close(); ?>
					</div>
				</div>
            </div> 
        </div>
    </div>

	

