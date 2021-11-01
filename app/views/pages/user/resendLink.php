<?php 
  include APPROOT. "/views/templates/header.php"; ?>

  <div class="container text-center mt-2">
  <div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card card-body bg-light mt-5">
      <?php flash('activationInfo'); ?>
      <?php flash('activationFailure'); ?>
      <form action="<?php echo URLROOT; ?>/Users/resendActivation" method="post">
      <img class="mb-4" src="<?php echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please enter your email</h1>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
          </div>
          <div class="row">
          <div class="col">
              <input type="submit" value="Resend link" class="btn btn-primary btn-block">
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


