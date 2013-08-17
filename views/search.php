<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Information Management Systems</title>
<meta name="description" content="">
<?php $role = $this->session->userdata("logged_in"); ?>
<?php $data['ac_role'] = $role['ac_role']; ?>
<?php if($data['ac_role'] != null) { ?>
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="<?=site_url("/css/bootstrap.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.fancybox.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/style.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/bootstrap-responsive.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/uniform.default.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/bootstrap.datepicker.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.cleditor.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.plupload.queue.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.tagsinput.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.ui.plupload.css")?>">
<link rel="stylesheet" href="<?=site_url("/css/chosen.css")?>">
</head>
<body>				
<div class="topbar">
	<div class="container-fluid">
		<a href="dashboard.html" class='company'>SIM Systems</a>
		<ul class='mini'>
			</li>
			<li>
				<a href="index.html">
					<img src="<?=site_url("img/icons/fugue/control-power.png") ?>" alt="">
					Logout
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="breadcrumbs">
	<div class="container-fluid">
		<ul class="bread pull-left">
			<li>
				<a href="<?=base_url('index.php');?>/dashboard"><i class="icon-home icon-white"></i></a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/search">
					List Students
				</a>
			</li>
		</ul>

	</div>
</div>
<div class="main">
	<div class="navi">
		<ul class='main-nav'>
			<li>
				<a href="<?=base_url('index.php');?>/dashboard" class='light'>
					<div class="ico"><i class="icon-home icon-white"></i></div>
					Home
				</a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/add" class='light'>
					<div class="ico"><i class="icon-list icon-white"></i></div>
					New Students
				</a>
			</li>
			<li class='active open'>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-tasks icon-white"></i></div>
					Search
					<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
				</a>
				<ul class='collapsed-nav'>
					<li>
						<a href="<?=base_url('index.php');?>/search/student)id">
							Search By Student ID
						</a>
					</li>
					<li class='active'>
						<a href="<?=base_url('index.php');?>/search/class_room">
							Search By Class & Room
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					List Subjects
				</a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Add Scores
				</a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Prints
				</a>
			</li>	
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Systems
				</a>
			</li>								
		</ul>
	</div>
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head tabs">
							<h3>List of Students</h3>
							<ul class='nav nav-tabs'>
							</ul>
						</div>
						<div class="box-content box-nomargin">
							<div class="tab-content">
									<div class="tab-pane active" id="basic">
										<table class='table table-striped dataTable table-bordered'>
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Class</th>
													<th>Room</th>
													<th>GPA</th>
													<th width="70px">EDIT</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 4.0</td>
													<td>Win 95+</td>
													<td>4</td>
													<td>X</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 5.0</td>
													<td>Win 95+</td>
													<td>5</td>
													<td>C</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 5.5</td>
													<td>Win 95+</td>
													<td>5.5</td>
													<td>A</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 6</td>
													<td>Win 98+</td>
													<td>6</td>
													<td>A</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet Explorer 7</td>
													<td>Win XP SP2+</td>
													<td>7</td>
													<td>A</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>AOL browser (AOL desktop)</td>
													<td>Win XP</td>
													<td>6</td>
													<td>A</td>
													<td><center><a class="btn btn-inverse" data-toggle="modal" href="#myModal" >Edit</a>
							<div class="modal hide" id="myModal">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Modal header</h3>
							  </div>
							  <div class="modal-body">
							    <p>One fine body…</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn" data-dismiss="modal">Close</a>
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
							  </div></center></td>
												</tr>
											</tbody>
										</table>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>	
<script src="<?=site_url("/js/jquery.js") ?> "></script>
<script src="<?=site_url("/js/less.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.uniform.min.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.timepicker.js") ?> "></script>
<script src="<?=site_url("/js/bootstrap.datepicker.js") ?> "></script>
<script src="<?=site_url("/js/chosen.jquery.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.fancybox.js") ?> "></script>
<script src="<?=site_url("/js/plupload/plupload.full.js") ?> "></script>
<script src="<?=site_url("/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js") ?> "></script>
<script src="<?=site_url("/js/jquery.cleditor.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.inputmask.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.tagsinput.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.mousewheel.js") ?> "></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.dataTables.bootstrap.js") ?> "></script>
<script src="<?=site_url("/js/jquery.textareaCounter.plugin.js") ?> "></script>
<script src="<?=site_url("/js/ui.spinner.js") ?> "></script>
<script src="<?=site_url("/js/custom.js") ?> "></script>
</body>
<? } ?>
</html>