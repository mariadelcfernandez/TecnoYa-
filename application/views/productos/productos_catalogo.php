
  <div #id="top-box" class="cm-top-box"></div>
    <section class="alturita">
          <?php if (!$productos) { ?>
            <div class="container altura">
              <div>
                <h2 class="text-center">No hay Productos disponibles</h2>
              </div>  
            </div>
            <br>
            <br>
            <br>
            <br>

          <?php 
          } else { ?>
          <div class="container mb-5 mt-5">
          <title>CATALOGO DE<?php echo ($titulo );?></title>
             <h5><b>CATALOGO DE PRODUCTOS</b></h5>
            <div class="row">
              <?php foreach($productos->result() as $row){ 
                  $imagen = $row->imagen; 
              ?>
              <div class="col-sm-3">
                <div class="card mt-3">
                  <div class="product-1 align-items-center p-2 text-center">
                    <img class="rounded" width="160" height="160" src="<?php echo base_url(''."$imagen"); ?>">
                    <div class="text-uppercase ">
                      <h6 ><b><?php echo trim($row->descripcion); ?></b></h6>
                      <!--style = "display: inline-block margin:0.5%"-->
                    </div>
                    <div class="mt-3 info"> 
                      <?php 
                        if($row->stock == 0){
                          echo '<span class="badge badge-danger">Sin Stock</span>';
                          } elseif ($row->stock_min >= $row->stock) {
                          echo '<span class="badge badge-warning">Últimas unidades</span>';
                          } else {
                          echo '<span class="badge badge-success">Hay Stock</span>';
                          }
                      ?>
                      <br>
                      <?php 
                        if ($row->stock < $row->stock_min && $row->stock > 0) {
                          echo 'Por debajo del valor minimo: '.$row->stock_min.' unidades';
                          } elseif ($row->stock == 0) {
                          echo 'No hay unidades disponibles';
                          }else {
                          echo 'Disponible: '.$row->stock.' unidades';
                          }
                      ?>
                    </div>
                    <div class="precioa mt-3 text-dark">
                      <span>$ <?php echo $row->precio_venta; ?></span>
                    </div>
                  </div>
                <div class="text-center">
                  <?php 
                    if (($row->stock > 0) && ($session_data = $this->session->userdata('logged_in'))) {
                      // Envia los datos en forma de formulario para agregar al carrito
                      echo form_open('carrito_agrega');
                      echo form_hidden('id', $row->id);
                      echo form_hidden('descripcion', $row->descripcion);
                      echo form_hidden('precio_venta', $row->precio_venta);
                      echo form_hidden('stock', $row->stock);
  
                      echo form_submit('submit','AÑADIR AL CARRITO',"class='p-3 promo mt-2 btn-dark btn-block '");
                      echo form_close();
                      }
                  ?>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div> 
      <?php } ?>
</section>