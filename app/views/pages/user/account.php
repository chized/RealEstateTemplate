<?php 
  include(APPROOT. '/views/templates/header.php'); ?>

    <div class="container-lg">
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div class="row">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>

        </div>
        <div class="col-6 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo URLROOT; ?>/images/user/useravatar2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Cras justo odio
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                </ul>
            </div>

        </div>
    </div>

    <?php 
  include("../app/views/templates/footer.php"); ?>