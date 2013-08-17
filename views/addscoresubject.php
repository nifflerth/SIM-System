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
							<h3>Add Score</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="wizard">
								<h4>Student's Score : Subject <?=$subjectname?></h4>
							</div>
							<? echo form_open('index.php/score/scoreupdate', $formattr); ?>

							<div class="tab-content">
								<div class="tab-pane active" id="basic">
									<table class="table table-striped table-bordered table-hover table-condensed">
										<thead>
									    	<tr>
									      		<th>Prefix</th>
									      		<th>Name</th>
									      		<th>Surname</th>
									      		<th>Score</th>
									      		<th>Grade</th>
									    	</tr>
									  	</thead>
									<?
										foreach($student as $f){  
											echo "<tr>";      
											echo "<td width='10%'>".$f->name_full."</td>";
											echo "<td width='40%'>".$f->student_name."</td>";
											echo "<td width='40%'>".$f->student_surname."</td>";
											echo "<td style='display:none;'><input type'text' name='studentid[]' id='studentid[]' value=".$f->student_id."></td>";
											echo "<td ><input type='text' name='score[]' id='score[]' class='input-medium' value=".$f->score."></td>";
											echo "<td><input type='number' name='grade[]' id='grade[]' class='input-small' min='0' max='4' value=".$f->grade."></td>";
											echo "</tr>";
										}
									?>
									</table>
									<input type="hidden" name="classid" id="classid" value="<?=$classid?>">
									<input type="hidden" name="subjectid" id="subjectid" value="<?=$subjectid?>">
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