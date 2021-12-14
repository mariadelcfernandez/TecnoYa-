<div class="cart">
    <div class="heading">
        <h2 class="tit text-center" id="h2" style-align="center">Detalle de la Compra</h2>
    </div>

    <div class="text ml-2" style-align="center">

        <?php $cart_check = $this->cart->contents();
        // Si el carrito está vacio, mostrar el siguiente mensaje
        if (empty($cart_check)) {
            echo 'Para agregar productos al carrito, click en "Agregar al Carrito"';
        }
        ?>
    </div>

    <table class="table table-hover table-dark table-responsive-md" style-border="0" cellpadding="5px" cellspacing="1px">

        <?php // Todos los items de carrito en "$cart". 
        if ($cart = $this->cart->contents()) : //Esta función devuelve un array de los elementos agregados en el carro

        ?>
            <tr class="text-center fuenteTabla" id="main_heading">
                <td>ID_PRODUCTO</td>
                <td>DESCRIPCION</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
                <td>SUBTOTAL</td>
            </tr>
            <br>

            <?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
            echo form_open('carro');
            $gran_total = 0;
            $i = 1;
            //$imagen = $cart->imagen;
            foreach ($cart as $item) :
                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
               // $id_ventas=$item['id'];
            ?>
                <tr class="text-center fuenteTabla">
                    <!--                                        <td>
                                            <?php //echo $i++; 
                                            ?>
                                        </td> -->
                    <td>
                        <?php echo $i++; ?>
                    </td>
                    <td>
                        <?php echo strtoupper($item['name']); ?>
                    </td>
                    <td>
                        $ <?php echo number_format($item['price'], 2); ?>
                    </td>
                    <td>
                        <?php echo $item['qty']; ?>
                    </td>
                    <?php $gran_total = $gran_total + $item['subtotal']; ?>
                    <td>
                        $ <?php echo number_format($item['subtotal'], 2) ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>

            <tr>
                <td colspan="4"> </td>

                <td class="text-center">
                    <b>Total: $
                        <?php //Gran Total
                        echo number_format($gran_total, 2);
                        ?>
                    </b>
                </td>
            </tr>

            <tr class="table-light">

                <td> </td>

                <td> </td>
                <td class="text-center">
                    <!-- " Cancelar orden envia a carrito_controller/muestra_compra  -->
                    <input type="button" class='btn btn-secondary fuenteBotones btn-md' value="Volver a Catalogo" onclick="window.location = 'carro'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- " Confirmar orden envia a carrito_controller/pago_compra  -->
                    <a class='btn btn-secondary fuenteBotones btn-md' href="<?php echo base_url("registro_pago/$id_ventas"); ?>">Pagar</a>
                </td>
                <td> </td>
                <td> </td>
            </tr>

        <?php echo form_close();
        endif; ?>
    </table>

    <div class="text-center">


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
<br>
<br>
<br>