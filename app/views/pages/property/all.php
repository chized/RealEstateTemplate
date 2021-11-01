<?php 
  include APPROOT. "/views/templates/header.php"; ?>
  <div class="container-fluid">
   <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>
    
 
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> 
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">Search</h4>
          <form>
              <div class="form-row align-items-center">
                <div class="input-group col my-1">                  
                  <input type="text" class="form-control" name="searchText" placeholder="what are you searching for?">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" formaction="<?php echo URLROOT; ?>/Admins/filCheck" formmethod="post" class="btn btn-primary">Search</button>
                  </div>
                </div>
              
              </div>
            <!--   <div class="form-row align-items-center">
                <div class="col-xs-4 my-1">
                  <label class="sr-only" for="inlineFormInputName">City</label>
                  <input type="text" class="form-control" id="inlineFormInputName" placeholder="Where are you looking?">
                </div>
                <div class="col-xs-4 my-1">
                  <label class="sr-only" for="inlineFormInputGroupUsername">Type</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Type</div>
                    </div> 
                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Type</option>
                        <option value="1">Self-Contained</option>
                        <option value="2">Flat</option>
                        <option value="3">Shared</option>
                      </select>
                  </div>
                </div>

                <div class="col-xs-1 my-1">
                <div class="input-group">
                      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Rooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                      </select>
                  </div>
                </div>

                <div class="col-xs-1 my-1">
                  <label class="sr-only" for="inlineFormInputName">min price</label>
                  <input type="text" class="form-control" id="inlineFormInputName" placeholder="Min price">
                </div>
                <div class="col-xs-2 my-1">
                  <span> - </span>
                  
                </div>
               
                <div class="col-xs-1  my-1">
                  <label class="sr-only" for="inlineFormInputName">Max price</label>
                  <input type="text" class="form-control" id="inlineFormInputName" placeholder="Max Price">

                </div>
               
                <div class="col-auto my-1">
                <!-- <i type="submit" class="fas fa-search"></i> 
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div> -->
            </form>
        </div>
    <!-- Example row of columns -->
    <?php 
      function pre_r($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
      }

    ?>
    <div class="row">
    <?php //pre_r($data['properties']); ?>
    <?php foreach($data['properties'] as $index => $property): ?>
      <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
      <form method="post" action="<?php echo URLROOT; ?>/CheckoutPay/addToCart/<?php echo $property->propertyId; ?>">
        <img class="bd-placeholder-img card-img-top p-2" src="<?php if(isset($property->imageUrl)): echo $property->imageUrl; 
        else: echo URLROOT. "/images/houseAvatar1.jpg"; endif; ?>"  alt="" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"/>
            <div class="card-body">
              <p class="card-text"><?php echo $property->propertyCode.' : '.$property->propertyName; ?></p>
              <p class="card-text text-danger font-weight-bolder">&#8358;<?php echo $property->propertyPrice ; ?></p>
              <input type="hidden" name="propertyName" value="<?php echo $property->propertyName; ?>;" />
              <input type="hidden" name="propertyPrice" value="<?php echo $property->propertyPrice; ?>;",>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a type="button" href="<?php echo URLROOT; ?>/Properties/singleProperty/<?php echo $property->propertyId; ?>" class="btn btn-sm btn-outline-warning">View</a>
                <input type="submit" name="addToCart" formmethod="post" formaction="<?php echo URLROOT; ?>/CheckoutPay/addToCart/<?php echo $property->propertyId; ?>" class="btn btn-sm btn-outline-success mx-2" value="Proceed to pay" />

                </div>
                <i class="fa fa-bed"> 4</i><i class="fa fa-bath"> 3</i><i class="fa fa-toilet"> 3 </i>
              </div>
            </div>
            </form>
          </div>
      </div>
      <?php endforeach; 
        //print_r($data ['properties']);
      ?>
 
    </div> <!-- row -->

    <hr>
    </main>
</div> <!-- /container -->
<?php  include APPROOT. "/views/templates/footer.php"; ?>