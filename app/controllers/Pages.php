<?php
class Pages extends Controller
{

    public function __construct(){
      $this->propertyModel = $this->model('Property');
    }
   
    //public function index($name = '')
    public function index()
    {
      $properties = $this->propertyModel->getProperties();
      $data = [
        'title' => 'Welcome',
        'properties' => $properties
      ];
            $this->view('/home',$data);


    }

    public function errorPages()
    {
      $this->view('pages/pagesAccessErrors');
    }

    public function aboutus(){
      $this->view('pages/aboutus');
    }

    public function pay(){
      $this->view('pages/pay');
    }
}