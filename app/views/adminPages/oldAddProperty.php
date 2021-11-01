
  <div class="container text-center mt-2">
  <div class="row">
        <div class="card card-body bg-light mt-5">
            <form action="<?php echo URLROOT; ?>/Admins/addPropertyRent" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Add property</h1>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label for=""><strong> Select Property type: </strong></label>
                        <div class="form-check form-check-inline">
                                <input type="radio" name="rep" class="minimal" value="rent" checked>
                                <label class="form-check-label" for="inlineRadio1">Rents and Lease</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="rep" class="minimal" value="sales">
                                <label class="form-check-label" for="inlineRadio2">Lands and Building sales</label>
                            </div>
                                
                            </div>
                        </div>
                </div>
<!--                 <div class="form-group radio-content" data-radio="none" style="display:none">1</div>
                <div class="form-group radio-content" data-radio="daily" style="display:none">11</div> -->
           
                
             <div class="row radio-content" data-radio="rent" style="display:none">
                <div class="col-sm">
                <?php// flash('addPost'); ?>      
                    <div class="form-group">
                        <label for="propertyName">Property Name: <sup>*</sup></label>
                        <input type="text" name="propertyName" class="form-control form-control-lg <?php  echo (!empty($data['postTitleErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                        <span class="invalid-feedback"><?php echo $data['propertyNameErr']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="propertyDesc">Property Description: <sup>*</sup></label>
                        <textarea type="text" name="propertyDesc" Placeholder="House details" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <span class="invalid-feedback"><?php  echo $data['propertyDescErr']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">House type</label>
                        <select class="custom-select" name ="houseType" id="validationCustom04">
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['stateErr']; ?></span> -->
                    </div>
                </div>
            <div class="col-sm">
            <?php// flash('addPost'); ?>      
                        <div class="form-group">
                        <label for="validationCustom04">Power type</label>
                        <select class="custom-select" name ="name" id="validationCustom04">
                            <option selected disabled value="">Choose...</option>
                            <option>PostPaid</option>
                            <option>Prepaid</option>
                            <option>None</option>
                        </select>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['stateErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="postBody"> Water Source(s): <sup>*</sup></label>
                        <textarea type="text" name="locationDesc" Placeholder="Borehole,,well, rain etc" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <!-- <span class="invalid-feedback"><?php  //echo $data['postBodyErr']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Bedrooms</label>
                        <select class="custom-select" name ="bedrooms" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>1</option>
                        </select>
                        <span class="invalid-feedback"><?php  echo $data['bedroomsErr']; ?></span>
                    </div>
                </div>
              <div class="col-sm">
            <?php// flash('addPost'); ?>      
                    <div class="form-group">
                        <label for="propertyTown">Town/Suburb <sup>*</sup></label>
                        <input type="text" name="propertyTown" class="form-control form-control-lg <?php  echo (!empty($data['postTitleErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postTitle']; ?>">
                        <span class="invalid-feedback"><?php echo $data['propertyTownErr']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="locationDesc">Location Description: <sup>*</sup></label>
                        <textarea type="text" name="locationDesc" Placeholder="closest bus stop, landmark etc" class="form-control form-control-lg <?php echo (!empty($data['postBodyErr'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['postBody']; ?>"></textarea>
                        <span class="invalid-feedback"><?php  echo $data['locationDescErr']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="toilets">Bathrooms/Toilets</label>
                        <select class="custom-select" name ="toilets" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>1</option>
                        </select>
                        <span class="invalid-feedback"><?php  echo $data['toiletsErr']; ?></span>
                    </div>                    
                 </div>                 
            </div>  
            <div class="radio-content" data-radio="rent" style="display:none">
            <div class="col">
              <input type="submit" formmethod="post" formaction="<?php echo URLROOT; ?>/Admins/addPropertyRent" value="Add" class="btn btn-primary btn-block">
            </div>
          
          </div>               
         
        <!-- Contents for adding sales begins here -->
             <div class="row radio-content" data-radio="sales" style="display:none">
            <div class="col">
              <input type="submit" formmethod="post" formaction="<?php echo URLROOT; ?>/Admins/addPropertyRent" value="Add" class="btn btn-primary btn-block">
            </div>
          
          </div>
        </form>
      
    </div>
  </div>
</div>
</div> 
