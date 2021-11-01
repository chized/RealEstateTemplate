<?php include APPROOT. "/views/templates/header.php"; ?>

    <?php  $data['email']; '<br>';
            $data['validityCode']; '<br>';
            $data['activationHash'];
    ?>
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading"></h4>
      <p><?php flash('ActivationSuccess'); ?>.</p>
      <p><?php flash('activationFailure'); ?>.</p>
      <hr>
      <a href="<?php echo URLROOT; ?>/Users/login" class="btn btn-info">Click here to login</a>
    </div>
    <?php include APPROOT. "/views/templates/footer.php"; ?>
    </div>
    
  </div>
</div>


