<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="shortcut icon" href="../public/images/favicon.ico" type="image/x-icon"> -->
    <link rel="icon" href="<?php echo URLROOT; ?>/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap-ui/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/bootstrap-ui/css/jquery-ui.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/jumbotron.css" type="text/css">
    <link href="<?php echo URLROOT; ?>/fontawesome/css/all.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/custom.css">
    
    <title><?php echo SITENAME; ?>!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container-xl">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">Cushy Realty</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Pages/aboutus">About Us</a>
      </li>
      <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?php echo URLROOT; ?>/Properties/index" >Properties</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/Properties/index">Rents</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/Properties/index">Sales</a>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/Properties/index">Lease</a>
            </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/Pages/contactus">Contact us</a>
      </li>
          
    </ul>
    <?php //session_start(); ?>
    <?php if(isset($_SESSION['userId'])) : //echo $_SESSION['userId'];?>
        <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-primary btn-sm m-2 my-sm-0" href="<?php echo URLROOT; ?>/Users/logout" type="submit">Logout</a>
        <a class="m-2 my-sm-0" href="<?php echo URLROOT; ?>/Users/userProfile" type="submit"> <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
        <?php if($_SESSION['accessCode'] > 4) : //echo $_SESSION['userId'];?>
            <a class="m-2 my-sm-0" href="<?php echo URLROOT; ?>/Admins" type="submit"> <i class="fa fa-briefcase fa-2x my-color2" aria-hidden="true"></i>Admin Dashboard</a>
            <?php endif; ?>
      <?php else : ?>        
        <a class="btn btn-primary btn-sm m-2 my-sm-0" href="<?php echo URLROOT; ?>/Users/login" type="submit">Login</a>
          <a class="btn btn-primary btn-sm m-2 my-sm-0" href="<?php echo URLROOT; ?>/Users/signup" type="submit">Sign up</a>
        </form>
    <?php endif; ?>
  </div>
    </div>
</nav>
<div class="container-fluid">