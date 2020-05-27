<!-- This is gonna processing our request whenver we gonna call -->

<?php 

class Bootstrap {
    private $controller; 
    private $action;
    private $request;

    public function __construct($request){
        $this->request = $request;
        if ($this->request['controller'] == "") {
            // If there is no controller so we are going to home 
             $this->controller = "home"; 
        } else {
            //  else goes to controller 
            $this->controller = $this->request['controller'];
        }
        if ($this->request['action'] == "") {
            // If request action is equal to nothing 
            //It means it is equal to index action 
            $this->action = 'index';
        } else {
            // Or else set to action
            $this->action = $this->request['action'];
        }
    }



// This code is for redirecting and checking of the controller passed by the request

    public function createController() {
        //Check if this controller  that is passed is a class 
        if(class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            // Check if it is extended 
            if(in_array('Controller', $parents)) {
                //Check if our controller has the method that pass in 
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else {
                    // Inform the user that the method does not exist 
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
            echo '<h1> Controller Class does not exist </h1>';
            return;
        }
    }
 }
?> 