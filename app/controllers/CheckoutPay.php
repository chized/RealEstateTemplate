<?php
    class CheckoutPay extends Controller{

        public function __construct()
        {
            $this->userModel = $this->model('User');
            $this->propertyModel = $this->model('Property');
        }
        public function initpay(){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data_x = $_POST ? $_POST : [];

            $data = [
                'sessionItems' => $_SESSION['checkout'],
                'total' => array_sum(array_column($_SESSION['checkout'],'propertyPrice'))
            ];


            $this->view('pages/paystackpay', $data + $data_x); 
        }

        public function paystackpay(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //get input
            $user_id = $_POST['user_id'];
            $email = $_POST['email'];
            $amount = $_POST['amount'];
            $trans_id = $user_id.'_'.uniqid();
            $items =  $_SESSION['checkout'];
           
            /*print_r($items);
            exit();*/
            if ($email && $amount) {

                //convert amount
                $amount *= 100;
                
                // return to this url after payment
                $callback_url = 'https://localhost/cushy/CheckoutPay/verify_payment';

                //api key
                $api_key = 'sk_test_de926022d1d416ea73f77240b4c85f750c992626';
                $url = "https://api.paystack.co/transaction/initialize";

                $fields = [
                  'email' => $email,
                  'amount' => $amount,
                  'callback_url' => $callback_url,
                ];

              
                $fields_string = http_build_query($fields);
              
                //open connection
                $curl = curl_init();
              
                //set the url, number of POST vars, POST data
              
                curl_setopt($curl,CURLOPT_URL, $url);
                curl_setopt($curl,CURLOPT_POST, true);
                curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                  "Authorization: Bearer $api_key",
                  "Cache-Control: no-cache",
              
                ));
              
                //So that curl_exec returns the contents of the cURL; rather than echoing it
              
                curl_setopt($curl,CURLOPT_RETURNTRANSFER, true); 
              
                //execute post
                $ps_data = curl_exec($curl);
                $ps_data = json_decode($ps_data);

                //validate
                if ($ps_data) {
                    /*print_r($ps_data);
                    exit();*/
                    $ps_data = $ps_data->data;
                    $auth_url = $ps_data->authorization_url;
                    $access_code = $ps_data->access_code;
                    $reference = $ps_data->reference;

                    //looping through items
                    foreach ($items as $item) {
                        
                        $prop_id = $item['propertyId'];
                        
                        $db_data = [
                            'prop_id' => $prop_id, 'user_id' => $user_id, 
                            'trans_id' => $trans_id, 'auth_url' => $auth_url, 
                            'access_code' => $access_code, 'reference' => $reference, 

                            ];
                        //add DB logic here
                        //eg insert or update invoice with paystack fields
                        $add_item = $this->propertyModel->addCartItem($db_data);
                        //print_r($item);
                    }

                    //redirect to Paystack
                    header("Location: $auth_url",true,301);
                    exit();
                }
                
                exit();
            }
            //$this->view('pages/paystackpay', $data);   
        }
        
        public function addToCart($propertyId){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            //$count = 0;
            $propIds = [];
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //get logged user data
            $userId = $_SESSION['userId'];
            $user_dt = $this->userModel->getUserById($userId);
            
               // print_r($user_dt);

                if(isset($_POST['addToCart'])){
                    if(isset($_SESSION['checkout'])){
                        //To keep track of the number of properties added to checkout cart
                        $count = count($_SESSION['checkout']);
                        //create sequential array for matching array keys with productIds 
                        $propIds= array_column($_SESSION['checkout'], 'propertyId');
                        //unset($_SESSION['checkout']);
                        if(!in_array($propertyId, $propIds)){                          
                            $_SESSION['checkout'][$count] = [        
                                'propertyId' => $propertyId,
                                'propertyName' => trim($_POST['propertyName']),
                                'propertyPrice' => trim(intval($_POST['propertyPrice']))
                                ]; 
                                $count = count($_SESSION['checkout']); 
                            $data = [
                                'sessionItems' => $_SESSION['checkout'],
                                'count' => $count,
                                'total' => array_sum(array_column($_SESSION['checkout'],'propertyPrice'))
                            ];


                            $data['user_data'] = $user_dt;
                            $this->view('pages/pay', $data);
                        }else{ 
                                flash('checkoutInfo', 'This property is already selected for checkout');
                                $data = [
                                    'sessionItems' => $_SESSION['checkout'],
                                    'count' => $count,
                                    'total' => array_sum(array_column($_SESSION['checkout'],'propertyPrice'))
                                ];


                        $data['user_data'] = $user_dt;
                        $this->view('pages/pay', $data);
                        }
                       
                    }else{
                    $count = 1;
                    $_SESSION['checkout'][0] = [        
                    'propertyId' => $propertyId,
                    'propertyName' => trim($_POST['propertyName']),
                    'propertyPrice' => trim(intval($_POST['propertyPrice']))        
                    ];
                    $count = count($_SESSION['checkout']);
                    $data = [
                        'sessionItems' => $_SESSION['checkout'],
                        'count' => $count,
                        'total' => array_sum(array_column($_SESSION['checkout'],'propertyPrice'))
                    ];

                    $data['user_data'] = $user_dt;
                    $this->view('pages/pay', $data);   
                }         
                }   
          }

          public function createPropertySession($propertyId){
            $_SESSION['propertyId'] = $property->propertyId;
            $_SESSION['propertyName'] = $property->propertyName;
            $_SESSION['propertyPrice'] = $property->propertyPrice;
            //$_SESSION['accessCode'] = $user->accessCode;
            //redirect('');
        }
    }
