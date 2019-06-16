<?php
  /* MAINLY USED TO CREATE USABLE URLS AND REDIRECTS */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->getUrl();

      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If it exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Removing this, to make it reusable after completion to others
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Intantiate new controller class
      $this->currentController = new $this->currentController;

      // Check for second part of URL
      if(isset($url[1])){
        // Checking if method is aviable in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Removing this, to make it reusable after completion
          unset($url[1]);
        }
      }

      // Get paramerts
      $this->params = $url ? array_values($url) : [];

      // Callback with controller, method and paramet, for example pages/edit/3
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
/* =======SANITIZING END URL, WHICH WILL BE USED INTO THE MAIN PAGE */
    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  