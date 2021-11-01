<?php 
  include APPROOT. "/views/templates/header.php"; ?>
<div class="container">
        <div class="row">
          <div class="col-lg-12">
          <div class="tab-content" id="myTabContent">
            <form id="login-form" class="tab-pane  show active" role="tabpanel" aria-labelledby="login-tab" action="#" method="post" role="form" >
            <div class="card card-body bg-light mt-5">
                <h1 class="h3 mb-3 font-weight-normal">Add property</h1>      
                
                   
                    <div class="form-group">
                        <label for="propertyName">Property Name: <sup>*</sup></label>
                        <input type="text" name="propertyName" class="form-control form-control-lg <?php  echo (!empty($data['postTitleErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                        <!-- <span class="invalid-feedback"><?php //echo $data['propertyNameErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="propertyDesc">Property Description: <sup>*</sup></label>
                        <textarea type="text" name="propertyDesc" Placeholder="Property details" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <!-- <span class="invalid-feedback"><?php //echo $data['propertyDescErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Property type</label>
                        <select class="custom-select" name ="propertyType" id="validationCustom04">
                            <option selected disabled value="">Choose...</option>
                            <option value ="face to face" >Face to face</option>
                            <option Value ="Self Con" >Self Con</option>
                            <option value="Flat">Flat</option>
                            <option value ="land">Land</option>
                            <option value = "building">Building</option>
                            <option value = "shop">Shop</option>
                        </select>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['stateErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                            <label for="propertyPrice">Property price: <sup>*</sup></label>
                            <textarea type="text" name="propertyPrice" Placeholder="e.g 200,000" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                            <!-- <span class="invalid-feedback"><?php  //echo $data['propertySizeErr']; ?></span> -->
                            </div>
                            <div class="form-group">
                        <label for="propertyTown">Town/Suburb <sup>*</sup></label>
                        <input type="text" name="propertyTown" class="form-control form-control-lg <?php  echo (!empty($data['postTitleErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                        <!-- <span class="invalid-feedback"><?php //echo $data['propertyTownErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="locationDesc">Location Description: <sup>*</sup></label>
                        <textarea type="text" name="locationDesc" Placeholder="closest bus stop, landmark etc" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['locationDescErr']; ?></span> -->
                    </div>
                            <div id="">
                            <div class="alert alert-info" role="alert">
                                You must select a category to add a property
                            </div>
                        </div>
                <div class="form-group">
                            <label for="propertyCategory">Category</label>
                            <select class="custom-select" id="propertyCategory" name ="propertyCategory" value="<?php //echo $data['imageRank']; ?>">
                            <option selected disabled value="">Choose...</option>
                                <option value="rent">Rent</option>
                                <option value="sale">Sale </option>  
                            </select>
                            <!-- <span class="invalid-feedback"><?php  //echo $data['bedroomsErr']; ?></span> -->
                    </div>
                            <div id="rent" class="categories" style="display:none;">
                    <div class="form-group">
                        <label for="amenities"> Amenities(s): <sup>*</sup></label>
                          <div class="table-responsive-sm">
                          <table id="amenities" class="table table-sm">
                                <tr>
                                    <td scope="row"><input type='checkbox' value='Borehole' class="amenities"></td>
                                    <td >Borehole </td>
                                    <td> <input type='checkbox' value='Well' class="amenities"> </td>
                                    <td> Well </td>
                                </tr>
                                <tr>
                                    <td scope="row"><input type='checkbox' value='Prepaid meter' class="amenities"></td>
                                    <td>Prepaid meter </td>
                                    <td> <input type='checkbox' value='Postpaid meter' class="amenities"> </td>
                                    <td> PostPaid meter </td>
                                </tr>
                                <tr>
                                    <td scope="row"><input type='checkbox' value='Parking space' class="amenities"></td>
                                    <td> Parking Space </td>
                                    <td> <input type='checkbox' value='Kitchen Pantry' class="amenities"> </td>
                                    <td> Kitchen Pantry </td>
                                </tr>
                                <tr>
                                    <td scope="row"><input type='checkbox' value='Store' class="amenities"></td>
                                    <td >Store </td>
                                    <td> <input type='checkbox' value='study' class="amenities"> </td>
                                    <td> study </td>
                                </tr>
                            </table>
                          </div>
                        <textarea id="txtValue" type="text" name="amenities" Placeholder="Borehole,well, rain etc" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['postBodyErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Bedrooms</label>
                        <input type="number" name="bedrooms" placeholder="No of Bedrooms" class="form-control form-control-lg <?php  echo (!empty($data['bedroomsErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                        <!-- <span class="invalid-feedback"><?php //echo $data['bedroomsErr']; ?></span> -->
                    </div>
                    
                        <div class="form-group">
                            <label for="toilets">Bathrooms/Toilets</label>
                            <input type="number" name="toilets" placeholder="No of Toilets/Bathrooms" class="form-control form-control-lg <?php  echo (!empty($data['toiletsErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                            <!-- <span class="invalid-feedback"><?php //echo $data['toiletsErr']; ?></span> -->
                        </div> 
                        </div>
                        <!-- The div begins the form for adding property for sale -->
                        <div id="sale" class="categories" style="display:none">
                     
                           <!--  <div class="form-group">
                            <label for="validationCustom04">Property type</label>
                            <select class="custom-select" name ="propertyType" id="validationCustom04">
                                <option selected disabled value="">Choose...</option>
                                <option value ="land">Land</option>
                                <option value = "building">Building</option>
                                <option value = "shop">Shop</option>
                            </select> -->
                            <!-- <span class="invalid-feedback"><?php  //echo $data['stateErr']; ?></span> 
                            </div>-->
                            <div class="form-group">
                            <label for="propertySize">Property Size: <sup>*</sup></label>
                            <textarea type="text" name="propertySize" Placeholder="e.g 4plots, 100 by 200" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php  echo $data['propertySizeErr']; ?>"></textarea>
                            <!-- <span class="invalid-feedback"><?php  //echo $data['propertySizeErr']; ?></span> -->
                            </div>                         
                        </div>
                      
                      <div class="form-group">
                        <div class="row">
                        <div class="col-sm-12 col-sm-offset-3">
                        <input type="submit" formmethod="post" formaction="<?php echo URLROOT; ?>/Admins/addPropertyRent" value="Add" tabindex="4" class="btn btn-primary btn-block">

                        </div>
                        </div>
                    </div>                 
                    
                </div>

     
        
       
            </form>
         
            </div> <!-- /tab-content -->
          </div>
        </div>
      </div>
<?php  include APPROOT. "/views/templates/footer.php"; ?>
    