<?php 
  include APPROOT. "/views/templates/header.php"; ?>
  
  <div class="container-xl">
      <div class="row">
          <div class="col">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>               
                <div class="carousel-inner"> 
                <?php foreach ($data['image'] as $index => $img): ?>                      
                    <div class="carousel-item <?php if ($index == 0) echo "active"; ?>">                    
                    <img src="<?php if(isset($img->imageUrl)): echo $img->imageUrl; 
                    else : echo URLROOT. "/images/houseAvatar1.jpg"; endif; ?>" class="d-block w-100" alt="ima">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $img->imageName; ?></h5>
                        <p>Nul </p>
                    </div>
                    </div>
                    <?php endforeach; //print_r($data['image'])//echo $img->imageUrl; ;?>                 
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
          </div>
          <?php //print_r($data['image']); ?>
          <div class="col">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['property']->propertyName; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> </h6>
					<strong>Property Code: <?php echo $data['property']->propertyCode; ?></strong>
                    <p class="card-text">More description and details will be added here, this will include rooms, garage
                        water. power, every sing details of the house and possibly what the rules od the house is..</p>
                        <small> <i class="fa fa-bed"><?php echo $data['property']->bedrooms; ?> </i>
                        <i class="fa fa-bath"> <?php echo $data['property']->toilets; ?> </i>
                        <i class="fa fa-toilet"> <?php echo $data['property']->toilets; ?> </i>
                        
                    </small>
                    
                </div>
			
               	<div class="alert">
                    <a type="button" href="<?php echo URLROOT; ?>/Properties/singleProperty"  class="btn btn-primary" >Delete</a>
                    <a type="button" href="<?php echo URLROOT; ?>/Pages/pay"  class="btn btn-primary">Edit</a>
                </div>
				
                </div>
          </div>
      </div>
        <div class="row p-3 m-3">
            <div class="col">
                <div class="container-xl">
                    <h3>Add Images</h3>
                    <table class="table table-hover p-4">
                        <div class="alert alert-warning" role="alert">
                        Only four images is allowed for each property, choose the best!
                        </div>
                    <thead>
                        <tr>

                        <th scope="col">
                            <div>
                            <?php flash('imageError'); ?>
                            <form action="<?php echo URLROOT; ?>/Admins/imageUpload/<?php echo $data['property']->propertyId; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <label for="imageRank">Image rank</label>
                            <select class="custom-select" name ="imageRank" value="<?php //echo $data['imageRank']; ?>">
                            <option selected disabled value="">Choose...</option>
                                <option value="1">First/main image</option>
                                <option value="2">Second image</option>
                                <option value="3">Third image</option>
                                <option value="4">Fourth image</option>
                            </select>
                            <!-- <span class="invalid-feedback"><?php  //echo $data['bedroomsErr']; ?></span> -->
                    </div>
                             <!-- <input type="hidden" name="imageRank" value="mainImage" id="imgRank"> -->
                             <div class="form-group">
                            <label for="imageDesc">Image description <sup>*</sup></label>
                            <input type="text" name="imageDesc" class="form-control form-control-lg <?php  //echo (!empty($data['imageDescErr'])) ? 'is-invalid' : ''; ?>" value="<?php //echo $data['imageDesc']; ?>">
                            <span class="invalid-feedback"><?php //echo $data['imageDescErr']; ?></span>
                    </div>
                            <input type="hidden" name="propertyId" value="<?php echo $data['property']->propertyId; ?>"> 
                    
                            <input type="File" name="picFile">
                            <input type="submit" value="Upload" formaction="<?php echo URLROOT; ?>/Admins/imageUpload/<?php echo $data['property']->propertyId; ?>" formmethod="post" formenctype="multipart/form-data">            
                            </form>

                            </div>
                        </th>
                        </tr>
                        <tr>
                        <th scope="col">
                        <div>
                        <!-- <?php //flash('imageError'); ?>
                        <?php //flash('uploadSuccess'); ?>
                            <form enctype="multipart/form-data" action="<?php //echo URLROOT; ?>/Admins/imageUpload" method="post" onSubmit="return validateImage();" >
                            <input type="hidden" name="imageRank" value="mainImage" id="imgRank">
                            <input type="hidden" name="propertyId" value="<?php //echo $property->propertyId; ?>">
                            <input type="file" name="imgFile" id="imgFile" >
                            <input type="submit" name = "submit" value="Upload">            
                            </form>
 -->
                        </div>
                        </th>
                        </tr>
                    </thead>
                    </table>
                </div>
                  
                    

	    </div>
            </div> 
            <div class="col"></div>
        </div>
  </div>
<?php  include APPROOT. "/views/templates/footer.php"; ?>