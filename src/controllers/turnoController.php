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
}
