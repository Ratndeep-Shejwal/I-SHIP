<?php require_once('header.php'); ?>
<?php
$valid = 1;
$error_message ="";

function checkImageUpload($fileuploadID,$uploadFileType)
{
	global $valid;
	$valid = 1;
	global $error_message;
	$is_post_request = strtolower($_SERVER['REQUEST_METHOD']) === 'post';
	$has_files = isset($_FILES[$fileuploadID]);

	if (!$is_post_request || !$has_files) {
		$valid = 0;
		$error_message .= "Invalid file upload operation<br>";
	}

	$files = $_FILES[$fileuploadID];
	
	$file_count = count($files['name']);
	echo "<br>";

	for ($i = 0; $i < $file_count; $i++) {
		// No files uploaded
		if (empty($files['name'][$i])) {
			$filedir = UPLOAD_DIR . DIRECTORY_SEPARATOR . $_POST['vin'] . DIRECTORY_SEPARATOR . $uploadFileType;
			if (!file_exists($filedir)) {
				mkdir($filedir, 0777, true);
			}
			return;
		}

		// get the uploaded file info
		$status = $files['error'][$i];
		$filename = $files['name'][$i];
		$tmp = $files['tmp_name'][$i];

		// No file is selected to be uploaded
		if ($status !== UPLOAD_ERR_OK) { 
			$valid = 0;
			continue;
		}

		// validate the file size
		 $filesize = filesize($tmp);

		if ($filesize > MAX_SIZE) {
			// construct an error message
			 $message = sprintf(
				"The file %s is %s which is greater than the allowed size %s",
				$filename,
				format_filesize($filesize),
				format_filesize(MAX_SIZE)
			);

			echo $error_message .= $message . "<br>";
			$valid = 0;
			continue;
		}

		// validate the file type
		if (!in_array(get_mime_type($tmp), array_keys(ALLOWED_FILES))) {
			$error_message .= "The file $filename is not allowed to upload" . "<br>";
			$valid = 0;
		}
	}
	if ($valid == 1) {

		for ($i = 0; $i < $file_count; $i++) {
			$filename = $files['name'][$i];
			$tmp = $files['tmp_name'][$i];
			$mime_type = get_mime_type($tmp);

			// set the filename as the basename + extension
			$uploaded_file = pathinfo($filename, PATHINFO_FILENAME) . '.' . ALLOWED_FILES[$mime_type];
			// new filepath
			$filedir = UPLOAD_DIR . DIRECTORY_SEPARATOR . $_POST['vin'] . DIRECTORY_SEPARATOR . $uploadFileType;
			if (!file_exists($filedir)) {
				mkdir($filedir, 0777, true);
			}
			$filepath = $filedir . DIRECTORY_SEPARATOR . $uploaded_file;

			// move the file to the upload dir
			$success = move_uploaded_file($tmp, $filepath);
			if (!$success) {
				$error_message .= "The file $filename was failed to move." . "<br>";
				$valid = 0;
			}
		}
	}
}

if (isset($_POST['form1'])) {
	$valid = 1;

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
	if (empty($_POST['vehicle_location'])) {
		$valid = 0;
		$error_message .= "Location cannot be empty<br>";
	}

	$vinfolder = UPLOAD_DIR . DIRECTORY_SEPARATOR . $_POST['vin'];
	if (file_exists($vinfolder) ) {
		$valid = 0;
		$error_message .= "The VIN you are trying to add is already in the system<br>";
	}

	// Image File Validation	
	
	


	 if ($valid == 1) {
		checkImageUpload('photos-files', "photos");
		checkImageUpload('carfax-files', "carfax");
		checkImageUpload('videos-files', "video");
		//Saving data into the main table tbl_product
		try{
		$statement = $pdo->prepare("INSERT INTO tbl_vehicle(
										cust_user,
										vehicle_vin,
										vehicle_title,
										vehicle_key,
										vehicle_year,
										vehicle_brand,
										vehicle_model,
										vehicle_location,
										vehicle_received,
										vehicle_title_received
									) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$statement->execute(array(
				$_POST['cust_name'],
				$_POST['vin'],
				$_POST['title-check'],
				$_POST['vehicle-key'],
				$_POST['year'],
				$_POST['brand'],
				$_POST['model'],
				$_POST['vehicle_location'],
				$_POST['received-date'],
				$_POST['title-date']
			));

		} catch(Exception $e){
			$error_message .= "Database Error.<br>";
			$valid=0;
		}
		if($valid == 1){
			$success_message = 'Product is added successfully.';
		}else{
			$error_message .= "Upload Failed.<br>";
		}
		
	} 
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Product</h1>
	</div>
	<div class="content-header-right">
		<a href="vehicle.php" class="btn btn-primary btn-sm">View All</a>
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

				<div class="box box-info">
					<div class="box-body">
						<!-- For Client -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Select Client <span>*</span></label>
							<div class="col-sm-4">
								<select name="cust_name" class="form-control select2 top-cat">
									<option value="">Client Name</option>
									<?php
									$statement = $pdo->prepare("SELECT cust_name FROM tbl_customer where cust_status=1;");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
									?>
										<option selected="selected" value="<?php echo $row['cust_name']; ?>"><?php echo $row['cust_name']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
							<div class="col-sm-4">
								<select name="mcat_id" class="form-control select2 mid-cat">
									<option value="">Select Mid Level Category</option>
								</select>
							</div>
						</div> -->
						<!-- VIN -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">VIN<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="vin" class="form-control" id="vin-vehicle" value="5J6RM3H7XDL012136">
							</div>
							<div class="col-sm-2">
								<input type="button" id="vin-btn" value="LOAD" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning">
							</div>
						</div>
						<!-- Brand -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Brand <span>*</span> </label>
							<div class="col-sm-4">
								<input type="label" name="brand" id="car-brand" class="form-control" readonly="true">
							</div>
						</div>
						<!-- Year -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Year <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="year" id="car-year" class="form-control" readonly="true">
							</div>
						</div>
						<!-- Model -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Model <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="model" id="car-model" class="form-control" readonly="true">
							</div>
						</div>
						<!-- Vehicle Received -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Vehicle Received <span>*</span></label>
							<div class="col-sm-4">
								<input type="date" class="form-control" name="received-date" value="2018-07-22">
							</div>
						</div>
						<!-- Vehicle Received -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title Received <span>*</span></label>
							<div class="col-sm-4">
								<input type="date" class="form-control" name="title-date" value="2018-07-22">
							</div>
						</div>

						<!-- Location -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Select Location <span>*</span></label>
							<div class="col-sm-4">
								<select name="vehicle_location" class="form-control select2 top-cat">
									<option value="">-- Location --</option>
									
										<option value="India">India</option>
										<option value="USA">USA</option>
										<!-- <option value="USA">USA</option> -->
									
								
								</select>
							</div>
						</div>


						<!-- Title -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title ?</label>
							<div class="col-sm-8">
								<select name="title-check" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</div>
						</div>
						<!-- Vehicle Key -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Vehicle Key?</label>
							<div class="col-sm-8">
								<select name="vehicle-key" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select>
							</div>
						</div>

						<!-- Photos -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Photos <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="photos-files[]" multiple accept="image/*,.pdf" enctype="multipart/form-data">
							</div>
						</div>
						<!-- CarFax -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">CarFax <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="carfax-files[]"  accept="image/*,.pdf" enctype="multipart/form-data">
							</div>
						</div>
						<!-- Video -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Video <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="videos-files[]"  accept="video/*" enctype="multipart/form-data">
							</div>
						</div>





						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
							</div>
						</div>


					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>