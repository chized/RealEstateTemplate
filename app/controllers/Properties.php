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
            

            //get user rating for this property
            $userId = $_SESSION['userId'];
            $dt_01 = [
              'userId' => $userId,
              'propertyId' => $propertyId,
            ];

            $dt_02 = $dt_01;

            $props_reviews = $this->propertyModel->getPropertyReviews($dt_01);

            $user_review = $this->propertyModel->getUserPropertyReview($dt_01);

            //$user_dt = $this->userModel->getUserById($userId);
            $data = [
              'property' => $property,
              'image' => $image,
              'props_reviews' => $props_reviews,
              'user_review' => $user_review,
              'rate_msg' => '',
            ];

            //when rating
            //if (isset($_POST['add_rate_btn']) || isset($_POST['ratedId']) && !$user_review) {
            if (isset($_POST['add_rate_btn']) ) {
              $rating = $_POST['user_rating'];
              $msg = $_POST['comment'];

              if (!$user_review) {
                //insert new, when not rated yet
                $dt_02['rating'] = $rating;
                $dt_02['msg'] = $msg;
                
                $add_rate = $this->propertyModel->addPropertyReview($dt_02);
                
                if ($add_rate) {
                  $data['rate_msg'] = '<h5 class="alert alert-success" role="alert"> Review Added </h5>';
                }else{
                  $data['rate_msg'] = '<h5 class="alert alert-danger" role="alert"> Review Not Added </h5>';
                }

                $user_review = $this->propertyModel->getUserPropertyReview($dt_01);
              }else{
                //update existing 
                $data['rate_msg'] = '<h5 class="alert alert-danger" role="alert"> Review Not Added </h5>';
              }
              
            }



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