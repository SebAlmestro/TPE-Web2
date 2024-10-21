<?php

class TurnoController {
    
    private $view;
    private $model;
    private $model_cancha;
    private $alert;

    public function __construct() {
        include_once 'src/models/turnoModel.php';
        include_once 'src/models/canchaModel.php';
        include_once 'src/views/turnoView.php';
        include_once 'src/views/errorView.php';
        $this->view = new TurnoView();
        $this->model = new TurnoModel();
        $this->model_cancha = new CanchaModel();
        $this->alert = new ErrorView();
    }
    public function eliminarTurno($id)
    {
        $base = explode( "/" , $_SERVER['REQUEST_URI']);

        $this->model->eliminar($id);
        header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/turnos");
        
    }
    
    public function crearTurno()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['cancha']) && !empty($_POST['fecha']) && !empty($_POST['horario']) && !empty($_POST['estado'])) {
            $id_cancha = $_POST['cancha'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['horario'];
            $estado = $_POST['estado'];
            $base = explode("/", $_SERVER['REQUEST_URI']);
            $this->model->crearTurno($id_cancha, $fecha, $hora, $estado);
            header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/turnos");
        }
    }

    public function renderPanelPage(){
        $canchas =  $this->model_cancha->listar();
        $this->view->showInicio($canchas);
    }

    public function renderTurnosPage(){
        if(!isset($_GET['cancha'])){
            $_GET['cancha'] = 1;
        }
        $turnos =  $this->model->listarPorCanchas($_GET['cancha']);
        $this->view->showTurnosPorCancha($turnos);
    }

    public function renderPanelCrearTurno()
    {

        $this->view->showCrearTurno();
    }
    public function renderPanelEditarTurno($i)
    {
        $id = $i;
        $this->view->showEditarTurno($id);
    }

    public function modTurno($id){
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['estado'])){
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado = $_POST['estado'];
            $base = explode("/", $_SERVER['REQUEST_URI']);
            $this->model->editarTurno($id, $fecha, $hora, $estado);
            header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/turnos");

        }
    }
}