<?php 
  include APPROOT. "/views/templates/header.php"; ?>
  <div class="container-xl">
    <h1>Admin Page</h1>
    <table class="table table-hover p-4">
      <thead>
        <tr>
          <th scope="col">
            <div>
            <a class="" href="<?php echo URLROOT; ?>/Admins/addProperty"> <i class="fa fa-plus fa-2x my-color2" aria-hidden="true"></i>Add Property</a>
            </div>
          </th>

          <th scope="col">
          <div>
            <a class="" href="<?php echo URLROOT; ?>/Admins/adminAllProperties"> <i class="fa fa-edit fa-2x my-color2" aria-hidden="true"></i>Edit Properties</a>
            </div>
          </th>
          <th scope="col">
          <div>
            <a class="" href="<?php echo URLROOT; ?>/Admins/viewUsers" type="submit"> <i class="fa fa-eye fa-2x my-color2" aria-hidden="true"></i>View Users</a>
            </div>
          </th>
          <th scope="col">
          <div>
            <a class="" href="<?php echo URLROOT; ?>/Admins/editProfile" type="submit"> <i class="fa fa-user fa-2x my-color2" aria-hidden="true"></i>Edit personal profile
            </a>
            </div>
          </th>
        </tr>
       </thead>
      </table>
  </div>
    <?php  include APPROOT. "/views/templates/footer.php"; ?>
    
