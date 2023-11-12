# web2_tp.especial_entrega3
1)
$router->addRoute('clientes',   'GET',    'buysController',   'get'   );
Este este primer método GET se listan todos los clientes
Un ejemplo en este trabajo serian json con ids distintos

2)
$router->addRoute('clientes/:ID/compras',  'GET',    'buysController',   'description');
Este segundo método GET muestra la/s compras de un cliente por su id
Un ejemplo en este trabajo seria,{"id_usuario": "4",
                                  "Destino": "Tandil",
                                  "Detalle": "1kg de cookies de chocolate",
                                  "Total": "2300"}


3)
$router->addRoute('clientes',  'POST',   'buysController',   'create');
El método POST crea un nuevo cliente
Un ejemplo en este trabajo seria,un id, nombre y dirección {"id": "1",
                                                            "Nombre": "Camila",
                                                            "Dirección": "Tandil"}

4)
$router->addRoute('clientes/:ID/compras',   'PUT',    'buysController',   'update');
El PUT modifica la compra de un cliente por su id
Un ejemplo en este trabajo seria modificando los datos de una compra{"Destino": "Necochea",
                                                                    "Detalle": "1kg  de pollo",
                                                                    "Total": 3300}

5)
$router->addRoute('clientes/:ID',  'DELETE', 'buysController',   'delete');
Y el DELETE elimina un cliente por su id, con sus respectiva/s compra/s
