<?php 
  include APPROOT. "/views/templates/header.php"; ?>

  <div class="container text-center mt-2">
  <div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card card-body bg-light mt-5">
      <?php flash('resetPassInfo'); ?>
      <?php flash('resetPassFailure'); ?>
      
      <?php //echo $_GET['resetHash']; ?>
      <?php //echo $_GET['validityCode']; ?>
      <form action="<?php echo URLROOT; ?>/Users/resetPassword" method="post">
      <img class="mb-4" src="<?php echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Enter your new password</h1>
        <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
              <div class="input-group" id="showHidePassword">
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <div class="input-group-addon border"><a class = "p-2" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
              </div>
            <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
            <div class="input-group" id="showHideConfirmPassword">
            <input type="password" name="confirmPassword" class="form-control form-control-lg <?php echo (!empty($data['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirmPassword']; ?>">
            <div class="input-group-addon border"><a class = "p-2" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
            </div>
            <span class="invalid-feedback"><?php echo $data['confirmPasswordErr']; ?></span>
          </div>
          <div class="row">
          <div class="col">
              <input type="submit" value="Change Password" class="btn btn-primary btn-block">
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


