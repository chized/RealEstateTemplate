<?php


    use utils\RandomStringGenerator;
    

class Admins extends Controller
{
  public function __construct(){
    if(!isLoggedIn()){
      redirect('Users/login');
  }

    if(!isAuthorised()){
      redirect('Pages/errorPages');
  }

    $this->propertyModel = $this->model('Property');
  }
  

  public function index()
    {
        $this->view('adminPages/adminDashboard');
    }
    public function propertyImage(){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    }
    public function activateProperty() {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if(isset($_POST['deactivated'])) {
        // is propery is deactivated in database this code runs
          $data = [
            'propertyId' => trim($_POST['propertyId']),
            'isActive' => 1
          ];
          if($this->propertyModel->activateProperty($data)){
            flash('activateSuccess','Property is Activated');
            redirect('Admins/adminAllProperties'); 
          }
          $this->view('Admins/adminPages/adminAll');

        //Else if property is activated in database this code runs
      }elseif(isset($_POST['activated'])){
          $data = [
            'propertyId' => trim($_POST['propertyId']),
            'isActive' => 0
          ];
          if($this->propertyModel->deactivateProperty($data)){
            flash('deactivateSuccess','Property is Deactivated');
            redirect('Admins/adminAllProperties'); 
          }
          //$this->view('adminPages/adminAll');
      }else{
        flash('deactivateFailure','Something went wrong'); 
        redirect('adminAllProperties'); 
      }
    }

    public function filCheck(){
      $pageLimit = 5;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $pageStart = ($page - 1)* $pageLimit; 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['searchText'])){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
              'searchText' => $_POST['searchText']
            ];
        // Sanitize POST array
 
       $properties = $this->propertyModel->adminPropertySearch($pageStart, $pageLimit, $data['searchText']);     
      $propertyCount = $this->propertyModel->adminGetPropertyPages();
      $total = $propertyCount['id'];
      $pages = ceil($total / $pageLimit);
      //$previous = $page -       
     
      $data = [
         'properties' => $properties,
          'pageLimit' => $pageLimit,
          'page' => $page,
          'pageStart' => $pageStart,
          'pages' => $pages,
          'previous' => $page - 1,
          'next' => $page + 1
      ];
     
         $this->view('adminPages/allProp', $data);
      //echo "rent";
     }

    }else{
          
      $properties = $this->propertyModel->adminGetProperties($pageStart, $pageLimit);
      $propertyCount = $this->propertyModel->adminGetPropertyPages();
      $filterType = $this->propertyModel->getFilterType(); 
      $filterCat= $this->propertyModel->getFilterCat();
      $total = $propertyCount['id'];
      $pages = ceil($total / $pageLimit);
      //$previous = $page -       
     
      $data = [
          'filterType' => $filterType,
          'filterCat' => $filterCat,
          'properties' => $properties,
          'pageLimit' => $pageLimit,
          'page' => $page,
          'pageStart' => $pageStart,
          'pages' => $pages,
          'previous' => $page - 1,
          'next' => $page + 1
      ];
      $this->view('adminPages/allProp', $data);
      //echo "rent";  
      }
     
  }
      
  public function adminAllProperties(){
      
      $pageLimit = 5;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $pageStart = ($page - 1)* $pageLimit;      
      $properties = $this->propertyModel->adminGetProperties($pageStart, $pageLimit);
      $propertyCount = $this->propertyModel->adminGetPropertyPages();
      $filterType = $this->propertyModel->getFilterType(); 
      $filterCat= $this->propertyModel->getFilterCat();
      $total = $propertyCount['id'];
      $pages = ceil($total / $pageLimit);
      //$previous = $page -       
     
      $data = [
          'filterType' => $filterType,
          'filterCat' => $filterCat,
          'properties' => $properties,
          'pageLimit' => $pageLimit,
          'page' => $page,
          'pageStart' => $pageStart,
          'pages' => $pages,
          'previous' => $page - 1,
          'next' => $page + 1
      ];
      $this->view('adminPages/adminAll', $data);
      //echo "rent";  
      }




public function singleEdit($propertyId){

      $property = $this->propertyModel->getPropertyById($propertyId);
      $image = $this->propertyModel->getImageByPropertyId($propertyId);
      $data = [
        'property' => $property,
        'image' => $image
      ];
      $this->view('adminPages/singleEdit', $data);
    }

