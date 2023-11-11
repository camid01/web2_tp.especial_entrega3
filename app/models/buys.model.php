<?php
    require_once 'app/models/model.autodeploy.php';
class buysModel extends Model {
    //GET
    function getCustomers() {
        $query = $this->db->prepare('SELECT * FROM clientes');
        $query->execute();

        // $tasks es un arreglo de tareas
        $customers = $query->fetchAll(PDO::FETCH_OBJ);

        return $customers;
    }

    function customersById($id){
        $query = $this->db->prepare('SELECT * FROM clientes WHERE id = ?');
        $query->execute([$id]);

        $cliente = $query->fetchAll(PDO::FETCH_OBJ);
        return $cliente;
    }

    //GET
    function getDetalle($id){
        $query = $this->db->prepare('SELECT * FROM `compras` WHERE id_usuario = ?');
        $query->execute([$id]);

        $description = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $description; 
    }

    //POST
    function insertClient($id,$nombre, $direccion){
        $query = $this->db->prepare('INSERT INTO clientes (id,Nombre, Dirección) VALUES(?,?,?)');
        $query->execute([$id, $nombre, $direccion]);

        return $this->db->lastInsertId();
    }

    //DELETE
    function deleteClient($id) {
        $query = $this->db->prepare('DELETE FROM clientes WHERE id = ?');
        $query->execute([$id]);
    }

    //PUT
    function updateData($destino, $detalle, $total,$id){
        $query = $this->db->prepare('UPDATE `compras` SET `Destino`= ?,`Detalle`= ?,`Total`= ? WHERE id_usuario = ?');
        $query->execute([$destino,$detalle,$total,$id]);

        return $query->rowCount();
    }
}