<?php

class TurnoModel {
    private $PDO;

    public function __construct () { 
        include_once 'src/config/index.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function eliminar($id)
    {
        $queryTurnos = $this->PDO->prepare("DELETE FROM turnos WHERE id_turno = ?");
        $queryTurnos->execute([$id]);
        return $queryTurnos;
    }
    public function editarTurno($id, $fecha,  $hora, $estado)
    {
        $query = $this->PDO->prepare("UPDATE turnos SET fecha=?,hora=?,estado=? WHERE  id_turno = ?");
        $query->execute([$fecha, $hora, $estado, $id]);
    }
    public function crearTurno($id_cancha, $fecha, $hora,  $estado)
    {
        $query = $this->PDO->prepare("INSERT INTO turnos ( id_cancha, fecha, hora, estado) VALUES (?,?,?,?)");
        $query->execute([$id_cancha, $fecha, $hora,  $estado]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listarPorCanchas($identificador) {
        $query = $this->PDO->prepare("SELECT * FROM turnos WHERE id_cancha = ?");
        $query->execute([$identificador]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}