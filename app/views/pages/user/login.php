<?php 
  include APPROOT. "/views/templates/header.php"; ?>
<!-- <div class="container text-center mt-2">  
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="form-signin"><?//=$data['name']?>
        <img class="mb-4" src="<?php //echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    
          <label for="email">Email: <sup>*</sup></label>
          <input type="text" name="email" class="form-control form-control-lg<?php //echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php //echo $data['email'] ?>">
          <span class="invalid-feedback"><?php //echo $data['emailErr']; ?></span>

          <label for="password">Password: <sup>*</sup></label>
          <input type="text" name="password" class="form-control form-control-lg<?php //echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php //echo $data['password'] ?>">
          <span class="invalid-feedback"><?php //echo $data['passwordErr']; ?></span>
          <label>
    <div class="row">
    <div class="col-md-6 offset-md-3">
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <span>Not registered?<a href="<?php //echo URLROOT; ?>/Users/signup"> Sign up</a></span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>      
    </form>
  </div>
  </div> -->
  <div class="container text-center mt-2">
  <div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card card-body bg-light mt-5">
      <?php flash('activationInfo'); ?>
      <form action="<?php echo URLROOT; ?>/Users/login" method="post">
      <img class="mb-4" src="<?php echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
              <div class="input-group" id="showHideLoginPassword">
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <div class="input-group-addon border"><a class = "p-2" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
              </div>            
            <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="login" class="btn btn-primary btn-block">
            </div>          
          </div>
          <div class="row">
            <div class="col">
            <span>Not registered?<a href="<?php echo URLROOT; ?>/Users/signup">Sign up </a></span>
            </div>
            <div class="col">
              <span><a href="<?php echo URLROOT; ?>/Users/forgotPassword">Forgot password?</a></span>
            </div>       
          </div>
        </form>
      
    </div>
  </div>
</div>
</div>
    <?php  include APPROOT. "/views/templates/footer.php"; ?>
    </div>
    
  </div>
</div>


