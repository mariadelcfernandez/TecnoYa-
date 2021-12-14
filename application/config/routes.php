<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Principal';
$route['principal_view'] = 'Principal/index';
$route['somos'] = 'Principal/somos';
$route['tecnologia'] = 'Principal/tecnologia';
$route['servicio'] = 'Principal/servicios';

//muestro todos los mensajes de las consultas clientes------------------->

$route['consulta']='consulta_controller';
$route['consultas']='consulta_controller';
$route['muestra_consulta'] = 'Principal/consultas';
$route['contacto'] ='Principal/infocontacto';
$route['terminos'] = 'Principal/terminos';

//muestro todos los mensajes de las consultas----------------------------->
$route['muestra_consultas']= 'consulta_controller/mostrar_consultas';
$route['verifico_nuevoconsulta']='consulta_controller';

//$route['activar_consu/(:num)']='consulta_controller/activar_consulta/$1';
$route['eliminar_consu/(:num)']='consulta_controller/eliminar_consulta/$1';
$route['modificar_consu/(:num)']='consulta_controller/activar_consulta/$1';

//verifico el perfil del logueo------------------------------------------->
$route['login']= 'Principal/login'; 
$route['verifico_usuario']='login_controller'; 
$route['logout']='Principal/logout'; 
$route['panel']= 'Principal/us_logueado';


$route['consultas_us']='consulta_controller/consultas_us';
//muestro todos los usuarios---------------------------------------------->
$route['registrar']= 'Principal/registrar';
$route['verifico_nuevoregistro']='registro_controller';





/*--------------------------------- Vistas del usuario ----------------------------------*/
// consulto si esta en TODOS LOS USUARIOS

$route['us']= 'usuario_controller/index';
$route['verifico_nuevousuario']= 'usuario_controller/form_agrega_usuario';
$route['usuarios_agrega']= 'usuario_controller/agrega_usuario';
$route['configu']='usuario_controller/modificar_usuario/$1';


$route['verifico_modificar_usuario/(:num)']='usuario_controller/muestra_modificar_usuario/$1';

$route['modificar_us/(:num)']='usuario_controller/modificar_usuario/$1';
$route['eliminar_us/(:num)']='usuario_controller/eliminar_usuario/$1';
$route['activar_us/(:num)']='usuario_controller/activar_usuario/$1';


$route['usuarios_eliminados'] = 'usuario_controller/muestra_eliminados';

/*--------------------------------- Vistas del Productos  ----------------------------------*/

// todos productos
$route['produ']='producto_controller'; //ver si esta bien producto controller
//ABM  todos productos
$route['modificar_produ/(:num)']='producto_controller/modificar_producto/$1';
$route['eliminar_produ/(:num)']='producto_controller/eliminar_producto/$1';
$route['activar_produ/(:num)']='producto_controller/activar_producto/$1';


// si hay registros 
$route['verifico_nuevoproducto']='producto_controller/form_agrega_producto';
$route['verifico_modificar_producto/(:num)']='producto_controller/muestra_modificar_producto/$1';
// si no hay registros 
$route['producto_agregar']='producto_controller/agregar_producto'; 
$route['productos_eliminados'] = 'producto_controller/muestra_eliminados';


/*------------------------------------BUSQUEDA-------------------------------------------*/
$route['buscar']= 'producto_controller/buscar_productos';



/*------------------------------------VENTAS-------------------------------------------*/
$route['muestra_detalle/(:any)']= 'producto_controller/detalleunacompra/$1';
$route['ventas_resumen']='producto_controller/listar_ventas'; 
/*--------------------------------- Rutas del carrito ------------------------------------*/
//$route['carrito']= 'carrito_controller/carrito';
$route['carro']= 'carrito_controller/catalogo';
$route['produ_computacion']= 'carrito_controller/computacion';
$route['produ_monitores']= 'carrito_controller/monitores';
$route['produ_almacenamientos']= 'carrito_controller/almacenamientos';
$route['produ_accesorios']= 'carrito_controller/accesorios';
$route['produ_audiosvideos']= 'carrito_controller/audiosvideos';

/* ABM de compras---------------*/
$route['carrito_agrega']= 'carrito_controller/add';
$route['carrito_actualiza']= 'carrito_controller/actualiza_carrito';
$route['carrito_elimina/(:any)']= 'carrito_controller/remove/$1';
$route['borrar_carri']= 'carrito_controller/borrar_carrito';

$route['comprar']= 'carrito_controller/muestra_compra';
$route['guardo_compras']= 'carrito_controller/guarda_compra';
/*-------------------pagos-------------------------->*/
$route['pagar'] = 'Principal/fpago_compra';
$route['registro_pago/(:any)']='carrito_controller/registro_pago/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;