
<?php        

class Users extends Controller
{
     
    public function error404(){
        $this->view('pages/user/error404');
    }

    public function index(){
        $this->view('pages/user/account');
    }

    public function __construct(){
        $this->userModel = $this->model('User');
      }
    public function forgotPassword(){
        $this->view('pages/user/forgotPassword');
    }
    public function updatePassword(){
        //echo $_GET['email']; 
        //echo $_GET['resetHash'];
         
        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            
           
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            //$data['email'] = $_GET['email'];
           
             //Processthe form
            $data =[
                'email'=> trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),          
                'passwordErr' => '',
                'confirmPasswordErr' => ''                    
            ];

            //Validate password
            if(empty($data['password'])){
                $data['passwordErr'] = 'Please enter your Password';
            }elseif(strlen($data['password']) < 8) {
                $data['passwordErr'] = 'Password must be at least 8 characters';
            }elseif(!preg_match("#[0-9]+#", $data['password'])){
                $data['passwordErr'] = 'Password must have at least one number';
            }elseif(strlen($data['password']) > 20 ){
                $data['passwordErr'] = 'Password is too long';
            }elseif(!preg_match("#[a-z]+#", $data['password'])){
                $data['passwordErr'] = 'Password must include one letter';
            }elseif(!preg_match("#[A-Z]+#", $data['password'])){
                $data['passwordErr'] = 'Password must include one Caps letter';
            }elseif(!preg_match("#\W+#", $data['password'])){
                $data['password'] = 'Password must include one symbol';
            }

           
            //Validate confirmPassword
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordErr'] = 'Please enter your password confirmation';
            }else {
               if($data['password'] != $data['confirmPassword']){
                   $data['confirmPasswordErr'] = 'Passwords do not Match';
               }
            }
            if(empty($data['passwordErr']) && empty($data['confirmPasswordErr'])){
            
               
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if($this->userModel->resetPassword($data)){
                flash('resetPassSuccess', 'Your password is sucessfully changed');
                redirect('Users/resetSuccess', $data);
                
                }
            }
        }
            $this->view('pages/user/resetPassword', $data);
    }
    public function resetPassword(){
        //echo $_GET['resetHash']; 
      //echo $_GET['validityCode'];
       

        //die('submitted');
            //Sanitize POST Data
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $presentTime = time();
            $data = [
                'email' => trim($_GET['email']),
                'validityCode' => trim($_GET['validityCode']),
                'resetHash' => trim($_GET['resetHash']),
                'vId' => 1
            ];

            //Check if link is still valid
            if($data['validityCode'] < time() - 24 * 60 * 60) {
               flash('resetPassFailure', 'This link has expired. Enter your email to recieve a new password reset link');
               redirect('Users/forgotPassword');            
            }elseif($this->userModel->checkResetHash($data['resetHash'])){
                //Hash Password
                $data = [
                'email' => trim($_GET['email']),
                'resetHash' => trim($_GET['resetHash'])
                ];
                redirect('Users/updatePassword?email= ' .$data['email']. '&resetHash= '.$data['resetHash']);
                     
            }else{
                flash('resetPassFailure', 'Error occured');
            }
            
    }

    public function resetPassLink(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            //die('submitted');
             //Sanitize POST Data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Processthe form
            $data =[
                'email' => trim($_POST['email']),                   
                'emailErr' => ''
            ];
   
            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter your email';
            } else {
                //Check email
                if($this->userModel->findUserByEmail($data['email']) == false) {
                    $data['emailErr'] = 'Email does not exist';
                }
            }
           
            //Make sure errosrs are empty
            if(empty($data['emailErr'])){
                //Validated
              
                $email = trim($_POST['email']);
                $officialEmail = 'info@cushyrealty.com';
                $validityCode = time();
                //activation hash code
                $data['resetHash'] = md5($email . $validityCode);

                //SignUp User
                if($this->userModel->resetPassLink($email, $data['resetHash'])){                 
                    $subject = 'Reset Password Link';
                    $msg = '
                        We recieved a request from you to reset your password, follow the link below if this request was made by you<br>
                         
                       
                        Username: '.$email.'<br>

                        If this request is not made my you please report to this email '.$officialEmail.'
                       
                        *Kindly note this link expires in 24 hours.<br>
                         
                        Please click this link to reset your password:
                        https://cushyrealty.com/Users/resetPassword?email='.$email.'&validityCode='.$validityCode.'&resetHash=' .$data['resetHash'] .'
                         
                        '; // Our message above including the link
                  
                        sendResetPassMail($email, $subject, $msg, $officialEmail);
                                       
                } else {
                    die('something went wrong');
                }
            } else {
                //Load view with errors
                $this->view('pages/user/resetPassword', $data);
            }

        }else{
            //Load form
            $data = [                   
                'email' => '',                   
                'emailErr' => ''                    
            ];

            //load view
            $this->view('pages/user/resetPassword', $data);
        }
    }

    public function resendActivation(){  
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                //die('submitted');
                 //Sanitize POST Data
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                //Processthe form
                $data =[
                    'email' => trim($_POST['email']),                   
                    'emailErr' => ''
                ];
       
                //Validate email
                if(empty($data['email'])){
                    $data['emailErr'] = 'Please enter your email';
                } else {
                    //Check email
                    if($this->userModel->findUserByEmail($data['email']) == false) {
                        $data['emailErr'] = 'Email does not exist';
                    }
                }
               
                //Make sure errosrs are empty
                if(empty($data['emailErr'])){
                    //Validated
                  
                    $email = trim($_POST['email']);
                    $validityCode = time();
                    //activation hash code
                    $data['activationHash'] = md5($email . $validityCode);
    
                    //SignUp User
                    if($this->userModel->resendActivateLink($email, $data['activationHash'])){                 
                        $subject = 'New Activation link';
                        $msg = '
                            Your account has already been created, you can login with the following credentials after you activate the new link below<br>
                             
                           
                            Username: '.$email.'<br>
                            Password: As you created it.<br>
                           
                            *Kindly note this link expires in 24 hours.<br>
                             
                            Please click this link to activate your account:
                            https://cushyrealty.com/Users/activate?email='.$email.'&validityCode='.$validityCode.'&activationHash=' .$data['activationHash'] .'
                             
                            '; // Our message above including the link
                      
                            sendmail($email, $subject, $msg);
                        //flash('signupSuccess', 'You have suceccesfully signed up, you can login, Check your email to activated account');
                        //redirect('Users/login');                   
                    } else {
                        die('something went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('pages/user/resendLink', $data);
                }
    
            }else{
                //Load form
                $data = [                   
                    'email' => '',                   
                    'emailErr' => ''                    
                ];
    
                //load view
                $this->view('pages/user/resendLink', $data);
            }   
    }
    
    public function activate() {
        //if($_SERVER['REQUEST_METHOD'] == 'GET'){  
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);  
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['validityCode']) && !empty($_GET['validityCode']))  {          
            //die('submitted');
                //Sanitize POST Data
                $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
                $presentTime = time();
                $data = [
                    'email' => trim($_GET['email']),
                    'validityCode' => trim($_GET['validityCode']),
                    'activationHash' => trim($_GET['activationHash']),
                    'vId' => 1
                ];

                //Check if link is still valid
                if($data['validityCode'] < time() - 24 * 60 * 60) {
                   flash('activationFailure', 'This link has expired. Enter your email and click on activate email to get new activation email');
                   redirect('Users/resendActivation');
                }elseif($this->userModel->checkEmailValidation($data['email'])){                        
                    flash('activationInfo', 'Your account is already activated, Please login');
                        redirect('Users/login');
                }elseif($this->userModel->checkActivationHash($data['activationHash'])){
                    if($this->userModel->activateUser($data['email'])){
                    flash('ActivationSuccess', 'Your user account is successfully activated');
                    $this->view('pages/user/activate', $data);
                    }else{
                        flash('activationFailure','something went wrong or activation failed');
                        redirect('User/resendActivation');
                    }
                }
                //Check email
               $this->view('pages/user/activate', $data);
        }
      
    }
    
    public function checkemail(){
        $this->view('pages/user/checkemail');
    }
    
    public function checkresetemail(){
        $this->view('pages/user/checkresetemail');
    }
    
    public function resetsuccess(){
        $this->view('pages/user/resetsuccess');
    }
    
    public function signup() {           
         
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //die('submitted');
             //Sanitize POST Data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Processthe form
            $data =[
                'firstName' => trim($_POST['firstName']),
                'surname' => trim($_POST['surname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'activationHash' => '',
                'firstNameErr' => '',
                'surnameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' =>''
            ];

            //Validate firstName
            if(empty($data['firstName'])){
                $data['firstNameErr'] = 'Please enter your first name';
            }

            //Validate surname 
            if(empty($data['surname'])){
                $data['surnameErr'] = 'Please enter your surname';
            }

            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter your email';
            } else {
                //Check email
                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailErr'] = 'Email is already taken';
                }
            }
            
            //Validate password
            if(empty($data['password'])){
                $data['passwordErr'] = 'Please enter your Password';
            }elseif(strlen($data['password']) < 8) {
                $data['passwordErr'] = 'Password must be at least 8 characters';
            }elseif(!preg_match("#[0-9]+#", $data['password'])){
                $data['passwordErr'] = 'Password must have at least one number';
            }elseif(strlen($data['password']) > 20 ){
                $data['passwordErr'] = 'Password is too long';
            }elseif(!preg_match("#[a-z]+#", $data['password'])){
                $data['passwordErr'] = 'Password must include one letter';
            }elseif(!preg_match("#[A-Z]+#", $data['password'])){
                $data['passwordErr'] = 'Password must include one Caps letter';
            }elseif(!preg_match("#\W+#", $data['password'])){
                $data['password'] = 'Password must include one symbol';
            }

           
            //Validate confirmPassword
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordErr'] = 'Please enter your password confirmation';
            }else {
               if($data['password'] != $data['confirmPassword']){
                   $data['confirmPasswordErr'] = 'Passwords do not Match';
               }
            }

            //Make sure errosrs are empty
            if(empty($data['firstNameErr']) && empty($data['surnameErr']) && empty($data['emailErr']) && empty($data['passwordErr']) && empty($data['confirmPasswordErr'])){
                //Validated
                //die('SUCCESS');

                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $email = trim($_POST['email']);
                $validityCode = time();
                $firstName = trim($_POST['firstName']);
                //activation hash code
                $data['activationHash'] = md5($email . $validityCode);

                //SignUp User
                if($this->userModel->signup($data)){                 
                    $subject = 'Signup successful';
                    $msg = '
                        Thanks for signing up ' .$firstName. '!
                        Your account has been created, you can login with the following credentials after you have activated your account by pressing the link below.<br>
                         
                       
                        Username: '.$email.'<br>
                        Password: As you created it.<br>
                       
                        *Kindly note this link expires in 24 hours.<br>
                         
                        Please click this link to activate your account:
                        https://cushyrealty.com/Users/activate?email='.$email.'&validityCode='.$validityCode.'&activationHash=' .$data['activationHash'] .'
                         
                        '; // Our message above including the link
                   
                        sendmail($email, $subject, $msg);
                    //flash('signupSuccess', 'You have suceccesfully signed up, you can login, Check your email to activated account');
                    //redirect('Users/login');                   
                } else {
                    die('something went wrong');
                }
            } else {
                //Load view with errors
                $this->view('pages/user/signup', $data);
            }

        }else{
            //Load form
            $data = [
                'firstName' => '',
                'surname' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'firstNameErr' => '',
                'surnameErr' => '',
                'emailErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' =>''
            ];

            //load view
            $this->view('pages/user/signup', $data);
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Processthe form
            //echo 'process form';
             //Sanitize POST Data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Processthe form
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),                   
                'emailErr' => '',
                'passwordErr' => ''                    
            ];


             //Validate password
             if(empty($data['password'])){
                $data['passwordErr'] = 'Please enter your Password';

            }

            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter your email';
            }
            if ($this->userModel->findUserByEmail($data['email'])){
                //User found
            }else{
                $data['emailErr'] = 'This User is not registered';
            }

           
            //Make sure errosrs are empty
            if(empty($data['emailErr']) && empty($data['passwordErr'])){
                //Validated
                //die('SUCCESS');
                //Check and set logged3 in User
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //Create Session
                    //die('SUCCESS');
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['passwordErr'] = 'Password Incorrect';
                    $this->view('pages/user/login', $data);
                }
             
            } else {
                //Load view with errors
                $this->view('pages/user/login', $data);

                $this->view('user/login', $data);
            }

           
        }else{
            //Load form
            $data = [
                'email' => '',
                'password' => '',
                'emailErr' => '',
                'passwordErr' => ''                  
            ];

            //load view
            $this->view('pages/user/login',$data);
        }
    }
    
    public function userProfile(){
        if(!isLoggedIn()){
            redirect('Users/login');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Processthe form
            //echo 'process form';
             //Sanitize POST Data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Processthe form
            $data =[
                'newEmail' => trim($_POST['newEmail']),
                'firstName' => trim($_POST['firstName']),
                'surname' => trim($_POST['surname']), 
                'phone' => trim($_POST['phone']),                                  
                'emailErr' => '',
                'firstNameErr' => '',
                'surnameErr' => '',
                'phoneName' => ''                    
            ];

            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'Please enter your email';
            }
                     
            //Make sure errosrs are empty
            if(empty($data['emailErr']) && empty($data['firstName'])){
                //Validated
               
                    $this->updateUser($data);
                    flash('updateSuccess', 'Update success');
                }else{
                    flash('updateFailure', 'Update failed');
                    $this->view('pages/user/profile', $data);
                }
        
        }else{
            //Load form
            $data = [
                'email' => $_SESSION['email'],
                'firstName' => $_SESSION['firstName'],
                'surname' => $_SESSION['surname'],
                'phone' => $_SESSION['phone'],                
                'emailErr' => '',
                'firstNameErr' => '',
                'surnameErr' => '',
                'phoneName' => ''                   
            ];

            //load view
            $this->view('pages/user/profile',$data);
        }
    }

    public function createUserSession($user){
        $_SESSION['userId'] = $user->userId;
        $_SESSION['email'] = $user->email;
        $_SESSION['firstName'] = $user->firstName;
        $_SESSION['surname'] = $user->email;
        $_SESSION['phone'] = $user->firstName;
        $_SESSION['accessCode'] = $user->accessCode;
        $_SESSION['resetHash'] = $user->resetHash;
        redirect('');
    }

    public function logout(){
        unset($_SESSION['userId']);
        unset($_SESSION['email']);
        unset($_SESSION['firstName']);
        unset($_SESSION['surname']);
        unset($_SESSION['phone']);
        unset($_SESSION['accessCode']);
        unset($_SESSION['resetHash']);
        session_destroy();
        redirect('pages/index');
    }
}
?>