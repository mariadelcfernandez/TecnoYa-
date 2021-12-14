<!--CONSULTAS Y CONTACTOS-->

<div class="container py-3">
  <div class="row">
    <div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->
    <div class="col">
      <div class="row">
        <div class="col-md-12">
          <div class="card-section mx-auto mb-3 mt-3 border-rounded" style="width: 35rem;">
            <div class="card-header">
              <h2 class="tit">Consulta</h2>
             
              
            </div>
            <div class="card-body">
              <?php echo validation_errors(); ?>

              <!-- Formulario de Consultas -->
              <div class="well bs-component form-horizontal">
                <?php echo form_open('consultas', ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
                <fieldset>
                  <div class="form-group">
                    <label class="control-label fuente">Nombre</label>
                    <div>
                      <?php echo form_input([
                        'name' => 'nombre',
                        'id' => 'nombre',
                        'class' => 'form-control fuentePlaceholder',
                        'placeholder' => 'Nombre',
                        'required' => 'required',
                        'autofocus' => 'autofocus',
                        'value' => set_value('nombre')
                      ]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label fuente">Email:</label>
                    <div>
                      <?php echo form_input([
                        'type' => 'email',
                        'name' => 'email',
                        'id' => 'email',
                        'class' => 'form-control fuentePlaceholder',
                        'placeholder' => 'Email',
                        'required' => 'required',
                        'value' => set_value('email')
                      ]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label fuente">Telefono</label>
                    <div>
                      <?php echo form_input([
                        'name' => 'telefono',
                        'id' => 'telefono',
                        'class' => 'form-control fuentePlaceholder',
                        'placeholder' => 'Telefono',
                        'required' => 'required',
                        'autofocus' => 'autofocus'
                      ]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label fuente">Mensaje</label>
                    <div>
                      <?php echo form_input([
                        'name' => 'mensaje',
                        'id' => 'mensaje',
                        'class' => 'form-control fuentePlaceholder',
                        'placeholder' => 'Mensaje',
                        'required' => 'required',
                        'autofocus' => 'autofocus'
                      ]); ?>
                    </div>
                  </div>
                  <div>
                    <?php echo form_submit('submit', 'Enviar', "class='btn btn-dark fuenteBotones' mt-3"); ?>
                      <br>
                      <br>
                    <input type="reset" value="Cancelar " class='rigth btn btn-dark fuenteBotones'>
                  <br>
                   
                    <?php echo form_close(); ?>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
<script>
  function limpiarFormulario() {
    document.getElementById("form-group").reset();
  }
</script>