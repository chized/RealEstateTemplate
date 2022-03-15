<?php 
  include APPROOT. "/views/templates/header.php";   
    $property = $data['property'];
    $props_reviews = $data['props_reviews'];
    $user_review = $data['user_review'];
    $rate_msg = $data['rate_msg'];
  ?>
  
  <div class="container-xl">
      <div class="row">
        <div class="col-md-12">
          <?php echo $rate_msg; ?>
        </div>
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
                <?php 
                  if (!$user_review) {
                    echo '<a type="button" href="#" class="btn btn-sm btn-outline-warning" data-target="#add_rating_modal_form" data-toggle="modal">Rate</a>';
                  }
                ?>

                <input type="hidden" name="current_url" id="current_url" value='<?php echo URLROOT."/Properties/singleProperty/$property->propertyId"; ?>'>

                <input type="submit" name="addToCart" formmethod="post" formaction="<?php echo URLROOT; ?>/CheckoutPay/addToCart/<?php echo $property->propertyId; ?>" class="btn btn-sm btn-outline-success mx-2" value="Proceed to pay" />

                </div>
                
                </div>
          </div>
      </div>
    <div class="row">
        <div class="col-md-12">
        
            <div class="card mb-5 mt-5">
                <div class="card-body">
                    <div class="row">
                      <h2 class="col-md-12 text-center mb-2">Reviews and Ratings</h2>
                        <!-- <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">15 Minutes Ago</p>
                        </div> -->
                        <?php 
                            if ($props_reviews) {
                                //looping through reviews
                               foreach ($props_reviews as $p_review) {
                                    $full_name = '';
                                    $rating = '';
                                    $msg = '';
                                    $stars = '';
                                    $rating = $p_review->rating;
                                    $msg = $p_review->msg;
                                    $firstName = $p_review->firstName;
                                    $surname = $p_review->surname;
                                    $full_name = "$firstName $surname";

                                    for ($i = 1; $i <= $rating ; $i++) { 
                                        $stars .= '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                                        
                                    }
                                    echo '<div class="card-body col-md-12 mt-2 mb-2 border">
                                        <p>
                                            <a class="float-left" href="#"><strong>'.$full_name.'</strong></a>
                                            '.$stars.'
                                       </p>
                                       <div class="clearfix"></div>
                                     
                                        <p>'.$msg.'</p>
                                        
                                    </div>';
                               }
                            }

                         ?>
                        <!-- <div class="col-md-12 mt-2 mb-2">
                            <p>
                                <a class="float-left" href="#"><strong>Full Name</strong></a>
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
                        </div> -->                  
                    
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div> 


    <div class="modal fade" id="add_rating_modal_form" tabindex="-1" role="dialog" aria-labelledby="add_rating_modal_form" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content p-md-3">
            <div class="modal-header">
              <h4 class="modal-title">Add Review</h4>
              <button class="close text-danger" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              
                <div class="row">

                  <div class="form-group col-md-12 text-center bg-info p-2">
                    <li class="main-star fa fa-star fa-3x" data-id="0"></li>
                    <li class="main-star fa fa-star fa-3x" data-id="1"></li>
                    <li class="main-star fa fa-star fa-3x" data-id="2"></li>
                    <li class="main-star fa fa-star fa-3x" data-id="3"></li>
                    <li class="main-star fa fa-star fa-3x" data-id="4"></li>
                  </div>

                  <input type="hidden" name="user_rating" id="user_rating" value="1"  readonly>

                  <div class="form-group col-md-12">
                    <label class="font-weight-bold text-small" for="comment">Comment</label> 
                    <textarea class="form-control" id="comment" name="comment" type="text" value="" placeholder="Enter Comment" required maxlength="1000"></textarea>
                  </div>
                  

                  <div class="form-group col-md-12 text-center">
                    <button class="btn btn-success" name="add_rate_btn" type="submit" formmethod="post" formaction="<?php echo URLROOT."/Properties/singleProperty/$property->propertyId"; ?>">Save Review</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

<?php  include APPROOT. "/views/templates/footer.php"; ?>