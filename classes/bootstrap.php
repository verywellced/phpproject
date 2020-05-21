<!-- This is gonna processing our request whenver we gonna call -->

<?php 

class Bootstrap {
    private $controller;
    private $action;
    private $request;


    public function __construct($request){
        $this->request = $request;
        if ($this->request['controller'] == "") {
             $this->controller = "home"; 
        } else {
            $this->controller = $this->request['controller'];
        }
        if ($this->request['action'] == "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }


    public function createController() {
        //Check if this controller  that is passed is a class 
        if(class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            // Check if it is extended 
            if(in_array('Controller', $parents)) {
                //Check if our controller has the method that pass in 
                if(method_exists($controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else {
                    // Inform the user that the method does note exist 
                    echo '<h1> Method not exist </h1>';
                    return;
                }
            } else {
                // Controller not found 
                echo '<h1> Controller not exist </h1>';
                return;
            }
        } else {
            //Class not exist 
            echo '<h1> Controller Controller not exist </h1>';
            return;
        }
    }
 }

?> 