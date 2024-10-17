<?php

class TurnoView {

    public function showInicio($canchas){
        include_once 'src/templates/turnos/inicio.phtml';
    }
    public function showTurnosPorCancha($turnos){
        include_once 'src/templates/turnos/listado.phtml';
    }
}