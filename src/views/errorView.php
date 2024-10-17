<?php

class ErrorView {
    public function showAlert($msg, $type){
       require('src/templates/alerta.phtml');   
    }
}