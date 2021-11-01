<form action="<?php echo URLROOT; ?>/users/signup" method="post">
          <div class="form-group">
            <label for="firstName">Name: <sup>*</sup></label>
            <input type="text" name="firstName" class="form-control form-control-lg <?php echo (!empty($data['firstNameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstName']; ?>">
            <span class="invalid-feedback"><?php echo $data['firstNameErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="surname">surname: <sup>*</sup></label>
            <input type="email" name="surname" class="form-control form-control-lg <?php echo (!empty($data['surnameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['surname']; ?>">
            <span class="invalid-feedback"><?php echo $data['surnameErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirmPasswordErr']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>
        </form>

        =========================
        <form action="<?php echo URLROOT; ?>/Users/signup" method="post">
        <div class="form-group">
          <label for="firstName">First Name: <sup>*</sup></label>
          <input type="text" name="firstName" class="form-control form-control-lg<?php echo (!empty($data['firstNameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstName']; ?>">
          <span class="invalid-feedback"><?php echo $data['firstNameErr']; ?></span>
        </div>

        <div class="form-group">
          <label for="surname">Surname: <sup>*</sup></label>
          <input type="text" name="surname" class="form-control form-control-lg<?php echo (!empty($data['surnameErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['surname']; ?>">
          <span class="invalid-feedback"><?php echo $data['surnameErr']; ?></span>
        </div>

        <div class="form-group">
         <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-lg<?php echo (!empty($data['emailErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
        </div>

        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg<?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
         </div>

        <div class="form-group">
          <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
          <input type="password" name="confirmPassword" class="form-control form-control-lg<?php echo (!empty($data['confirmPasswordErr'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirmPassword']; ?>">
        <span class="invalid-feedback"><?php echo $data['confirmPasswordErr']; ?></span>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <input type="submit" value="SignUp" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/Users/login" class="btn btn-light btn-block">Have an Account? Login</a>
          </div>
        </div>
      </form>
