<?php
    // Base Controller class
    abstract class Controller {
        
        protected $request;
        protected $action;
        
        // Constructor
        public function __construct($action, $request){
            $this->action = $action;
            $this->request = $request;
        }
        
        // Function to execute an action
        public function executeAction(){
            return $this->{$this->action}();
        }
        
        // Function to return a view
        protected function returnView($viewmodel, $fullview){
            $view = 'views/' . get_class($this) . '/' . $this->action . '.php';
            if($fullview){
                require ('views/main.php');
            }
            else{
                require ($view);
            }
        }
    }
