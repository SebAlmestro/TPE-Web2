<?php

class CanchaModel
{
    private $PDO;

    public function __construct()
    {
        include_once 'src/config/index.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function eliminar($id)
    {
        $queryTurnos = $this->PDO->prepare("DELETE FROM turnos WHERE id_cancha = ?");
        $queryTurnos->execute([$id]);

        $query = $this->PDO->prepare("DELETE FROM canchas WHERE id_cancha = ?");
        $query->execute([$id]);
        return $query;
    }
    public function crear($tipo_cesped, $imagen,  $precio,  $techada)
    {
        $query = $this->PDO->prepare("INSERT INTO canchas (id_cancha, tipo_cesped, imagen, precio, techada) VALUES (null,?,?,?,?)");
        $query->execute([$tipo_cesped, $imagen,  $precio,  $techada]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function listar()
    {
        $query = $this->PDO->prepare("SELECT * FROM canchas");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarPorIdentificador($identificador)
    {
        $query = $this->PDO->prepare("SELECT * FROM turnos WHERE id_cancha = ?");
        $query->execute([$identificador]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function editarCancha($id, $tipo_cesped,  $precio, $techada)
    {
        $query = $this->PDO->prepare("UPDATE canchas SET tipo_cesped=?,techada=?,precio=? WHERE  id_cancha = ?");
        $query->execute([$tipo_cesped, $techada,  $precio, $id]);
    }
}
