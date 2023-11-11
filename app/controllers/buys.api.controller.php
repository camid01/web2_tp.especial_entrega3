<?php
require_once 'app/controllers/api.controller.php';
require_once 'app/models/buys.model.php';


class buysController extends ApiController{
    private $model;

    public function __construct() {
        $this->model = new buysModel();
        parent::__construct();
    }
    //GET
    public function get($params = []) {
        if (empty($params)){
            $clientes = $this->model->getCustomers();
            $this->view->response($clientes, 200);
        }
    }

    //GET
    public function description($params = []){ 
        $cliente = $this->model->customersById($params[':ID']);
        
        if (!empty($cliente)){
            $detalle_compra = $this->model->getDetalle($params[':ID']);
            $this->view->response($detalle_compra, 200);
        }else{
            $this->view->response('No existe el cliente con el id= '.($params[':ID']), 404);
        }
    }

    //POST
    function create($params = []) {
        $body = $this->getData();

        $id = $body->id;
        $nombre = $body->Nombre;
        $direccion = $body->Dirección;

        if(empty($id) || empty($nombre) || empty($direccion)){
            $this->view->response('Complete todos los campos', 400);
        }
        else{
            $this->model->insertClient($id,$nombre, $direccion);
            $this->view->response('Cliente insertado con el id= '.$id, 201);
        }
        
    }

    //DELETE
    function delete($params = []) {
        $id = $params[':ID'];
        $cliente = $this->model->getCustomers($id);

        if($cliente) {
            $this->model->deleteClient($id);
            $this->view->response('El cliente con id='.$id.' ha sido borrada.', 200);
        } else {
            $this->view->response('El cliente con id='.$id.' no existe.', 404);
        }
    }

    //PUT
    function update($params = []) {
        $id = $params[':ID'];
        $cliente = $this->model->getCustomers($id);

        if($cliente) {
            $body = $this->getData();
            $destino = $body->Destino;
            $detalle = $body->Detalle;
            $total = $body->Total;
            
            if(empty($destino) || empty($detalle) || empty($total)){
                $this->view->response('Complete todos los campos', 400);
            }
            else{
                $this->model->updateData($destino, $detalle, $total,$id);
                $this->model->getDetalle($id);
    
                $this->view->response('La compra con id='.$id.' ha sido modificada.', 200);
            }
            
        } else {
            $this->view->response('El cliente con id='.$id.' no existe.', 404);
        }
    }
}