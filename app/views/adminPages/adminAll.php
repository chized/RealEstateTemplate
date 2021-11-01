<?php 
  include APPROOT. "/views/templates/header.php"; ?>
<div class="container-fluid">
  <div class="row">
  <!-- <nav id="sidebarMenu" class="col-lg-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-5 px-2">
        
        <div class="list-group">
          <h3>Price</h3>
                    <input type="hidden" id="hidden_minPric e" value="0" />
                    <input type="hidden" id="hidden_maxPrice" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
         </div>
        <ul class="list-group">
          <h4>Categories</h4>
            <?php //foreach($data['filterCat'] as $categories): ?>
              <li class="list-group-item checkbox">
              <label><input type="checkbox" name="category" class="common_selector propertyCheck" value="<?php //echo $categories->filterName; ?>" id="category" > <?php //echo $categories->filterName; ?></label>
              </li>
            <?php //endforeach; ?>

        </ul>

        <ul class="list-group">
          <h4>Types</h4>
              <?php //foreach($data['filterType'] as $types): ?>
                <li class="list-group-item checkbox">
                <label><input type="checkbox" name="types" class="common_selector propertyCheck" value="<?php //echo $types->filterName; ?>" id="types"> <?php //echo $types->filterName; ?></label>
                </li>
            <?php //endforeach; //print_r($data['filterCat']); ?>

        </ul>

      </div>
    </nav> -->
  </div>
  <main role="main" class="col-sm-9 ml-sm-auto px-md-4">
  <!-- <div class="container-xl text-center"> -->
  <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading" id="textChange">Selected filters</h4>
        <form action="<?php echo URLROOT; ?>/Admins/adminAllproperties" method="post">
              <div class="form-row align-items-center">
                <div class="input-group col my-1">
                  <input type="text" class="form-control" name="searchText[keyword]"  placeholder="what are you searching for?">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" formaction="<?php echo URLROOT; ?>/Admins/adminAllProperties" formmethod="post" class="btn btn-primary">Search</button>
                  </div>
                </div>
              
              </div>
            </form>
        </div>
 
    <!-- </div> -->
 
    <!-- <div class="container-xl"> -->
    <!-- Example row of columns -->
    <div class="table-responsive">
        <table class="table table-hover">
         <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item "><a class="page-link" href="<?php echo URLROOT; ?>/Admins/adminAllProperties/?page=<?php echo $data['previous']; ?>">Previous</a></li>
            <?php for ($i=1; $i<=$data['pages']; $i++) : ?>
            <li class="page-item <?php ($i == $data['page'] ? print 'active' : '')?>"><a class="page-link" href="<?php echo URLROOT; ?>/Admins/adminAllProperties/?page=<?php echo $i; ?>">            
            <?php echo $i; ?>
            </a></li>
                <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="<?php echo URLROOT; ?>/Admins/adminAllProperties/?page=<?php echo $data['next']; ?>">Next</a></li>
          </ul>
        </nav>
        <?php flash('uploadSuccess'); ?>
        <?php foreach($data['properties'] as $property): ?>
         <tr>
         <div class="card mb-4 shadow-sm">
                <?php flash('deactivateFailure'); ?>
                <?php flash('deactivateSuccess'); ?>  
              <p class="card-text"><?php echo $property->propertyDesc; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <a type="button" href="<?php echo URLROOT; ?>/Admins/editPropertyRent/<?php echo $property->propertyId; ?>" class="btn btn-outline-primary">Edit</a>
                        <form action="<?php echo URLROOT; ?>/Admins/activateProperty" method="post">
                     <input type="hidden" value="<?php echo $property->propertyId; ?>" name="propertyId">
                        <button type="submit" name="<?php if ($property->isActive == 0) : echo " deactivated" ; else: echo "activated" ;  endif; ?>" formaction="<?php echo URLROOT; ?>/Admins/activateProperty" formmethod="post" class="btn btn-outline-primary"><?php if ($property->isActive == 0) : echo " Deactivated" ; else: echo "Activated" ;  endif; ?></button>
                        </form>
                        
                        <a href="<?php echo URLROOT; ?>/Admins/singleEdit/<?php echo $property->propertyId; ?>" class="btn btn-outline-primary">Add/edit Images</a>
                        <!-- Modal begins -->
                        
                        <!-- Modal ends -->

                </div>
                <i class="fa fa-bed"><?php echo $property->bedrooms; ?></i><i class="fa fa-bath"><?php echo $property->toilets; ?></i><i class="fa fa-money-bill-alt"><?php echo $property->propertyPrice; ?> </i>
              </div>
            </div>
            </div>
         </tr>
         <?php endforeach; ?>
        </table>
    
    <div class="row">
    
        
    </div> <!-- row -->
    </main>
    <hr>

  </div> <!-- /container -->
<?php  include APPROOT. "/views/templates/footer.php"; ?>