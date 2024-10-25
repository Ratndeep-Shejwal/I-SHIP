<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_vehicle WHERE vehicle_vin=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>
<?php
    if(isset($_POST['form1'])) {
        $valid=1;
        // Check if Field is Empty
        if (empty($_POST['cust_name'])) {
            $valid = 0;
            $error_message .= "Please select a Customer<br>";
        }
    
        if (empty($_POST['vin'])) {
            $valid = 0;
            $error_message .= "Please enter the VIN of the Car<br>";
        }
    
        if(empty($_POST['model'])){
            $valid=0;
            $error_message .= "Please Load Model from VIN<br>";
        }
    
        if(empty($_POST['year'])){
            $valid=0;
            $error_message .= "Please Load Year from VIN<br>";
        }
    
        if(empty($_POST['brand'])){
            $valid=0;
            $error_message .= "Please Load Brand from VIN<br>";
        }
    
        if (empty($_POST['received-date'])) {
            $valid = 0;
            $error_message .= "Received Date cannot be empty<br>";
        }
    
        if (empty($_POST['title-date'])) {
            $valid = 0;
            $error_message .= "Title Date cannot be empty<br>";
        }
        if (empty($_POST['vehicle-location'])) {
            $valid = 0;
            $error_message .= "Location cannot be empty<br>";
        }

		if ($valid == 1) {
			// Update Statement
			$statement = $pdo->prepare("UPDATE tbl_vehicle SET 
			vehicle_received=?,
			vehicle_title_received=?,
			vehicle_location=?,
			vehicle_title=?,
			vehicle_key=?
			WHERE tbl_vehicle.vehicle_vin=? ;");

			$statement->execute(array(
			$_POST['received-date'],
			$_POST['title-date'],
			$_POST['vehicle-location'],
			$_POST['title-check'],
			$_POST['vehicle-key'],
			$_REQUEST['id']
			));

			$success_message = 'Product is updated successfully.';
		}else {
			$error_message .= " Unable to Update the vehicle";
		}
        
    }
    

?>


<?php
// Fetch the data from the database for VIN
$statement = $pdo->prepare("SELECT * FROM tbl_vehicle WHERE vehicle_vin=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $vehicle_title = $row['vehicle_title'];
    $vehicle_key = $row['vehicle_key'];
    $vehicle_location = $row['vehicle_location'];
    $vehicle_received_date = $row['vehicle_received'];
    $vehicle_title_received = $row['vehicle_title_received'];
    $status = $row['vehicle_status'];
}
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Vehicle</h1>
	</div>
	<div class="content-header-right">
		<a href="vehicle.php" class="btn btn-primary btn-sm">Back</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if ($error_message): ?>
				<div class="callout callout-danger">

					<p>
						<?php echo $error_message; ?>
					</p>
				</div>
			<?php endif; ?>

			<?php if ($success_message): ?>
				<div class="callout callout-success">

					<p><?php echo $success_message; ?></p>
				</div>
			<?php endif; ?>



			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <?php
                    // Fetch the data from the database for VIN
                    $statement = $pdo->prepare("SELECT * FROM tbl_vehicle WHERE vehicle_vin=?");
                    $statement->execute(array($_REQUEST['id']));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($result as $row) {

                        $vehicle_title = $row['vehicle_title'];
                        $vehicle_key = $row['vehicle_key'];
                        $status = $row['vehicle_status'];
                    
                ?>

				<div class="box box-info">
					<div class="box-body">
						<!-- For Client -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Select Client <span>*</span></label>
							<div class="col-sm-4">
								<select name="cust_name" class="form-control select2 top-cat">
									<option selected="selected" value="<?php echo $row['cust_user']; ?>"><?php echo $row['cust_user']; ?></option>
								</select>
							</div>
						</div>

						<!-- VIN -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">VIN<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="vin" class="form-control" id="vin-vehicle" value="<?php echo $_REQUEST['id']; ?>" readonly="true">
							</div>
							<!-- <div class="col-sm-2">
								<input type="button" id="vin-btn" value="LOAD"  style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning">
							</div> -->
						</div>
						<!-- Brand -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Brand <span>*</span> </label>
							<div class="col-sm-4">
								<input type="label" name="brand" id="car-brand" class="form-control" value="<?php echo $row['vehicle_brand']; ?>" readonly="true">
							</div>
						</div>
						<!-- Year -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Year <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="year" id="car-year" class="form-control" value="<?php echo $row['vehicle_year']; ?>" readonly="true">
							</div>
						</div>
						<!-- Model -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Model <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="model" id="car-model" class="form-control" value="<?php echo $row['vehicle_model']; ?>" readonly="true">
							</div>
						</div>
						<!-- Vehicle Received -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Vehicle Received <span>*</span></label>
							<div class="col-sm-4">
								<input type="date" class="form-control" name="received-date" value="<?php echo $row['vehicle_received']; ?>">
							</div>
						</div>
						<!-- Title Received -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title Received <span>*</span></label>
							<div class="col-sm-4">
								<input type="date" class="form-control" name="title-date" value="<?php echo $row['vehicle_title_received']; ?>">
							</div>
						</div>

						<!-- Location -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Select Location <span>*</span></label>
							<div class="col-sm-4">
								<select name="vehicle-location" class="form-control select2 top-cat">
									<option value="India" <?php if($row['vehicle_location'] == 'India'){echo 'selected';} ?> >India</option>
									<option value="USA" <?php if($row['vehicle_location'] == 'USA'){echo 'selected';} ?> >USA</option>
									
								</select>
							</div>
						</div>


						<!-- Title -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title ?</label>
							<div class="col-sm-8">
								<select name="title-check" class="form-control" style="width:auto;">
									<option <?php echo check_selected_status(0,$row["vehicle_title"]); ?> value="0">No</option>
									<option <?php echo check_selected_status(1,$row["vehicle_title"]); ?> value="1">Yes</option>
								</select>
							</div>
						</div>
						<!-- Vehicle Key -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Vehicle Key?</label>
							<div class="col-sm-8">
								<select name="vehicle-key" class="form-control" style="width:auto;">
									<option <?php echo check_selected_status(0,$row["vehicle_key"]); ?> value="0">No</option>
									<option <?php echo check_selected_status(1,$row["vehicle_key"]); ?> value="1">Yes</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
							</div>
						</div>


					</div>
				</div>
                <?php
                    }
                ?>
			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>