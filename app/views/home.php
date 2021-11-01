<?php include APPROOT. '/views/templates/header.php';?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron fluid jumbotron">
    <div class="container-xl">
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
              </form>
        </div>   
          <!--<nav class="navbar navbar-light" style="background-color: #e3f2fd; margin:2em;">
         
           Navbar content -->
          <!--   <form>
              <div class="form-row align-items-center">
                <div class="col-xs-4 my-1">
                  <label class="sr-only" for="inlineFormInputName">City</label>
                  <input type="text" class="form-control" id="inlineFormInputName" placeholder="Where are you looking?">
                </div>
                <div class="col-xs-4 my-1">
                  <label class="sr-only" for="inlineFormInputGroupUsername">Type</label>
                  <div class="input-group">
                    <!-- <div class="input-group-prepend">
                      <div class="input-group-text">Type</div>
                    </div> --
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
                <!-- <i type="submit" class="fas fa-search"></i> -
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form> 
          </nav>-->
          <nav class="navbar navbar-light" style="background-color: #e3f2fd; margin:2em;">
          <!-- Navbar content -->
          </nav>
    </div>
  </div>
 
  <div class="container-xl">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Lands and Property Sales</h5>
          <p class="card-text">Explore our gallary of lands and properties for sale.</p>
          <a href="#" class="btn btn-primary">Find out more</a>
        </div>
      </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Apartements and office space rent</h5>
            <p class="card-text">Check out our wide range of apartments for rent and office space lease.</p>
            <a href="#" class="btn btn-primary">Find out more</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Property agents and owners</h5>
            <p class="card-text">search what you need from  of licenced property agents and verified owners  .</p>
            <a href="#" class="btn btn-primary">Find out more</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

  <div class="container-xl">
    <!-- Example row of columns -->
    <div class="row">
    <?php $i = 0; ?>
    <?php foreach($data['properties'] as $index => $property): ?>
      <?php if (++$i == 15) break; ?>
      <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <img class="bd-placeholder-img card-img-top" src="<?php echo $property->imageUrl; ?>" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"/>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Pay now</button>
                </div>
                <i class="fa fa-bed"> 4</i><i class="fa fa-bath"> 3</i><i class="fa fa-toilet"> 3 </i>
              </div>
            </div>
          </div>
      </div>
    <?php endforeach; ?>
      <!-- <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="<?php echo URLROOT; ?>/images/vintage.webp" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"/>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Pay now</button>
                </div>
                <i class="fa fa-bed"> 4</i><i class="fa fa-bath"> 3</i><i class="fa fa-toilet"> 3 </i>
              </div>
            </div>
          </div>
      </div> 
      <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <img class="bd-placeholder-img card-img-top" src="<?php echo URLROOT; ?>/images/happy.jpg" width="100%" height="225" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"/>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a type="button" href="<?php echo URLROOT; ?>/Properties/singleProperty" class="btn btn-sm btn-outline-secondary">View</a>
                <a type="button" href="<?php echo URLROOT; ?>/Pages/pay" class="btn btn-sm btn-outline-secondary">Pay now</a>
                  
                </div>
                <i class="fa fa-bed"> 4</i><i class="fa fa-bath"> 3</i><i class="fa fa-toilet"> 3 </i>
              </div>
            </div>
          </div>
      </div> -->
    </div>

    <hr>
        
    <p><a class="btn btn-primary btn-block"  href="<?php echo URLROOT; ?>/Properties/index" style="align:center;">See all ...</a> </p>
  </div> <!-- /container -->

</main>
<?php include APPROOT. '/views/templates/footer.php';?>