public function getPropertyImage($propertyId){
     
      $image = $this->propertyModel->getImageByPropertyId($propertyId);
      $data = [
        'image' => $image
      ];
      $this->view('adminPages/adminAll', $data);
    }

  public function imageUpload($propertyId){
     
      //if(isset($_POST["submit"])) {
        //if(isset($_FILES["picFile"]["name"])) {
          if(empty($_FILES['picFile']['name'])){
            //$imgFile = $getCpic;
             echo 'go';
             $property = $this->propertyModel->getPropertyById($propertyId);
              $image = $this->propertyModel->getImageByPropertyId($propertyId);
              $data = [
                'property' => $property,
                'image' => $image
              ]; 
              $this->view('adminPages/singleEdit', $data);
          } else { 
            
            $imgFile = $_FILES["picFile"]["name"];
            $imgFile_tmp = $_FILES["picFile"]["tmp_name"];
            $folderName =  $_SERVER['DOCUMENT_ROOT'] .'/cushy/public/uploads/properties/';
            $imageUrlBase = URLROOT. '/uploads/properties/';
            //$folderName =  URLROOT .'/public/uploads/properties/';
        $validExt = array("jpg", "png", "jpeg", "bmp", "gif", "webp", "jfif");
        $ext = pathinfo($imgFile, PATHINFO_EXTENSION);
        if ($imgFile == "") {
          flash("imageError", "Attach an image");
        } elseif ($_FILES["picFile"]["size"] <= 0 ) {
          flash("imageError", "Image is not proper.");
        } else if ( !in_array($ext, $validExt) )  {
          flash("imageError", "Not a valid image file");
        } else {
          // upload script here
          //echo 'come';
          $imgCode =  rand(10000, 990000). '_'. time().'.'.$ext;
          $filePath = $folderName . $imgCode;
          
          $property = $this->propertyModel->getPropertyById($propertyId);
          $image = $this->propertyModel->getImageByPropertyId($propertyId);
        
          $data = [
              'property' => $property,
              'image' => $image,
              'imageName' => $_FILES['picFile']['name'],
              'imageUrl' => $imageUrlBase . $imgCode,
              'imageRank' => trim($_POST['imageRank']),
              'imageDesc' => trim($_POST['imageDesc']),
              'propertyId' => trim($_POST['propertyId'])
            ];

            if($this->propertyModel->findPropertyImageRank($data)) {
              flash("imageError", "This image rank already exist");
              $this->view('adminPages/singleEdit', $data);
            }elseif (move_uploaded_file( $_FILES["picFile"]["tmp_name"], $filePath)) {
              if($this->propertyModel->imageUpload($data)){
              
              flash('uploadSuccess','Succcessful image upload');
              redirect('Admins/adminAllProperties', $data);
              }else{
                die('Something went wrong');
              }
            } else {
            flash('imageError','Problem in uploading file');
            redirect('Admins/singleEdit/'. $propertyId);
            }
        }
        //echo 'go';
      }
      $property = $this->propertyModel->getPropertyById($propertyId);
              $image = $this->propertyModel->getImageByPropertyId($propertyId);
              $data = [
                'property' => $property,
                'image' => $image
              ]; 
      $this->view('adminPages/singleEdit', $data);
  }
    
 
  
  public function addPropertyRent(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                      // Call method to generate random string.
                      //set new alphabet
                      $customAlphabet = "RENT0123456789";
                    
                      // Create new instance of generator class.
                      $generator = new RandomStringGenerator($customAlphabet);
                    
                      // Set token length.
                       $tokenLength = 10;
                       $generator->setAlphabet($customAlphabet);
                       $token = $generator->generate($tokenLength);
                      //die('submit');

                     // Sanitize POST array
                      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                      $data = [
                        'propertyCategory' => trim($_POST['propertyCategory']),
                        'propertyName' => trim($_POST['propertyName']),
                        'propertyDesc' => trim($_POST['propertyDesc']),
                        'propertyCode' => $token,
                        'propertyTown' => trim($_POST['propertyTown']),
                        'locationDesc' => trim($_POST['locationDesc']),
                        'propertySize' => trim($_POST['propertySize']),
                        'propertyType' => trim($_POST['propertyType']),
                        'propertyPrice' => trim($_POST['propertyPrice']),
                        'propertyOwnerId' => $_SESSION['userId'],
                        'amenities' => trim($_POST['amenities']),
                        'bedrooms' => trim($_POST['bedrooms']),
                        'toilets' => trim($_POST['toilets']),
                        'propertyNameErr' => '',
                        'propertyDescErr' => '',
                        'propertyTownErr' => '',
                        'locationDecsErr' => '',
                        'propertySizeErr' => '',
                        'propertyTypeErr' => '',
                        'propertyPriceErr' => '',
                        'amenitiesErr' =>'',
                        'bedroomsErr' => '',
                        'toiletsErr' =>''
                      ];
              
                      // Validate data
                      if(empty($data['propertyName'])){
                        $data['propertyNameErr'] = 'Please enter property name';
                      }
                      if(empty($data['propertyDesc'])){
                        $data['propertyDescErr'] = 'Please enter property Description';
                      }

                      if(empty($data['propertyTown'])){
                        $data['propertyTownErr'] = 'Please enter property town';
                      }

                      if(empty($data['propertyPrice'])){
                        $data['propertyPrice'] = 'Please enter property Price';
                      }

                      if(empty($data['amenities'])){
                        $data['amenitiesErr'] = 'Please enter amenities';
                      }

                      if(empty($data['bedrooms'])){
                        $data['bedroomsErr'] = 'Please enter bedrooms';
                      }

                      if(empty($data['toiletsDesc'])){
                        $data['toiletsErr'] = 'Please enter toilets no';
                      }
              
                      // Make sure no errors
                      if(empty($data['propertyNameErr']) && empty($data['propertyDescErr'])){
                      // && empty($data['propertyTownErr']) && empty($data['locationDescErr']) && empty($data['bedroomsErr']) && empty($data['toiletsErr'])){
                        // Validated
                        if($this->propertyModel->addPropertyRent($data)){
                          flash('addProperty', 'Property Successfully Added');
                          redirect('Admins/adminAllProperties');
                        } else {
                          die('Something went wrong');
                        }
                      } else {
                        // Load view with errors
                        $this->view('adminPages/addProperty', $data);
                      }
              
                    } else {
                      $data = [
                        'propertyName' => '',
                        'propertyDesc' => '',
                        'propertyTown' => '',
                        'locationDesc' => '',
                        'propertySize' => '',
                        'propertyType' => '',
                        'propertyPrice' => '',
                        'bedrooms' => '',
                        'amenities' =>'',
                        'toilets' => '',
                        'propertyNameErr' => '',
                        'propertyDescErr' => '',
                        'propertyTownErr' => '',
                        'propertyPriceErr' => '',
                        'propertySizeErr' => '',
                        'amenitiesErr' =>'',
                        'bedroomsErr' => '',
                        'toiletsErr' =>''
                      ];
                
        $this->view('adminPages/addProperty', $data);
        }    
   }
                    
          
 public function addProperty(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Call method to generate random string.
                  //set new alphabet
                    $customAlphabet = "RENT0123456789";
              
                //   // Create new instance of generator class.
                    $generator = new RandomStringGenerator($customAlphabet);
              
                //   // Set token length.
                  $tokenLength = 10;
                  $generator->setAlphabet($customAlphabet);
                  $token = $generator->generate($tokenLength);
                //   //die('submit');

                // // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                  'propertyName' => trim($_POST['propertyName']),
                  'propertyDesc' => trim($_POST['propertyDesc']),
                  'propertyCode' => $token,
                  'propertyTown' => trim($_POST['propertyTown']),
                  'locationDesc' => trim($_POST['locationDesc']),
                  'propertyOwnerId' => $_SESSION['userId'],
                  'amenities' => trim($_POST['amenities']),
                  'bedrooms' => trim($_POST['bedrooms']),
                  'toilets' => trim($_POST['toilets']),
                  'propertyNameErr' => '',
                  'propertyDescErr' => '',
                  'propertyTownErr' => '',
                  'locationDecsErr' => '',
                  'amenitiesErr' =>'',
                  'bedrooms' => '',
                  'toilets' =>''
                ];
        
                // Validate data
                if(empty($data['propertyName'])){
                  $data['propertyNameErr'] = 'Please enter postTitle';
                }
                if(empty($data['propertyDesc'])){
                  $data['propertyDescErr'] = 'Please enter postBody text';
                }

                if(empty($data['propertyTown'])){
                  $data['propertyTownErr'] = 'Please enter postBody text';
                }

                if(empty($data['locationDesc'])){
                  $data['locationDescErr'] = 'Please enter postBody text';
                }

                if(empty($data['bedrooms'])){
                  $data['bedroomsErr'] = 'Please enter postBody text';
                }

                if(empty($data['toiletsDesc'])){
                  $data['toiletsErr'] = 'Please enter postBody text';
                }
        
                // Make sure no errors
                if(empty($data['propertyNameErr']) && empty($data['propertyDescErr'])){
                // && empty($data['propertyTownErr']) && empty($data['locationDescErr']) && empty($data['bedroomsErr']) && empty($data['toiletsErr'])){
                  // Validated
                  if($this->propertyModel->addPropertyRent($data)){
                    flash('addProperty', 'Property Successfully Added');
                    redirect('Properties');
                  } else {
                    die('Something went wrong');
                  }
                } else {
                  // Load view with errors
                  $this->view('adminPages/addProperty', $data);
                }
        
              } else {
                $data = [
                  'propertyName' => '',
                  'propertyDesc' => '',
                  'propertyTown' => '',
                  'locationDesc' => '',
                  'bedrooms' => '',
                  'toilets' => '',
                  'propertyNameErr' => '',
                  'propertyDescErr' => '',
                  'propertyTownErr' => '',
                  'locationDecsErr' => '',
                  'bedroomsErr' => '',
                  'toiletsErr' =>''
                ];
                
        $this->view('adminPages/addProperty', $data);
      }    
}

