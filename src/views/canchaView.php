<?php

class CanchaView {

    public function showInicio($canchas){
        include_once 'src/templates/inicio.phtml';
    }
    public function showCanchas($canchas){
        include_once 'src/templates/canchas/listado.phtml';
    }
    public function showCrearCancha(){
        include_once 'src/templates/canchas/crear.phtml';
    }
    public function showTurnos($turnos){
        include_once 'src/templates/turnos.phtml';
    }
}