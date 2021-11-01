<?php 
class ForRent extends Controller 
{
    
    public function index() 
    {
        $this->view('pages/stays/forRent');
        //echo "rent";
    }

    public function rentals() 
    {
        $this->view('pages/stays/rentals');
        //echo "rent";
    }
     
    public function apartments()
    {
        $this->view('pages/stays/rent');
    }
    
    public function adetails()
    {
        $this->view('pages/stays/a_details');
    }

}