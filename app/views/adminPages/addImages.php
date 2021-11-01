<?php 
  include APPROOT. "/views/templates/header.php"; ?>
<?php flash('imageError'); ?>
<form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/Admins/imageUpload" method="post" onSubmit="return validateImage();" >
<input type="file" name="imgFile" id="imgFile" >
<input type="submit" name = "submit" value="Upload" formmethod="post" formaction="<?php echo URLROOT; ?>/Admins/upload">            
</form>

	
 
<!-- <form method="post" action="<?php //echo URLROOT; ?>/Admins/imageUpload" name="f" enctype="multipart/form-data" onSubmit="return validateImage();" >
<input type="file" name="imgFile" id="img_file" />
<input type="submit" class="submit_button" value="Submit" name="s">
</form> -->
    <?php  include APPROOT. "/views/templates/footer.php"; ?>
    

