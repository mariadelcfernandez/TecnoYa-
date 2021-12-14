<!-- ---------------------------------- GRID ------------------------------------------------------- -->
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>

				<div class="conteiner colorF">
					<div class="row">
						<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

						<div class="col"> <!-- COLUMNA CENTRAL GRID -->
							<div class="row">
								<div class="col-md-12" id="carrito"> 
									
								    <div class="cart" >
								        <div class = "heading">
											<br>
										   <table class="table table-bordered" width="100%" bgcolor="#fff">
												<thead>
												    <tr bgcolor="#333333" align="center" style="color:#FFFFFF">
											           <td colspan="5">Productos en tu Carrito</td>
											        </tr>
											    </thead>
										    </table>  
								        </div>
								        
								        <div class="text ml-2" align="center"> 

								            <?php  $cart_check = $this->cart->contents();
								            // Si el carrito está vacio, mostrar el siguiente mensaje
								            if (empty($cart_check)) 
								            {
								                echo 'Para agregar productos al carrito, click en "Agregar al Carrito"';
								            }  
								            ?>    
								        </div>
								        
								        <table class="table table-bordered table-sm" width="100%" bgcolor="#fff">

								            <?php // Todos los items de carrito en "$cart". 
								            if ($cart = $this->cart->contents()): //Esta función devuelve un array de los elementos agregados en el carro
								  
								            ?>
								                <tr class="text-center fuenteTabla" id= "main_heading" bgcolor="#666666" bordercolor="#CCCCCC">
								                    <td>ID</td>
								                    <td>Descripción</td>
								                    <td>Precio</td>
								                    <td>Cantidad</td>
								                    <td>Subtotal</td>
								                    <td>Cancelar Producto</td>
								                </tr>

								            <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
								            echo form_open('carrito_actualiza');
								                $gran_total = 0;
								                $i = 1;
//$imagen = $cart->imagen;
								                foreach ($cart as $item):
								                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
								                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
								                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
								                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
								                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
								            		?>
								                    <tr class="text-center fuenteTabla">
<!-- 								                        <td>
								                            <?php //echo $i++; ?>
								                        </td> -->
								                        <td>
								                            <?php echo $i++; ?>								                    
															    </td>
								                        <td>
								                            <?php echo strtoupper($item['name']); ?>								                        </td>
								                        <td>
								                            $ <?php echo number_format($item['price'], 2); ?>								                        </td>
								                        <td>
								                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 
								                                                    'maxlength="3" size="1" style="text-align: center"'); ?>								                        </td>
								                            <?php $gran_total = $gran_total + $item['subtotal']; ?>
								                        <td>
								                            $ <?php echo number_format($item['subtotal'], 2) ?>								                        </td>
								                        <td> 
								                            <?php // Imagen
								                                $path = '<img src= '. base_url('img/cart_cross.jpg') . ' width="25px" height="20px">';
								                            	//$path = '<i class="far fa-times-circle fa-2x" style="color:Red"></i>';
								                            	$path ='<i class="fa fa-trash"></i>Eliminar</a>';

								                                echo anchor('carrito_elimina/' . $item['rowid'], $path); 

								                            ?>								                      
															  </td>
								                    </tr>
								                <?php 
								                endforeach; 
								                ?>
								                    
								                <tr>  
								                    <td colspan="5"> </td>

								                    <td class="text-center" >
								                    	<b>Total: $
								                            <?php //Gran Total
								                            echo number_format($gran_total, 2); 
								                            ?></b>
								                        </td> 
								                </tr>

								                <tr class="table-light">

								                	<td> </td>

								                	<td> </td>

								                	<td class="text-right">
									                	<!-- Borrar carrito usa mensaje de confirmacion javascript implementado en partes/head_view -->
									                	 <input type="button" class="btn btn-danger" value="Borrar Carrito" onclick="window.location = 'borrar_carri' ">									                </td>

									                <td class="text-center">
									                	<!-- Submit boton. Actualiza los datos en el carrito -->
									                	<input type="submit" class ='btn btn-secondary fuenteBotones btn-md' value="Actualizar">
									                								               (*) </td>

									                <td class="text-left">
									                	<!-- " Confirmar orden envia a carrito_controller/muestra_compra  -->
									                	<input type="button" class="btn btn-success" value="Confirmar Orden" onclick="window.location = 'guardo_compras' ">									                </td>

									                <td> </td>
								                </tr>
												<tr><td colspan="6">(*)Recorda actualiza tu compra para validar importes y cantidad de productos.	</td></tr>

								                <?php echo form_close();
								            endif; ?>
								        </table>

								        <div class="text-center">

									        
								        </div>
								    </div>
									
									<br>
															
								</div>
							</div>

						</div>	<!-- FIN DE COLUMNA CENTRAL GRID -->
						
						<div class="col-md-1"></div> <!-- COLUMNA DCHA. GRID -->

					</div>	
				</div>
				
<!-- -------------------------------- FIN GRID --------------------------------------------------- -->


