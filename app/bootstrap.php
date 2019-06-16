<?php
  // Load Config, to connect to database and other params
  require_once 'config/config.php';

    // Load Helper, used for redirecting
    require_once 'helpers/url_helper.php';
  // Autoload Core Libraries, used as main Core controllers
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
