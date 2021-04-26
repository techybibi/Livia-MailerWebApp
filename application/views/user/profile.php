
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Profile | Livia Mailer</title>

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
						<div class="col-12 bg-light p-3">
											<h4 class="mb-3">Personal Details</h4>
						<?php
						echo	'<form method="post" action="'.base_url().'login/pro_update/'.$this->session->userdata('uid').'">';

						echo			'<div class="form-group">';
						echo			'<label for="email">Full Name:</label>';
						echo			'<input type="text" name="name" value="'.$name.'" class="form-control" id="name">';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="email">Email address:</label>';
						echo			'<input type="email"name="email" value="'.$email.'" class="form-control" id="email">';
						echo			'</div>';

						echo			'<div class="form-group">';
						echo			'<label for="password">Password:</label>';
						echo			'<input type="password" name="password" class="form-control">';
						echo 			'<small id="emailHelp" class="form-text text-muted">Enter Password Before Update</small>';
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
