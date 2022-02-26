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
			
				<div class="btn-group">
                <a type="button" href="<?php echo URLROOT; ?>/Properties/singleProperty/<?php echo $property->propertyId; ?>" class="btn btn-sm btn-outline-warning">like</a>
                <input type="submit" name="addToCart" formmethod="post" formaction="<?php echo URLROOT; ?>/CheckoutPay/addToCart/<?php echo $property->propertyId; ?>" class="btn btn-sm btn-outline-success mx-2" value="Proceed to pay" />

                </div>
				
                </div>
          </div>
      </div>
<div class="row">
            <div class="col">
            <h2 class="text-center">Reviews and Ratings</h2>
	
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">15 Minutes Ago</p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

        	       </p>
        	       <div class="clearfix"></div>
				 
        	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset.</p>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p>
        	    </div>
				
				<div class="clearfix"></div>
        	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset.</p>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p>
        	    </div>
			
	        </div>
	        	<div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center">15 Minutes Ago</p>
                    	    </div>
                    	    <div class="col-md-10">
                    	        <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a></p>
                    	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    	        <p>
                    	            <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                    	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                    	       </p>
                    	    </div>
            	        </div>
            	    </div>
	            </div>
	    </div>
	</div>
            </div>
            <div class="col"></div>
        </div>
  </div> 

<?php  include APPROOT. "/views/templates/footer.php"; ?>