
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Compose Message</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="http://iqonic.design/themes/instadash/html/assets/images/favicon.ico" />
	<script src="https://cdn.ckeditor.com/ckeditor5/<version>/classic/ckeditor.js"></script>
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
			<div class="col-12">
				<div class="row">
					<div class="col-md-12 mb-3">
						<h5 class="text-primary card-title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
								<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
							</svg> Compose Message</h5>
					</div>
				</div>
			<div class="card p-5">
			<form class="email-form" method="post" action="<?php echo base_url()?>email/send_email" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="multiple" class="col-sm-2 col-form-label">To:</label>
					<div class="col-sm-10">
						<select name="to[]"  id="multiple" class="js-states form-control" multiple>

							<?php
							$getEmailQuery=$this->db->query("SELECT * FROM livia_subscribers");
							$getEmail = $getEmailQuery->result();
							foreach($getEmail as $row)
							{
								echo '<option value="'.$row->EMAIL.'">'.$row->EMAIL.'</option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="subject" class="col-sm-2 col-form-label">Subject:</label>
					<div class="col-sm-10">
						<input type="text" name="subject"  id="subject" class="form-control" placeholder="Subject">
					</div>
				</div>
				<div class="form-group row">
					<label for="subject" class="col-sm-2 col-form-label">Your Message:</label>
					<div class="col-md-10">
						<textarea name="message" class="textarea form-control" rows="5">Enter Your Message</textarea>
					</div>
				</div>
				<div class="form-group row align-items-center">
					<div class="d-flex flex-grow-1 align-items-center send-buttons">
						<div class="send-btn pl-3">
							<button type="submit" class="btn btn-primary">Send</button>
						</div>
<!--						<div class="send-panel">-->
<!--							<label class="ml-2 bg-primary-light rounded" for="file"> <input type="file" id="file" style="display: none"> <a><i class="ri-attachment-line text-primary"></i> </a> </label>-->
<!--							<label class="ml-2 bg-primary-light rounded"> <a href="javascript:void(0);"> <i class="ri-map-pin-user-line text-primary"></i></a>  </label>-->
<!--							<label class="ml-2 bg-primary-light rounded"> <a href="javascript:void(0);"> <i class="ri-drive-line text-primary"></i></a>  </label>-->
<!--							<label class="ml-2 bg-primary-light rounded"> <a href="javascript:void(0);"> <i class="ri-camera-line text-primary"></i></a>  </label>-->
<!--							<label class="ml-2 bg-primary-light rounded"> <a href="javascript:void(0);"> <i class="ri-user-smile-line text-primary"></i></a>  </label>-->
<!--						</div>-->
					</div>
					<div class="d-flex mr-3 align-items-center">
						<div class="send-panel float-right">
							<label class="ml-2 mb-0 bg-primary-light rounded" ><a href="javascript:void(0);"><i class="ri-settings-2-line text-primary"></i></a></label>
							<label class="ml-2 mb-0 bg-primary-light rounded"><a href="javascript:void(0);">  <i class="ri-delete-bin-line text-primary"></i></a>  </label>
						</div>
					</div>
				</div>
			<form>
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
<script>
	CKEDITOR.editorConfig = function (config) {
		config.language = 'en';
		config.uiColor = '#F7B42C';
		config.height = 300;
		config.toolbarCanCollapse = true;

	};
	CKEDITOR.replace('editor1');
</script>
