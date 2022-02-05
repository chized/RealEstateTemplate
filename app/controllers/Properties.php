<?php
class Properties extends Controller{
   
        public function __construct()
        {
            $this->propertyModel = $this->model('Property');
            $this->userModel = $this->model('User');
        }
        
        public function error404()
        {
          $this->view('pages/user/error404');
        }

        public function index() 
        {
            $properties = $this->propertyModel->getProperties();
            $limit = 30;
            //$mainImage = $this->propertyModel->getPropertyMainImage($properties->propertyId);
            $data = [
                'properties' => $properties,
                'limit' => $limit
                //'mainImage' =>$mainImage
            ];
            $this->view('pages/property/all', $data);
            //echo "rent";
        }
        public function singleProperty($propertyId){
            $property = $this->propertyModel->getPropertyById($propertyId);
            $image = $this->propertyModel->getImageByPropertyId($propertyId);
            $data = [
              'property' => $property,
              'image' => $image
            ];
            //$this->view('adminPages/singleEdit', $data);
            $this->view('pages/property/single', $data);
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