<?php 
abstract class Controller {
    protected $request; 
    protected $action; 

    public function __construct($action, $request) {
    //  This is only for declaring our actions and request to our property
        $this->action = $action;
        $this->request = $request;
    }
    
    // Method just to return the action 
    public function executeAction(){
        return $this->{$this->action}();
    }
    
    // Method to return our view, assigning a view on another controller for example on register method,
    //  We can assign the register view. 
    public function returnView( $viewmodel, $fullview) {

        // First string is the view folder, then
        //named the view on the views folder the same as the name of the class 
        // Then the action you want on the controller 
        $view = 'views/'. get_class($this) . '/' . $this->action . '.php';

        // Check if it is fullview --> if it is true we are gonna load our main layout file
        // Mainlayout is the one that wraps around the view. 
        if($fullview) {
            require('views/main.php');
        } else {
            require($view);
        }
    }


}




?>