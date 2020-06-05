<?php 

    // Created the URL and calls the appropriate controller
    // URL FORMAT : /controller/method/params

class Core {

    protected $currentController = 'Users';
    protected $currentMethod = 'login';
    protected $params = [];


    public function __construct() {
       
        $url = $this->getUrl();
        // Check for first url parameter

        if($url){
               // Look for first value
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            } 
        }
     

        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;

        // Check for 2nd url parameter

        if(isset($url[1])) {
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params

        $this->params = $url ? array_values($url) : [];
        
        // Call function with params

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }

    public function getUrl() {

        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);

            // Return url array
            return $url;
        }
        

    }

}



