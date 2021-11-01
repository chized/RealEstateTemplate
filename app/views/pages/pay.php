
<?php include APPROOT. '/views/templates/header.php';?>
<?php
  print_r($data['sessionItems']);
  //echo $_SESSION['checkout']['propertyName'];
?>
  <?php flash('checkoutInfo'); ?>
  <body class="bg-light">
    <div class="container">
  <div class="py-3 text-center">
    <img class="d-block mx-auto mb-4" src="<?php echo URLROOT; ?>/images/logo.svg" alt="" width="72" height="72">
    <h2>Checkout form</h2>
    <p class="lead">Fill out all the neccesary information to proceed to payment. Every field with asterisk * is required to proceed.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo $data['count']; ?></span>
      </h4>-
      <ul class="list-group mb-3">
      <?php foreach($data['sessionItems'] as $pItems): ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">        
          <div>            
            <h6 class="my-0"><?php echo $pItems['propertyName']; ?></h6>
            <small class="text-muted">Brief description</small>
          </div>

          <span class="text-muted">&#8358;<?php echo $pItems['propertyPrice']; ?></span>
        </li>
      <?php endforeach; ?>    
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">- &#8358;0</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (Naira)</span>
          <strong>&#8358;<?php echo $data['total']  ; ?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address *</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name *</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name *</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email *<span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for any updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>

       <!--  <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div> -->

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country*</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>Nigeria</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State*</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>Bauchi</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
       
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <!--<div class="d-block my-3">
          
        </div> -->
        <input type="hidden" name="amount" value="<?php echo $data['total']  ; ?>">
        <hr class="mb-4">
        <!-- <button type="submit" onclick="payWithPaystack()" class="btn btn-primary btn-lg btn-block"> Pay </button> -->
        <button class="btn btn-primary btn-lg btn-block" type="submit" formaction="<?php echo URLROOT; ?>/CheckoutPay/initpay" >Continue to checkout</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2021 Cushy</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="form-validation.js"></script>

</body>
</html>
