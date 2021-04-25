
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Profile</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="http://iqonic.design/themes/instadash/html/assets/images/favicon.ico" />

	<link rel="stylesheet" href="<?php echo base_url()?>css/backend.min0ff5.css?v=1.0.2">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/%40fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/remixicon/fonts/remixicon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/%40icon/dripicons/dripicons.css">

	<link rel='stylesheet' href="<?php echo base_url()?>vendor/fullcalendar/core/main.css" />
	<link rel='stylesheet' href="<?php echo base_url()?>vendor/fullcalendar/daygrid/main.css" />
	<link rel='stylesheet' href="<?php echo base_url()?>vendor/fullcalendar/timegrid/main.css" />
	<link rel='stylesheet' href="<?php echo base_url()?>vendor/fullcalendar/list/main.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>vendor/mapbox/mapbox-gl.css"></head>
<?php include('header.php')?>
<div class="content-page">
	<div class="container">
		<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-body p-3 text-center">
									<?php

									echo '<img src="'.base_url().'upload/proPic/'.$propic.'" width="310" height="340">';
									echo '<h3>'.$name.'</h3>';
									echo '<span>'.$course.'</span>';
									?>
								</div>
							</div>
						</div>
						<div class="col-6 bg-light p-3">
											<h4 class="mb-3">Personal Details</h4>
						<?php
						echo	'<form method="post" action="'.base_url().'student/pro_update/'.$this->session->userdata('uid').'">';

						echo			'<div class="form-group">';
						echo			'<label for="email">Email address:</label>';
						echo			'<input type="email" value="'.$email.'" class="form-control" id="email1" disabled>';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="password">Password:</label>';
						echo			'<input type="password" name="passwrd" class="form-control">';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="phone">Phone:</label>';
						echo			'<input type="number" value="'.$phone.'" name="phone" class="form-control" disabled>';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="batch">Batch:</label>';
						echo			'<input type="text" value="'.$batch.'" class="form-control" id="email1" disabled>';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="batch">Blood:</label>';
						echo			'<input type="text" value="'.$blood.'" class="form-control" id="email1" disabled>';
						echo			'</div>';
						echo				'<button type="submit" class="btn btn-primary">Update</button>';
						echo	'</form>';
						?>
									</div>
								
						</div>
		</div>
	</div>
</div>
<!-- Wrapper End-->
<?php include('footer.php')?>
</body>


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:19:31 GMT -->
</html>
