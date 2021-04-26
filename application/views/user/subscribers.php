
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Subscribers | Livia Mailer</title>
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
			<!-- Display status message -->
			<?php if(!empty($success_msg)){ ?>
			<div class="col-xs-12">
				<div class="alert alert-success"><?php echo $success_msg; ?></div>
			</div>
			<?php } ?>
			<?php if(!empty($error_msg)){ ?>
				<div class="col-xs-12">
					<div class="alert alert-danger"><?php echo $error_msg; ?></div>
				</div>
			<?php } ?>
			<div class="col-lg-12">
				<div class="card border border-success">
					<div class="card-header bg-success">
						Add New Subscriber
					</div>
					<div class="card-body">
						<form method="post" action="<?php echo base_url()?>subscribers/add_user">
							<div class="col-12">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Group</label>
									<select class="form-control" name="group" id="exampleFormControlSelect1">
										<option>Select a group</option>
										<?php
										$getGroupQuery=$this->db->query("select * from livia_group");
										$getGroup = $getGroupQuery->result();
										$i=1;
										foreach($getGroup as $row)
										{
											echo '<option value="'.$row->GName.'">'.$row->GName.'</option>';
										}
										?>
										<small id="emailHelp" class="form-text text-muted">Want to create a Group: <a href="<?php echo base_url()?>group">Click Here</a></small>
									</select>
								</div>
							</div>

							<div class="col-6 float-right">
								<div class="form-group">
									<label for="exampleInputPassword1">Email Address</label>
									<input type="email" name="email" class="form-control border border-success" id="exampleInputPassword1" required>
								</div>
							</div>
							<div class="col-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Full Name</label>
										<input type="text" name="fullName" class="form-control border border-success" id="exampleInputEmail1" aria-describedby="emailHelp" required>
									</div>
							</div>
					</div>
					<div class="card-footer">
								<button type="submit" class="btn btn-success">Add Subscriber</button>
						</form>
					</div>
					<div class="card-footer">
						<div class="col-12 d-flex justify-content-center" id="importFrm">
							<form action="<?php echo base_url('members/import'); ?>" method="post" enctype="multipart/form-data">
								<input type="file" name="file" />
								<input type="submit" class="btn btn-success" name="importSubmit" value="IMPORT">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card border border-success">
					<div class="card-header bg-success">
						All Subscriber
					</div>
					<div class="card-body">
						<table class="table">
							<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Full Name</th>
								<th scope="col">Email</th>
								<th scope="col">GROUP</th>
								<th scope="col">Action</th>
							</tr>
							</thead>
							<tbody class="text-dark">
							<?php
							$i=1;
							$getSubDataQuery = $this->db->query("SELECT * FROM livia_subscribers GROUP BY UID DESC");
							$subData = $getSubDataQuery->result();
							foreach ($subData as $row){
							?>
							<tr>
								<th scope="row"><?php echo $i ?></th>
								<td><?php echo $row->NAME ?></td>
								<td><?php echo $row->EMAIL ?></td>
								<td><?php echo $row->GRP ?></td>
								<td><a href="<?php echo base_url().'subscribers/edit/'.$row->UID ?>" class="btn btn-primary">Edit</a> <a href="<?php echo base_url().'subscribers/delete/'.$row->UID ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							<?php $i++; }?>
							</tbody>
						</table>
					</div>
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
