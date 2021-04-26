
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SMTP Settings | Livia Mailer</title>

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
			<div class="col-lg-12">
				<div class="card border border-success">
					<div class="card-header bg-success">
						Your SMTP Settings
					</div>
					<div class="card-body">
						<form method="post" action="<?php echo base_url()?>settings/update_smtp/<?php echo $SMTP_ID?>">
							<div class="col-12">
								<div class="form-group">
									<label for="exampleInputEmail1">Email ID</label>
									<input type="email" name="email" value="<?php echo $email?>" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>
							<div class="col-6 float-right">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Protocol</label>
									<select class="form-control" name="protocol" id="exampleFormControlSelect1">
										<option value="mail">mail</option>
										<option value="sendmail">sendmail</option>
										<option value="smtp">smtp</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Host</label>
									<input type="text" name="host" value="<?php echo $smtp_host?>" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>

							<div class="col-6 float-right">
								<div class="form-group">
									<label for="exampleFormControlSelect1">SMTP Crypto</label>
									<select class="form-control" name="crypto" id="exampleFormControlSelect1">
										<option selected>Select Any</option>
										<option value="ssl">SSL</option>
										<option value="tls">TLS</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="exampleInputEmail1">SMTP Port</label>
									<input type="number" name="port" value="<?php echo $smtp_port?>" placeholder="Eg: 587" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>

							<div class="col-6 float-right">
								<div class="form-group">
									<label for="exampleInputEmail1">SMTP User</label>
									<input type="text" name="user" value="<?php echo $smtp_user?>" placeholder="SMTP User" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="exampleInputEmail1">SMTP Password</label>
									<input type="password" name="password" value="<?php echo $smtp_pass?>" placeholder="SMTP Password" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>

							<div class="col-6 float-right">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Mail Type</label>
									<select class="form-control" name="type" id="exampleFormControlSelect1">
										<option selected>Select Any</option>
										<option value="text">Text</option>
										<option value="html">HTML</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="exampleInputEmail1">SMTP Timeout</label>
									<input type="text" name="timeout" value="<?php echo $smtp_timeout?>" placeholder="Eg: 4" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
								</div>
							</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-success">Update SMTP</button>
					</div>

					</form>
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
