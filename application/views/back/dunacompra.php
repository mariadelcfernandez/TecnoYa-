<?php
foreach($ventas_cabecera->result() as $row){
?>
      <div class="container">
        <div class="row">
         <div class="cart" >
<br />
<table class="table table-bordered" width="100%" bgcolor="#fff">
      <tr bgcolor="#333333" align="center" style="color:#FFFFFF">
        <td colspan="5">Detalles de la Operaci&oacute;n</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td> <b>Cliente: </b><?php echo strtoupper($apellido).' '.strtoupper($nombre); ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><b>Fecha de la Compra: </b> <?php echo $row->fecha; ?></td>
        <td>&nbsp;</td>
      </tr>
    </table>
                        <table class="table table-bordered" width="100%" bgcolor="#fff">

                            <?php // Todos los items de carrito en "$cart".
                            //consulto la tabla ventas para mostrar el nro de venta
                               $query = $this->db->get_where('ventas_detalle', array('id_ventas' => $row->id_ventas));
                                  /*if($query->num_rows()>0) {
                                        return $query;
                                    } else {
                                        return FALSE;
                                    }*/
                            ?>
                            <?php if(($this->session->userdata('logged_in')) and ($perfil_id == '1')) { ?>
							<tr bgcolor="#333333" align="center" style="color:#FFFFFF"><td colspan="5">Detalle de <?php echo $titulo;?> Nro. <?php echo $row->id_ventas;?></td></tr>
                            <?php } ?>
                            <?php if(($this->session->userdata('logged_in')) and ($perfil_id == '2')) { ?>
                            <tr bgcolor="#333333" align="center" style="color:#FFFFFF"><td colspan="5">Detalle de <?php echo $titulo;?> Nro. <?php echo $row->id_ventas;?></td></tr>
                            <?php } ?>
                                <tr bgcolor="#666666">
                                    <td>ID</td>
                                    <td>Descripci&oacute;n</td>
                                    <td>Precio</td>
                                    <td>Cantidad</td>
                                    <td>Subtotal</td>
                                </tr>
                            <?php 
                                $gran_total = 0;
                                $i = 1;
                                foreach($query->result() as $item):

                                    //consulto la tabla productos para mostrar la descripción
                                      $this->db->select('descripcion');
                                      $this->db->from('productos');
                                      $this->db->where('id', $item->id);
                                      $consulta = $this->db->get();
                                      $descat = $consulta->row();
                                ?>
                                    <tr class="text-center fuenteTabla">
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php //echo strtoupper($item['id_producto']);
                                            echo strtoupper($descat->descripcion) ?>
                                        </td>
                                        <td>
                                            $ <?php echo number_format($item->precio, 2); ?>
                                        </td>
                                        <td>
                                            <?php echo $item->cantidad; ?>
                                        </td>
                                            <?php $gran_total = $gran_total + $item->total; ?>
                                        <td>
                                            $ <?php echo number_format($item->total, 2) ?>
                                        </td>
                                    </tr>
                                <?php 
                                endforeach; 
                                ?>    
                                <tr>  
                                    <td colspan="4"></td>

                                    <td class="text-center"> 
                                      <b>Total: $
                                            <?php //Gran Total
                                            echo number_format($gran_total, 2); 
                                            ?>
                                      </b>
                                    </td> 
                                </tr>
           </table>
            <table class="table">
                <thead>
                    <tr align="center">
                    </tr>
                    <tr>
                    <?php if(($this->session->userdata('logged_in')) and ($perfil_id == '2')) {?>
                                  <td style="color:#FFFFFF"> <a  class ='btn btn-secondary fuenteBotones btn-md' onclick="atras();">Volver</a> </td>
                    <?php } 
                    if(($this->session->userdata('logged_in')) and ($perfil_id == '1')) {?>
                                  <td style="color:#FFFFFF"> <a  class ='btn btn-secondary fuenteBotones btn-md' onclick="atras();">Volver</a> </td>
                    <?php }
                    echo "<script type='text/javascript'>function atras(){";
                                            echo "window.history.back(-1);}";
                                            echo "</script>";
                     ?>
                    </tr>
                </thead>
            </table>  
          </div>                
        </div>
      </div>
    <?php } ?>
    
