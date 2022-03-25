<?php
    
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->get('users', 'UserController@show');

$router->get('/user', ['middleware' => 'admin' , 'uses'=>'UserController@ver']); 
$router->post('/user', 'UserController@NuevoUsuario');
$router->post('/userupdate',['middleware' => 'auth' , 'uses'=>'UserController@EditarUsuario'] );
$router->get('/userupdate/{id}',  ['middleware' => 'admin' , 'uses'=> 'UserController@EliminarUsuario']);
$router->post('/login', 'UserController@login');

// $router->post('/loginfb', 'UserController@loginfb');
// $router->post('/productos', 'ProductosController@productos');//todos productos
// $router->get('/productos/{slug}', 'ProductosController@productosslug');//productos por slug
// $router->get('/categoriasrecientes', 'CategoriasController@recientes');
// $router->post('/productoslista', 'ProductosController@productlist');//Productos 

//whitelist

$router->post('/whitelist/participar', 'WhitelistController@participar');
$router->get('/whitelist/{wallet}', 'WhitelistController@participa');
$router->get('/whitelist', 'WhitelistController@participantes');
$router->post('/whitelist/participar', 'WhitelistController@participar');


//usuarios
$router->post('/usuarios/nuevo', 'UsuariosController@alta');

//pool
$router->post('/pool/participar', 'PoolController@participar');
$router->get('/pool/{id}', 'PoolController@pool');
$router->get('/pool', 'PoolController@pooles');
$router->get('/pool/participaciones/{wallet}', 'PoolController@participaciones');


// $router->get('/categorias', 'CategoriasController@get');//categorias
// $router->post('/categorias', 'CategoriasController@filters');
// $router->get('/categorias/{id}', 'CategoriasController@getpro');//categorias 
// $router->post('/categorias/{id}', 'CategoriasController@upcat');
// $router->get('/subcategorias/{id}', 'CategoriasController@subget');//sebcategorias 

// $router->post('/marcas', 'MarcasController@marcas');//ver marcas
// //$router->get('/productosdel/{id}',  ['middleware' => 'admin' , 'uses'=> 'ProductosController@del']); 
// $router->get('/productosdel/{id}',  'ProductosController@del'); 
// $router->post('/productosadd',  'ProductosController@add'); 
// $router->post('/productosup/{id}',  'ProductosController@update'); 
// $router->get('/fotos/{id}',  'FotosController@get'); //fotos de producto
// $router->get('/fotosdel/{id}',  'FotosController@del'); //eliminar fotos de producto
// $router->post('/fotosadd',  'FotosController@add'); //añadir foto de producto

// $router->get('/materiales',  'MaterialesController@get'); //Obtener todos los materiales
// $router->get('/materialesdel/{id}',  'MaterialesController@del');
// $router->get('/materialesfdel/{id}',  'MaterialesController@delf'); //eliminar material
// $router->post('/materialesadd',  'MaterialesController@add'); //añadir material
// $router->post('/materialesup/{id}',  'MaterialesController@up'); //editar material
// $router->get('/materiales/{id}',  'MaterialesController@getmatpro');

// $router->post('/pmatup',  'MaterialesController@addmat'); //add material
// $router->get('/pmatdel/{id}',  'MaterialesController@delmat'); //del material
// $router->post('/pmatdup/{id}',  'MaterialesController@upmat'); //update material

// $router->get('/fotosv/{id}',  'MaterialesController@fotosv'); //get fotos material
// $router->post('/fotosvadd',  'MaterialesController@addv'); //add fotos  material
// $router->get('/fotosvdel/{id}',  'MaterialesController@delv'); //del fotos material

// $router->get('/fotosmix/{id}/{id1}/{id2}',  'MaterialesController@fotosmix'); //get fotos mix material
// $router->post('/fotosmixadd',  'MaterialesController@addmix'); //add fotos mix material
// $router->get('/fotosmixdel/{id}',  'MaterialesController@delmix'); //del fotos mix material

// $router->get('/especs/{id}',  'EspecsController@get'); //del fotos mix material
// $router->get('/especsdel/{id}',  'EspecsController@del'); 
// $router->post('/especsadd',  'EspecsController@add'); 

// $router->get('/validate', ['middleware' => 'admin' , 'uses'=>'UserController@validar']);
// $router->get('/validateuser','UserController@validar2');

// $router->post('/direccionadd','UserController@addireccion');
// $router->post('/editdireccion','UserController@editdireccion');
// $router->get('/deldireccion/{id}','UserController@deldireccion');

// $router->post('/pago','OrdenesController@pago');
// $router->post('/pedido','OrdenesController@pedido');

// $router->get('/ordenes','OrdenesController@get');
// $router->get('/ordenes/{id}','OrdenesController@getid');
// $router->get('/ordenesl/{link}','OrdenesController@getlink');
// $router->post('/ordenes/{id}','OrdenesController@equipoup');
// $router->post('/ordenes','OrdenesController@up');
// $router->get('/equipos','OrdenesController@equipos');
// $router->get('/trabajo','OrdenesController@trabajo');

// $router->post('/review','ProductosController@review');

// $router->get('/slides','SlidesController@get');
// $router->get('/slides/{id}','SlidesController@del');
// $router->post('/slides','SlidesController@up');
// $router->post('/slidesdel','SlidesController@delfoto');
// $router->post('/slidesup','SlidesController@act');

// $router->get('/banner','BannerController@get');
// $router->get('/bannerdel/{id}','BannerController@del');
// $router->post('/banner','BannerController@up');
// $router->post('/banneradd','BannerController@add');
// $router->post('/bannerdel','BannerController@delfoto');

// $router->post('/des','ProductosController@desget');
// $router->post('/desup','ProductosController@desup');

// $router->get('/reviews','ReviewController@get');
// $router->get('/reviews/{id}','ReviewController@getid');
// $router->post('/reviews/{id}','ReviewController@delid');

// $router->post('/contactanos','MailController@contactanos');

// $router->post('/webhooks','OrdenesController@webhooks');
// $router->get('/webhooks','OrdenesController@getwebhooks');
// $router->post('/visitas','VisitasController@get');