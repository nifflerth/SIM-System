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
				<a href="<?=base_url('index.php');?>/subject">
					List Subjects
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
				<a href="<?=base_url('index.php');?>/student/create" class='light'>
					<div class="ico"><i class="icon-list icon-white"></i></div>
					New Students
				</a>
			</li>
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-tasks icon-white"></i></div>
					Search
					<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="<?=base_url('index.php');?>/search">
							Search By Student ID
						</a>
					</li>
					<li>
						<a href="<?=base_url('index.php');?>/search">
							Search By Class & Room
						</a>
					</li>
				</ul>
			</li>
			<li class='active'>
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
								<li>
								<a href="#myModal" data-toggle="modal">+ New Subject</a>
							</li>
							</ul>
						</div>
						<div class="box-content box-nomargin">
							<div class="tab-content">
									<div class="tab-pane active" id="basic">
										<table class='table table-striped dataTable table-bordered'>
											<thead>
												<tr>
													<th>Name</th>
													<th>Credits</th>
													<th>Hours</th>
													<th>Class</th>
													<th>Teacher</th>
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
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 5.0</td>
													<td>Win 95+</td>
													<td>5</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 5.5</td>
													<td>Win 95+</td>
													<td>5.5</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet
														 Explorer 6</td>
													<td>Win 98+</td>
													<td>6</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>Internet Explorer 7</td>
													<td>Win XP SP2+</td>
													<td>7</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Trident</td>
													<td>AOL browser (AOL desktop)</td>
													<td>Win XP</td>
													<td>6</td>
													<td>A</td>
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

<!-- Modal Add New Subject -->

	<div class="modal hide" id="myModal">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">×</button>
	    <h3>Add New Subject</h3>
	  </div>
	  <div class="modal-body">
	    <p>One fine body…</p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
	    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
	  </div>
	</div>

<!-- End of Modal -->

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
<script src="<?=site_url("/js/jquery.jgrowl_minimized.js") ?>"></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?> "></script>
<script src="<?=site_url("/js/jquery.dataTables.bootstrap.js") ?> "></script>
<script src="<?=site_url("/js/jquery.textareaCounter.plugin.js") ?> "></script>
<script src="<?=site_url("/js/jquery-ui-1.8.22.custom.min.js") ?>"></script>
<script src="<?=site_url("/js/ui.spinner.js") ?> "></script>
<script src="<?=site_url("/js/custom.js") ?> "></script>
</body>
<? } ?>
</html>