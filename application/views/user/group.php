
<!doctype html>
<html lang="en">


<!-- Mirrored from iqonic.design/themes/instadash/html/backend/dashboard-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 04:18:17 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Welcome To Dashboard</title>
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
						Add New Subscriber
					</div>
					<div class="card-body">
						<form method="post" action="<?php echo base_url()?>group/add_group">
							<div class="col-12">
								<div class="form-group">
									<label for="exampleInputPassword1">Group Name</label>
									<input type="text" name="gpName" class="form-control border border-success" id="exampleInputPassword1" required>
								</div>
							</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-success">Add Group</button>
					</div>

					</form>
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
								<th scope="col">Group Name</th>
								<th scope="col">Action</th>
							</tr>
							</thead>
							<tbody class="text-dark">
							<?php
							$i=1;
							$getSubDataQuery = $this->db->query("SELECT * FROM livia_group GROUP BY GID DESC");
							$subData = $getSubDataQuery->result();
							foreach ($subData as $row){
								?>
								<tr>
									<th scope="row"><?php echo $i ?></th>
									<td><?php echo $row->GName ?></td>
									<td><a href="<?php echo base_url().'group/edit/'.$row->GID ?>" class="btn btn-primary">Edit</a> <a href="<?php echo base_url().'group/delete/'.$row->GID ?>" class="btn btn-danger">Delete</a></td>
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
