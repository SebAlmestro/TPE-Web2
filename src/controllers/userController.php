<?php

class UserController {
    private $view;
    private $model;
    private $alert;

    public function __construct() {
        include_once 'src/views/userView.php';
        include_once 'src/models/userModel.php';
        include_once 'src/views/errorView.php';
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->alert = new ErrorView();
    }

    public function renderIngresoForm(){
        $this->view->showIngreso();
    }

    public function iniciarSesion() {
        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['nombre']) && !empty($_POST['contraseña'])){
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $userFound = $this->model->listarPorNombre($nombre);

            // Si el usuario no se encuentra, devolvemos una alerta.
            if(!$userFound) {
                $this->alert->showAlert("Este usuario no existe", "danger");
                die();
            }

            $contraseniaEncontrada = $userFound['contraseña'];

            if(password_verify($contraseña, $contraseniaEncontrada)){ // Comparamos la contraseña hasheada guardada y el hash de la nueva.
                $_SESSION['nombre'] = $nombre;
                $_SESSION['rol'] = $userFound['rol'];
                header("Location: inicio");
            } else {
                $this->alert->showAlert("Contraseña Incorrecta", "danger");
                die();
            }
        }
    }

    
    public function cerrarSesion(){
        session_destroy(); // Cerramos la sesion y devolvemos al inicio.
        header("Location: inicio");
    }
}