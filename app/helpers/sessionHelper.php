<?php
 session_start();

//Flash Messaging helper
//Exampe - Flash('signup_success, 'you are now siged up');
//DISPLAY IN VIEW - <?php echo flash('signup succes);
function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name. '_class'])){
                unset($_SESSION[$name. '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msgFlash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }
}

//$_SESSION['signupSuccess']

// $_SESSION['user'] = 'Chi';
// unset($_SESSION['user']);
function isLoggedIn(){
    if(isset($_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}

function isAuthorised(){
    if($_SESSION['accessCode'] > 4){
        return true;
    }else{
        return false;
    }
}

?>