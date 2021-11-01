<?php
require_once (__DIR__.'/lib/config.php');

$process_name="add";
$commandsData=array();
if(!empty($_GET['id'])){
	$process_name="update";
	$db->where (['id', trim($_GET['id'])]);
	$db->select ('client_details');
	$commandsData=$db->fetch();
	
}
if(!empty($_GET['del_id']) && is_numeric($_GET['del_id'])){
	$db->where(['id', trim($_GET['del_id'])]);
	$db->delete('client_details');
	if($db->execute()) {
		$response['result']  = '';
		$response['error_code']  = 0;
		$response['status']  = "success";
		$response['message']  = 'client_details  was  delete successfully ';
		$_SESSION['message']  = $response['message'];
		$_SESSION['status']  = "success";
		
	}
}

if(!empty($_POST['process_name']) && $_POST['process_name']=='add'){
	unset($_POST['process_name']);
	unset($_POST['id']);
	$db->insert('client_details', array_values($_POST),  implode(',',array_keys($_POST)));
	if ($db->execute()){
		$_SESSION['message']  = 'client_details  added  successfully ';
		$_SESSION['status']  = "success";
		header("Location:client.php");
	}else{
		$response['result']  = '';
		$response['error_code']  = 1;
		$response['status']  = "error";
		//$response['status']  = "success";
		$response['message'] = 'Insert failed: ' . $db->error_info();
		$_SESSION['message']  = 'Insert failed';
		$_SESSION['status']  = "error";
	}
}

if(!empty($_POST['process_name']) && $_POST['process_name']=='update'){
	unset($_POST['process_name']);
	
	$db->where('id="'.$_POST['id'].'"');
	//unset($_POST['id']);
	$db->update ('client_details', $_POST);
	$db->execute();
	$response['error_code']  = 0;
	$response['status']  = "success";
	$response['message']  = 'client_details  # '.$_POST['id'].'   records were updated successfully';
	$_SESSION['message'] =$response['message'];
	$_SESSION['status']  = "success";
	header("Location:client.php");
	
}
require_once (INC_PATH.DS.'header.php');
require_once (INC_PATH.DS.'left.php');


?>
<?php


$otherCluase=  array(
	//'order_by'=>'id desc'
	//,'limit'=>5
);
$db->select(
	'commands'
	,'*'
	,$otherCluase
); 
$commandsList = $db->fetch();
//pr($commandsList);die;


?>

<div class="app-content content">
        <div class="content-wrapper">
		
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row mb-2 align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <h4 class="main-title">Add/update Client </h4>


                            </div>
                            <div class="col-xl-3 col-md-4 offset-xl-3 offset-md-2">
                                <a href="client.php" class="btn btn-success font-weight-bold d-flex float-right""><i class="ft-plus-square"></i>Client details List</a>
                            </div>
                        </div>
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body">
							 <form  class="" method="post">
							<input type="hidden" name="process_name" value="<?=$process_name?>">
							<input type="hidden" name="id" value="<?=!empty($commandsData[0]['id']) ? $commandsData[0]['id'] : ""?>">
							  <div class="form-group row">
								<label for="staticEmail" class="col-sm-2 col-form-label">Client id</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="client_id" value="<?=!empty($commandsData[0]['client_id']) ? $commandsData[0]['client_id'] : ""?>" placeholder="Name " required >
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Client name</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="client_name" placeholder="Client name" value="<?=!empty($commandsData[0]['client_name']) ? $commandsData[0]['client_name'] : ""?>"  >
								</div>
							  </div>
							   <div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Agreement Type</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="agreement_type" placeholder="Agreement Type" value="<?=isset($commandsData[0]['agreement_type']) ? $commandsData[0]['agreement_type'] : ""?>"  >
								</div>
							  </div>
							   <div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Auto exe queue	</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="auto_exe_queue" placeholder="Auto exe queue" value="<?=isset($commandsData[0]['auto_exe_queue']) ? $commandsData[0]['auto_exe_queue'] : ""?>"  >
								</div>
							  </div>
							  
							  <div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Emergency stop	</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" name="emergency_stop" placeholder="Auto exe queue" value="<?=isset($commandsData[0]['emergency_stop']) ? $commandsData[0]['emergency_stop'] : ""?>"  >
								</div>
							  </div>
							  
							<button type="submit"  class="btn btn-success font-weight-bold d-flex"><i class="ft-plus-square"></i>Save Data</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
<?php
//require_once (INC_PATH.DS.'top_modal.php');
require_once (INC_PATH.DS.'footer.php');
?>
<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script>
        $('.zero-configuration').DataTable();

    </script>