<?php
/**
 * Author : Chioma Chukwu
 * 
 */

class App
{
    protected $controller = 'Pages';

    protected $method = 'index';
    
    protected $params = [];

    public function __construct()
    {
        //echo 'Ok';
        $url = $this->parseUrl();

        if(file_exists('../app/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];
            //unset($url[0]);
            unset($url[0]);
        }else{

        }

        require_once '../app/controllers/' . $this->controller . '.php';

        //echo $this->controller;
        $this->controller = new $this->controller;
       
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $this->params = $url ? array_values($url) : [];
                
                call_user_func_array([$this->controller, 'error404'], $this->params);
                exit();            
            }
        }
        
        //$this->params = array_values($url);
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
        
        //print_r($this->params);
       
    }

    public function parseUrl()
    {
        
        if(isset($_GET['url'])) {
            //echo $_GET['url'];
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

    public function folders()
    {

        
    }
}
