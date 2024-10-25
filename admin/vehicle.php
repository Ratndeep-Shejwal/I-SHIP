<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Products</h1>
	</div>
	<div class="content-header-right">
		<a href="product-add.php" class="btn btn-primary btn-sm">Add Product</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Attachments</th>
								<th width="100">Customer Name</th>
								<th width="150">Vehicle VIN</th>
								<th width="40">Vehicle Year</th>
								<th width="40">Vehicle Brand</th>
								<th width="40">Vehicle Model</th>
								<th>Vehicle Location</th>
								<th>Change Status</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("select 
                                                            v.cust_user,
                                                            v.vehicle_vin,
                                                            v.vehicle_year,
                                                            v.vehicle_brand,
                                                            v.vehicle_model,
                                                            v.vehicle_location,
                                                            v.vehicle_status,
                                                            s.vehicle_action
                                                        from 
                                                            tbl_vehicle v
                                                        left join tbl_vehicle_status s
                                                        on v.vehicle_status=s.vehicle_status

							                           	");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td style="width:82px;">
                                        <!-- <a href="#" class="btn btn-primary btn-xs">Check Attachments</a> -->
                                        <a href="#" class="btn btn-primary btn-xs" data-href="vehicle-delete.php?id=<?php echo $row['vehicle_vin']; ?>" data-toggle="modal" data-target="#check-attachment-<?php echo $row['vehicle_vin']; ?>">Attachments</a>
                                    </td>
									<td><?php echo $row['cust_user']; ?></td>
									<td><?php echo $row['vehicle_vin']; ?></td>
									<td><?php echo $row['vehicle_year']; ?></td>
									<td><?php echo $row['vehicle_brand']; ?></td>
									<td>
                                        <?php echo $row['vehicle_model']; ?>
									</td>
									<td>
                                        <?php echo $row['vehicle_location']; ?>
									</td>
									<td>
                                        <span class="badge badge-success vehicle-status-field <?php echo $row["vehicle_vin"]."-action"; ?>" 
                                            style="background-color:green;" 
                                            data-vin="<?php echo $row["vehicle_vin"]; ?>" 
                                            
                                        >
                                            <?php
                                                echo $row['vehicle_action'];
                                            ?>
                                        </span>
                                        <br>
                                        
                                        <!-- [ Previous Status button] -->
                                        <span 
                                            id="update-pre-<?php echo $row['vehicle_vin']; ?>"
                                            class="update-pre-<?php echo $row['vehicle_vin']; ?> <?php echo ($row['vehicle_status'] > 0) ? 'app' : 'd-none'; ?>"
                                        >
                                            <button type="button" 
                                                class="btn btn-primary btn-xs update-status-pre" 
                                                data-id="<?php echo $row['vehicle_vin']; ?>" 
                                                data-current="<?php echo $row["vehicle_status"]; ?>"
                                            >
                                                Previous Status
                                            </button>
                                        </span>
                                        
                                        
                                        <!-- [ Next Status ] button -->
                                        <span 
                                            id="update-next-<?php echo $row['vehicle_vin']; ?>"
                                            class="update-next-<?php echo $row['vehicle_vin']; ?> <?php echo ($row['vehicle_status'] < 5) ? 'app' : 'd-none'; ?>">
                                            <button type="button" 
                                                class="btn btn-primary btn-xs update-status-next" 
                                                data-id="<?php echo $row['vehicle_vin']; ?>" 
                                                data-current="<?php echo $row["vehicle_status"]; ?>"
                                            >
                                                Next Status
                                            </button>
                                        </span>
                                        
                                    
                                    
                                    </td>
									<td>										
										<a href="vehicle-edit.php?id=<?php echo $row['vehicle_vin']; ?>" class="btn btn-primary btn-xs">Edit</a>
										<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
									</td>

                                    <div class="modal fade" id="check-attachment-<?php echo $row['vehicle_vin']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Attachments</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="body-head">

                                                    </div>
                                                    <p>Vehicle Attachments to be displayed here</p>

                                                    
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a data-toggle="tab" href="#home-<?php echo $row['vehicle_vin']; ?>">Photos</a></li>
                                                        <li><a data-toggle="tab" href="#menu1-<?php echo $row['vehicle_vin']; ?>">Carfax</a></li>
                                                        <li><a data-toggle="tab" href="#menu2-<?php echo $row['vehicle_vin']; ?>">Video</a></li>
                                                        </ul>

                                                        <div class="tab-content">
                                                            <div id="home-<?php echo $row['vehicle_vin']; ?>" class="tab-pane fade in active">
                                                                <!-- <h3>HOME</h3> -->
                                                             <p>
                                                                
                                                                <?php
                                                                    
                                                                    // Define the folder path containing images
                                                                    $folderPath = '../uploads/' . $row['vehicle_vin'].'//photos'; // Use forward slashes for compatibility

                                                                    // Ensure the folder path has a trailing slash
                                                                    if (substr($folderPath, -1) !== DIRECTORY_SEPARATOR) {
                                                                        $folderPath .= DIRECTORY_SEPARATOR;
                                                                    }

                                                                    // Get all image files in the folder
                                                                    $images = glob($folderPath . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                                                    // Check if there are any images in the folder
                                                                    if (count($images) > 0) {
                                                                        echo '<div class="image-gallery">';
                                                                        foreach ($images as $image) {
                                                                            $imagePath = basename($image); // Get the file name
                                                                            $imageUrl = $folderPath . $imagePath; // Convert backslashes to forward slashes
                                                                            echo '<div class="image-item">';
                                                                            echo '<img src="' . htmlspecialchars($imageUrl) . '" alt="' . htmlspecialchars($imagePath) . '" />';
                                                                            echo '</div>';
                                                                        }
                                                                        echo '</div>';
                                                                    } else {
                                                                        echo 'No images found in this folder.';
                                                                    }   
                                                                      
                                                                ?>
                                                            </div>
                                                            <div id="menu1-<?php echo $row['vehicle_vin']; ?>" class="tab-pane fade">
                                                                <!-- <h3>Menu 1</h3> -->
                                                                <p> Car Fax Some content for <?php echo $row['vehicle_vin']; ?></p>
                                                            </div>
                                                            <div id="menu2-<?php echo $row['vehicle_vin']; ?>" class="tab-pane fade">
                                                                <!-- <h3>Menu 2</h3> -->
                                                                <p>Video Some content for <?php echo $row['vehicle_vin']; ?></p>
                                                                <div class="video-gallery">
                                                                    <?php
                                                                    // Define the folder path containing videos
                                                                    $folderPath = '../uploads/' . $row['vehicle_vin'].'//video'; // Use forward slashes for compatibility
                                                                    // Ensure the folder path has a trailing slash
                                                                    if (substr($folderPath, -1) !== DIRECTORY_SEPARATOR) {
                                                                        $folderPath .= DIRECTORY_SEPARATOR;
                                                                    }

                                                                    // Get all video files in the folder
                                                                    $videos = glob($folderPath . '*.{mp4,webm,ogv}', GLOB_BRACE);

                                                                    // Check if there are any videos in the folder
                                                                    if (count($videos) > 0) {
                                                                        foreach ($videos as $video) {
                                                                            $videoPath = basename($video); // Get the file name
                                                                            $videoUrl = str_replace(DIRECTORY_SEPARATOR, '/', $folderPath . $videoPath); // Convert backslashes to forward slashes
                                                                            echo '<div class="video-item">';
                                                                            echo '<video controls>';
                                                                            echo '<source src="' . htmlspecialchars($videoUrl) . '" type="video/mp4">'; // Adjust type for different video formats
                                                                            echo 'Your browser does not support the video tag.';
                                                                            echo '</video>';
                                                                            echo '<p>' . htmlspecialchars($videoPath) . '</p>';
                                                                            echo '</div>';
                                                                        }
                                                                    } else {
                                                                        echo 'No videos found in this folder.';
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="tinyfilemanager.php?p=<?php echo $row['vehicle_vin'].'/photos'.'&upload'; ?>"class="btn btn-success btn-ok">Upload</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this Vehicle?</p>
                <p style="color:red;">Be careful! This Vehicle will be deleted from the Database</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>



<?php require_once('footer.php'); ?>