public function multipleSearch(){
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
      'propertyLocation' => trim($_POST['propertyLocation']),
      'propertyType' => trim($_POST['propertyType']),
      'minPrice' => trim($_POST['minPrice']),
      'maxPrice' => trim($_POST)['maxPrice']
    ];

    if(!empty($data['propertyLocation']) || !empty($data['propertyType']) || !empty($data['minPrice']) && !empty($data['maxPrice'])){
      if($this->propertyModel->multipleSearch($data)){
        
      }
    }

  }
}
// Plublic funtion to edit property
public function editPropertyRent($propertyId){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){      
      // // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'propertyId' => $propertyId,
        'propertyCategory' => trim($_POST['propertyCategory']),
        'propertyName' => trim($_POST['propertyName']),
        'propertyDesc' => trim($_POST['propertyDesc']),
        'propertyTown' => trim($_POST['propertyTown']),
        'locationDesc' => trim($_POST['locationDesc']),
        'propertySize' => trim($_POST['propertySize']),
        'propertyType' => trim($_POST['propertyType']),
        'propertyPrice' => trim($_POST['propertyPrice']),
        'amenities' => trim($_POST['amenities']),
        'bedrooms' => trim($_POST['bedrooms']),
        'toilets' => trim($_POST['toilets']),
        'propertyNameErr' => '',
        'propertyDescErr' => '',
        'propertyTownErr' => '',
        'locationDecsErr' => '',
        'propertySizeErr' => '',
        'propertyTypeErr' => '',
        'propertyPriceErr' => '',
        'amenitiesErr' =>'',
        'bedroomsErr' => '',
        'toiletsErr' =>''
      ];
      // Validate data
      if(empty($data['propertyName'])){
        $data['propertyNameErr'] = 'Please enter property name';
      }
      if(empty($data['propertyDesc'])){
        $data['propertyDescErr'] = 'Please enter Desc';
      }

      if(empty($data['propertyTown'])){
        $data['propertyTownErr'] = 'Please enter Town';
      }

      if(empty($data['locationDesc'])){
        $data['locationDescErr'] = 'Please enter Location  ';
      }

      if(empty($data['bedrooms'])){
        $data['bedroomsErr'] = 'Please enter No of bedrooms';
      }

      if(empty($data['toiletsDesc'])){
        $data['toiletsErr'] = 'Please enter no of toilets';
      }

      // Make sure no errors
      if(empty($data['propertyNameErr']) && empty($data['propertyDescErr'])){
      // && empty($data['propertyTownErr']) && empty($data['locationDescErr']) && empty($data['bedroomsErr']) && empty($data['toiletsErr'])){
        // Validated
        if($this->propertyModel->updatePropertyRent($data)){
          flash('editProperty', 'Property Successfully Updated');
          redirect('Admins/adminAllProperties');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('adminPages/editProperty', $data);
      }
      $this->view('adminPages/editProperty', $data);
    } else {
      $property = $this->propertyModel->getPropertyById($propertyId);      
      $data = [
        'propertyId' => $propertyId,
        'propertyCategory' => trim($property->propertyCategory),
        'propertyName' => trim($property->propertyName),
        'propertyDesc' => trim($property->propertyDesc),
        'propertyTown' => trim($property->propertyTown),
        'locationDesc' => trim($property->locationDesc),
        'propertySize' => trim($property->propertySize),
        'propertyType' => trim($property->propertyType),
        'propertyPrice' => trim($property->propertyPrice),
        'amenities' => trim($property->amenities),
        'bedrooms' => trim($property->bedrooms),
        'toilets' => trim($property->toilets),
        'propertyNameErr' => '',
        'propertyDescErr' => '',
        'propertyTownErr' => '',
        'locationDecsErr' => '',
        'propertySizeErr' => '',
        'propertyTypeErr' => '',
        'propertyPriceErr' => '',
        'amenitiesErr' =>'',
        'bedroomsErr' => '',
        'toiletsErr' =>''
      ];
      
    $this->view('adminPages/editProperty', $data);
    }
  }
}
