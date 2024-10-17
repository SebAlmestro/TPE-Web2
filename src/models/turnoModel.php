<?php

class TurnoModel {
    private $PDO;

    public function __construct () { 
        include_once 'src/config/index.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO


    public function listarPorCanchas($identificador) {
        $query = $this->PDO->prepare("SELECT * FROM turnos WHERE id_cancha = ?");
        $query->execute([$identificador]);
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }
}