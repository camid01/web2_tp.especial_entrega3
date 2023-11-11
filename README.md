# web2_tp.especial_entrega3
1)
$router->addRoute('clientes',   'GET',    'buysController',   'get'   );
Este este primer método GET se listan todos los clientes 

2)
$router->addRoute('clientes/:ID/compras',  'GET',    'buysController',   'description');
Este segundo método GET muestra la/s compras de un cliente por su id

3)
$router->addRoute('clientes',  'POST',   'buysController',   'create');
El método POST crea un nuevo cliente

4)
$router->addRoute('clientes/:ID/compras',   'PUT',    'buysController',   'update');
El PUT modifica la compra de un cliente por su id

5)
$router->addRoute('clientes/:ID',  'DELETE', 'buysController',   'delete');
Y el DELETE elimina un cliente por su id, con sus respectiva/s compra/s
