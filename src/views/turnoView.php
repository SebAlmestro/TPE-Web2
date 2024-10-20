<?php

class TurnoView {

    public function showInicio($canchas){
        include_once 'src/templates/turnos/inicio.phtml';
    }
    public function showTurnosPorCancha($turnos){
        include_once 'src/templates/turnos/listado.phtml';
    }
    public function showCrearTurno(){
        include_once 'src/templates/turnos/crear.phtml';
    }
    public function showEditarTurno($i){
        $id = $i;
        include_once 'src/templates/turnos/editar.phtml';
    }
}