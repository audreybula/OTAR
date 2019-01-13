<?php

    class Bootstrap{
        
        private $controller;
        private $action;
        private $request;
        
        // Constructor - Default controller is users and default action is index
        public function __construct($request) {
            $this->request = $request;
            
            if(empty($this->request['controller'])){
                $this->controller = 'users';
            }
            else{
                $this->controller = $this->request['controller'];
            }
            
            if(empty($this->request['action'])){
                $this->action = 'index';
            }
            else{
                $this->action = $this->request['action'];
            }
        }
        
        // Function to create a controller
        public function createController(){
            // Check Class
            if(class_exists($this->controller)){
                $parents = class_parents($this->controller);
                // Check Extend
                if(in_array("Controller", $parents)){
                    if(method_exists($this->controller, $this->action)){
                        return new $this->controller($this->action, $this->request);
                    }
                    else{
                        // Method Does Not Exist
                        echo '<h1>Method does not exist</h1>';
                        return;
                    }
                }
                else{
                    // Base Controller Does Not Exist
                    echo '<h1>Base Controller not found</h1>';
                    return;
                }
            }
            else{
                // Controller Class Does Not Exist
                echo '<h1>Controller class does not exist</h1>';
                return;
            }
        }
    }
