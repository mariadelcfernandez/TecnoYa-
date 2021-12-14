<!-- ---------------------------------- GRID ------------------------------------------------------- -->


<div class="container py-3">
    <div class="row">
        <div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

        <div class="col">
            <!-- COLUMNA CENTRAL GRID -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-section mx-auto mb-3 mt-3 border-rounded" style="width: 35rem;">
                        <div class="card-header">
                            <h2 class="tit">Login</h2>
                        </div>
                        <div class="card-body">
                            <?php echo validation_errors(); ?>
                            <!--Formulario de Login -->
                            <div class="well bs-component form-horizontal">
                                <?php echo form_open('verifico_usuario', ['class' => 'form-group',
										'role' => 'form',
										'id_usuario' => 'form_registro']); ?>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label fuente">Nombre de Usuario:</label>
                                        <div>
                                            <!--* usa php form para ingresar en la tabla de nombre usuario donde uso la etiqueta name*/-->
                                            <?php echo form_input([
                                                'name' => 'usuario',
                                                'id_usuario' => 'usuario',
                                                'class' => 'form-control fuentePlaceholder',
                                                'placeholder' => 'Usuario',
                                                'required' => 'required',
                                                'autofocus' => 'autofocus'
                                            ]); ?>
                                            <!--aca el autofoco seria el cursor-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label fuente">Contraseña:</label>
                                        <div>
                                            <?php echo form_password([
                                                'type' => 'password',
                                                'name' => 'pass',
                                                'id_usuario' => 'pass',
                                                'class' => 'form-control fuentePlaceholder',
                                                'placeholder' => 'Contraseña',
                                                'required' => 'required'
                                            ]); ?>
                                        </div>
                                        <a href="<?= base_url('login') ?>">Forgot password?</a>
                                    </div>
                                    <div>
                                        <?php echo form_submit('submit', 'Ingresar', "class='btn btn-secondary fuenteBotones'mt-3 "); ?><br><br>
                                        <?php echo form_close(); ?>
                                        <!-- FínFormulario de Login -->
                                    </div><!-- Fin Card que contiene alFormulario -->
                                </fieldset>
                            </div>
                        </div> <!-- FIN DE COLUMNA CENTRAL GRID -->
                    </div>
                </div> <!-- COLUMNA DCHA. GRID -->
            </div>
        </div>
        <!-- -------------------------------- FIN GRID --------------------------------------------------- -->
        <div class="col-md-1"></div> <!-- COLUMNA DCHA. GRID -->
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
<br>
<br>
<br>
<br>