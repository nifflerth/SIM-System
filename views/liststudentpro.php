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
<link rel="stylesheet" href="<?=site_url("/css/jquery.dataTables.css") ?>">

<script src="<?=site_url("/js/json.js") ?>"></script>
<script src="<?=site_url("/js/jquery.js") ?>"></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?>"></script>

</head>
<body>
<!--top bar-->
<?php
$this->load->view('header');
?>
<div class="main">
	<?php
	$this->load->view('sidebar');
	?>	<!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Promote Student</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="wizard">
								<h4>Class year <?=$year; ?> <?=$classname?> <?=$roomname?> <a href='/index.php/score/choose_activity/<?=$year?>/<?=$class?>/<?=$room?>/<?=$part?>' class='btn pull-right' name='back_last' id='back_last'>Back to Activity List</a></h4>
							</div>
							<? if($code == 'update'){								
									echo "<div class='alert alert-success'>";
  									echo 'Activities are updated';
									echo "</div><br>";

								} ?>
							<? echo form_open('index.php/score/racupdate', $formattr); ?>

							<div class="tab-content">
								<div class="tab-pane active" id="basic">
									<table class="table table-striped table-bordered table-hover table-condensed">
										<thead>
									    	<tr>
									      		<th>Prefix</th>
									      		<th>Name</th>
									      		<th>Surname</th>
									      		<th>Activity Name</th>
									      		<th>Result</th>
									    	</tr>
									  	</thead>
									<?
										foreach($student as $f){  
											echo "<tr>";      
											echo "<td width='8%'>".$f->name_full."</td>";
											echo "<td width='20%'>".$f->student_name."</td>";
											echo "<td width='20%'>".$f->student_surname."</td>";
											echo "<td width='40%'>".$f->activity_name."</td>";
											echo "<td style='display:none;'><input type'text' name='studentid[]' id='studentid[]' value=".$f->student_id."></td>";
											echo "<td width='150px'><select name='result[]' id='result[]' class='input-medium'>";
											echo "<option value=''";
													if($f->result == ''){ 
														echo " selected "; 
													}
											echo ">Please select</option>";
											echo "<option value='ผ'";
													if($f->result == 'ผ'){ 
														echo " selected "; 
													}
										    echo ">ผ</option>";
											echo "<option value='มผ'";
													if($f->result == 'มผ'){ 
														echo " selected "; 
													}
											echo ">มผ</option>";
											echo "</tr>";
										}
									?>
									</table>
									<input type="hidden" name="classid" id="classid" value="<?=$classid?>">
									<input type="hidden" name="acid" id="acid" value="<?=$activityid?>">
									<input type="hidden" name="class" id="class" value="<?=$class?>">
									<input type="hidden" name="room" id="room" value="<?=$room?>">
									<input type="hidden" name="part" id="part" value="<?=$part?>">
									<input type="hidden" name="year" id="year" value="<?=$year?>">
									<div class="form-actions">
										<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Submit" type="submit" />
									</div>
								</div>
							</div>
							<? echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
<!-- end BODY -->
</div>
<script src="<?=site_url("/js/custom.js") ?>"></script>
<script src="<?=site_url("/js/less.js") ?>"></script>
<script src="<?=site_url("/js/bootstrap.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.uniform.min.js") ?>"></script>
<script src="<?=site_url("/js/bootstrap.timepicker.js") ?>"></script>
<script src="<?=site_url("/js/bootstrap.datepicker.js") ?>"></script>
<script src="<?=site_url("/js/chosen.jquery.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.fancybox.js") ?>"></script>
<script src="<?=site_url("/js/plupload/plupload.full.js") ?>"></script>
<script src="<?=site_url("/js/plupload/jquery.plupload.queue/jquery.plupload.queue.js") ?>"></script>
<script src="<?=site_url("/js/jquery.cleditor.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.inputmask.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.tagsinput.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.mousewheel.js") ?>"></script>
<script src="<?=site_url("/js/jquery.textareaCounter.plugin.js") ?>"></script>
<script src="<?=site_url("/js/ui.spinner.js") ?>"></script>
<script src="<?=site_url("/js/jquery.jgrowl_minimized.js") ?>"></script>
<script src="<?=site_url("/js/jquery.form.js") ?>"></script>
<script src="<?=site_url("/js/jquery.validate.min.js") ?>"></script>
<script src="<?=site_url("/js/bbq.js") ?>"></script>
<script src="<?=site_url("/js/jquery-ui-1.8.22.custom.min.js") ?>"></script>
<script src="<?=site_url("/js/jquery.form.wizard-min.js") ?>"></script>



</body>
<? } ?>
</html>