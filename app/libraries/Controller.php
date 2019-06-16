<?php
//Main controller, loads classes and views
  class Controller {

    public function model($model){
      //Asking for controller
      require_once '../app/models/' . $model . '.php';
      //Return new instance of model
      return new $model();
    }

    // Laoding views
    public function view($view, $data = []){
      // Asks, if exists, if exists -loads
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // If not, then throw error
        die('View does not exist');
      }
    }
  }