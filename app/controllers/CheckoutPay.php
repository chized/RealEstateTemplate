<?php
    class CheckoutPay extends Controller{

        public function initpay(){
            $this->view('pages/paystackpay');//, $data); 
        }
        public function paystackpay(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $url = "https://api.paystack.co/transaction/initialize";

            $fields = [
          
              'email' => "customer@email.com",
          
              'amount' => "20000"
          
            ];
          
            $fields_string = http_build_query($fields);
          
            //open connection
          
            $ch = curl_init();
          
            
          
            //set the url, number of POST vars, POST data
          
            curl_setopt($ch,CURLOPT_URL, $url);
          
            curl_setopt($ch,CURLOPT_POST, true);
          
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
          
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          
              "Authorization: sk_test_de926022d1d416ea73f77240b4c85f750c992626;",
          
              "Cache-Control: no-cache",
          
            ));
          
            
          
            //So that curl_exec returns the contents of the cURL; rather than echoing it
          
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
          
            
          
            //execute post
          
            $result = curl_exec($ch);
          
            echo $result;
            $this->view('pages/paystackpay', $data);   
        }
        
        public function addToCart($propertyId){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            //$count = 0;
            $propIds = [];
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
                            $this->view('pages/pay', $data);
                        }else{ 
                                flash('checkoutInfo', 'This property is already selected for checkout');
                                $data = [
                                    'sessionItems' => $_SESSION['checkout'],
                                    'count' => $count,
                                    'total' => array_sum(array_column($_SESSION['checkout'],'propertyPrice'))
                                ];;  
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
