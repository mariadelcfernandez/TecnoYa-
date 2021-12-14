<!-- ---------------------------------- GRID ------------------------------------------------------- -->
<div class="container py-3">
	<div class="row">
		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->
  			<div class="col">
				<!-- COLUMNA CENTRAL GRID -->
				<div class="row">
   					<div class="col-md-12">
					<!-- Card que contiene al Formulario -->
					<div class="card-section mx-auto mb-3 mt-3 border-rounded" style="width: 35rem;">
						<div class="card-header">
							<h2 class="tit">Registrar</h2>
						</div>
						<div class="card-body">

							<?php echo validation_errors(); ?>

							<!-- Formulario -->

							<div class="well bs-component form-horizontal">
								<?php echo form_open('verifico_nuevoregistro',
									[
										'class' => 'form-group',
										'role' => 'form',
										'id_usuario' => 'form_registro'
									]
								); ?>
								<fieldset>
									<div class="form-group">
										<label class="control-label fuente">Apellido:</label>
										<div>
											<?php echo form_input([
												'name' => 'apellido',
												'id_usuario' => 'apellido',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Apellido',
												'required' => 'required',
												'value' => set_value('apellido')]); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label fuente">Nombre:</label>
										<div>
											<?php echo form_input([
												'name' => 'nombre',
												'id_usuario' => 'nombre',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Nombre',
												'required' => 'required',
												'autofocus' => 'autofocus',
												'value' => set_value('nombre')]); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label fuente">Email:</label>
										<div>
											<?php echo form_input([
												'type' => 'email',
												'name' => 'email',
												'id_usuario' => 'email',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Email',
												'required' => 'required',
												'value' => set_value('email')]); ?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label fuente">Nombre de Usuario:</label>
										<div>
											<?php echo form_input([
												'name' => 'usuario',
												'id_usuario' => 'usuario',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Usuario',
												'required' => 'required',
												'value' => set_value('usuario')]); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label fuente">Contraseña:</label>
										<div>
											<?php echo form_password([
												'name' => 'pass',
												'id_usuario' => 'pass',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Contraseña',
												'required' => 'required']); ?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label fuente">Repetir Contraseña:</label>
										<div>
											<?php echo form_password([
												'name' => 're_pass',
												'id_usuario' => 're_pass',
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Repetir Contraseña',
												'required' => 'required']); ?>
										</div>
									</div>

									<div>
										<?php echo form_submit('submit', 'Registrarse', "class='btn btn-secondary fuenteBotones' mt-3"); ?> <br><br>
										<?php echo form_reset('reset', 'Editar', "class='btn btn-secondary fuenteBotones'"); ?><br>
										<?php echo form_close(); ?>
									</div>
								</fieldset>
							</div>
							<!-- Fín Formulario -->

						</div>
					</div>
					<!-- Fin Card que contiene al Formulario -->

				</div>
			</div>
		</div> <!-- FIN DE COLUMNA CENTRAL GRID -->

		<div class="col-md-1"></div> <!-- COLUMNA DCHA. GRID -->

	</div>
</div>
<!-- ---------------------------------- FIN GRID --------------------------------------------------- -->
<br>
<br>
<br>