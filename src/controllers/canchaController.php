<?php

class CanchaController
{

    private $view;
    private $model;
    private $alert;

    public function __construct()
    {
        include_once 'src/models/canchaModel.php';
        include_once 'src/views/canchaView.php';
        include_once 'src/views/errorView.php';
        $this->view = new CanchaView();
        $this->model = new CanchaModel();
        $this->alert = new ErrorView();
    }

    public function eliminarCancha($id)
    {
        $base = explode("/", $_SERVER['REQUEST_URI']);

        $this->model->eliminar($id);
        header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/canchas");
    }

    public function editarCancha($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['cesped']) && !empty($_POST['techada']) && !empty($_POST['precio'])) {
            $tipo_cesped = $_POST['cesped'];
            $precio = $_POST['precio'];
            $techada = $_POST['techada'] === "true" ? 1 : 0;
            $base = explode("/", $_SERVER['REQUEST_URI']);
            $this->model->editarCancha($id, $tipo_cesped, $precio, $techada);
            header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/canchas");
        }
    }

    public function crearCancha()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['cesped']) && !empty($_POST['imagen']) && !empty($_POST['techada']) && !empty($_POST['precio'])) {
            $tipo_cesped = $_POST['cesped'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $techada = $_POST['techada'];
            $base = explode("/", $_SERVER['REQUEST_URI']);
            $this->model->crear($tipo_cesped, $imagen, $precio, $techada);
            header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . $base[1] . "/panel/canchas");
        }
    }

    public function renderInicioPage()
    {
        $canchas =  $this->model->listar();
        $this->view->showInicio($canchas);
    }
    public function renderPanelPage()
    {
        $canchas =  $this->model->listar();
        $this->view->showCanchas($canchas);
    }

    public function renderPanelCrearPage()
    {

        $this->view->showCrearCancha();
    }

    public function renderPanelEditarCancha($i)
    {
        $id = $i;
        $this->view->showEditarCancha($id);
    }
    public function renderTurnosPage($identificador)
    {
        $turnos =  $this->model->listarPorIdentificador($identificador);
        $this->view->showTurnos($turnos);
    }
}
