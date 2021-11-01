<?php include APPROOT. '/views/templates/header.php';?>
<?php include '../pubkokoro.php'; ?>
<?php
  //print_r($data['sessionItems']);
  //echo $_SESSION['checkout']['propertyName'];
?>

      
      <form id="paymentForm">

<div class="form-group">

<label for="email">Email Address</label>

<input type="email" id="email-address" value="" required />

</div>

<div class="form-group">

<label for="amount">Amount</label>

<input type="tel" id="amount" required />

</div>

<div class="form-group">

<label for="first-name">First Name</label>

<input type="text" id="first-name" />

</div>

<div class="form-group">

<label for="last-name">Last Name</label>

<input type="text" id="last-name" />

</div>

<div class="form-submit">

<button type="submit" onclick="payWithPaystack()"> Pay </button>

</div>

</form>
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

<script src="https://js.paystack.co/v1/inline.js"></script> 
<script type="text/javascript">
    

    var my_var = <?php echo json_encode($kk); ?>;
</script>

<script type="text/javascript" >
        const paymentForm = document.getElementById('paymentForm');

      paymentForm.addEventListener("submit", payWithPaystack, false);
      
      function payWithPaystack(e) {

        e.preventDefault();

        let handler = PaystackPop.setup({

          key: my_var, // Replace with your public key

          email: document.getElementById("email-address").value,

          amount: document.getElementById("amount").value * 100,

          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

          // label: "Optional string that replaces customer email"

          onClose: function(){

            alert('Window closed.');

          },

          callback: function(response){

            let message = 'Payment complete! Reference: ' + response.reference;

            alert(message);

          }

        });

        handler.openIframe();

      }
</script>
      
</body>
</html>
