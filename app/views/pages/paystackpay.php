<?php include APPROOT. '/views/templates/header.php';?>
<?php include '../pubkokoro.php'; ?>
<?php
  print_r($_POST);
  //echo $_SESSION['checkout']['propertyName'];
?>

      
<?php 
  include APPROOT. '/views/templates/header.php';
?>
  <?php flash('checkoutInfo'); ?>
  <body class="bg-light">

  <div class="row">
    <div class="col-md-6 order-md-2 mb-4 mt-5">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Make Payment</span>
      </h4>
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

      <input type="hidden" name="amount" value="<?php echo $data['total']  ; ?>">
      <input type="hidden" name="email" value="<?php echo $data['email'];?>">
      <input type="hidden" name="user_id" value="<?php echo $data['user_id'];?>">

      <button class="btn btn-primary btn-lg btn-block" type="submit" formaction="<?php echo URLROOT; ?>/CheckoutPay/paystackpay" formmethod='POST' >Pay</button>

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
