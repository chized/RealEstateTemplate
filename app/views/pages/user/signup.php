<?php 
  include APPROOT. "/views/templates/header.php"; ?><!-- 
<div class="container text-center mt-2">  
  <div class="row">
    <div class="col-md-6 ">
      <form class="form-signin">
        <img class="mb-4" src="<?php //echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>
        <p>Please fill in this form to sign up with us</p>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Comfirm Password" required="">
        <span>Already registered?<a href="<?php // echo URLROOT; ?>/User/login"> Sign in</a></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
       
    </form>
    </div>
  </div>
</div> -->
<div class="container text-center mt-2">
<div class="row">
  <div class="col-md-8 offset-md-3">
    <div class="card card-body bg-light mt-5">
        <form action="<?php echo URLROOT; ?>/Users/signup" method="post">
        <img class="mb-4" src="<?php echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>
          <div class="form-group">
            <label for="firstName">Name: <sup>*</sup></label>
            <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstNameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstName']; ?>">
            <span class="invalid-feedback"><?php echo $data['firstNameErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="surname">surname: <sup>*</sup></label>
            <input type="text" name="surname" class="form-control form-control-lg <?php echo (!empty($data['surnameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['surname']; ?>">
            <span class="invalid-feedback"><?php echo $data['surnameErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email"  placeholder="you@email.com" name="email" class="form-control form-control-lg <?php echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
          </div>
          <div class="form-group">
            <div class="mb-2 text-left">
              <small id="pword_err" class="" ></small>
            </div>
            
            <label for="password">Password: <sup>*</sup></label>
              <div class="input-group" id="showHidePassword">
              <input type="password" name="password" id="pword" class="form-control form-control-lg <?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" data-toggle="tooltip" data-placement="top" >
              <div class="input-group-addon border"><a class = "p-2" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
              </div>
            <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
            <div class="input-group" id="showHideConfirmPassword">
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg <?php echo (!empty($data['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirmPassword']; ?>">
            <div class="input-group-addon border"><a class = "p-2" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
            </div>
            <span class="invalid-feedback"><?php echo $data['confirmPasswordErr']; ?></span>
          </div>

          <div class="row">
          <span>Already registered?<a href="<?php echo URLROOT; ?>/Users/login"> Login</a></span>
            <div class="col">
              <input type="submit" value="SignUp" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>
<?php include APPROOT. "/views/templates/footer.php"; ?>