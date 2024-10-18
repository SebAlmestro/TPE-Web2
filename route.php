<?php
// Iniciamos Session, ya que el route es la primera "pagina" visitada al entrar.
session_start();



// IMPORTAMOS CONTROLADORES
include_once 'src/controllers/canchaController.php';
include_once 'src/controllers/turnoController.php';
include_once 'src/controllers/userController.php';
include_once 'src/views/errorView.php';

// Instanciamos controlador de noticias
$userController = new UserController();
$canchaController = new CanchaController();
$turnoController = new TurnoController();
$errorView = new ErrorView();


// leemos la accion que viene por parametro
$action = 'inicio'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
        // Aqui estan las rutas referidas a las sesiones  y registros.
    case 'inicio':
        //if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $canchaController->renderInicioPage();
        break;
    case 'panel':
        //if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        if (isset($params[1])) {
            if ($params[1] == "canchas") {
                if (isset($params[2])) {
                    switch ($params[2]) {
                        case 'crear':
                            $canchaController->renderPanelCrearPage();
                            break;
                        case 'editar':
                            if (isset($params[3])) {
                                $canchaController->renderPaneleditarCancha($params[3]);
                                break;
                            }
                        case 'eliminar':
                            if (isset($params[3])) {
                                $canchaController->eliminarCancha($params[3]);
                            }
                            break;
                        case 'nueva':
                            $canchaController->crearCancha();
                            break;
                        case 'actualizar':
                            $canchaController->editarCancha($params[3]);
                            break;
                    }
                } else {
                    $canchaController->renderPanelPage();
                }
            }
            if ($params[1] == "turnos") {
                if (isset($params[2])) {
                    switch ($params[2]) {
                        case 'filtrar':
                            $turnoController->renderTurnosPage();
                            break;
                        case 'crear':
                            $canchaController->renderPanelCrearPage();
                            break;
                        case 'editar':
                            $canchaController->renderPanelPage();
                            break;
                        case 'eliminar':
                            if (isset($params[3])) {
                                $canchaController->eliminarCancha($params[3]);
                            }
                            break;
                        case 'nueva':
                            $canchaController->crearCancha();
                            break;
                    }
                } else {
                    $turnoController->renderPanelPage();
                }
            }
        }
        break;
    case 'turnos':
        $id = null;
        if (isset($params[1])) $id = $params[1];
        $canchaController->renderTurnosPage($id);
        break;
    case 'ingresar':
        if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $userController->renderIngresoForm();
        break;
    case 'iniciar':
        //if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $userController->iniciarSesion();
        break;
    case 'cerrar':
        //if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $userController->cerrarSesion();
        break;

    default:
        //Si no encuentra la URL o no tiene ruta y controlador definido muestra error.
        $errorView->showAlert("Esta pagina no existe", "danger");
}

// Cargamos el footer, contenido estatico.