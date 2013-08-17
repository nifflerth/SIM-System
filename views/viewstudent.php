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
<script src="<?=site_url("/js/json.js") ?>"></script>
<script src="<?=site_url("/js/jquery.js") ?>"></script>
<script>
function edit () {
    var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?=base_url('index.php');?>/student/edit/<? echo $code_s ?>');
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>
</head>
<body>			
<?php
$this->load->view('header');
?>
<div class="main">
	<?php
	$this->load->view('sidebar');
	?>	
	<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>View Student</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/subject/edit', $formattr); ?>
							<div class="wizard">
								<h4>Student Information</h4>
							</div>    
	    
	    					<div class="control-group">
								<label class="control-label"><? echo $l_code_s ?></label>
								<label class="control-label"><? echo $code_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_prefix_s ?></label>
								<label class="control-label"><? echo $prefix_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_name_s ?></label>
								<label class="control-label"><? echo $name_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_sname_s ?></label>
								<label class="control-label"><? echo $sname_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_gender_s ?></label>
								<label class="control-label"><? echo $gender_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_dob_s ?></label>
								<label class="control-label"><? echo $dob_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_inputidno_s ?></label>
								<label class="control-label"><? echo $inputidno_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_nat_s ?></label>
								<label class="control-label"><? echo $nat_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_rel_s ?></label>
								<label class="control-label"><? echo $rel_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_enroll_s ?></label>
								<label class="control-label"><? echo $enroll_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_lstschool_s ?></label>
								<label class="control-label"><? echo $lstschool_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_province_s ?></label>
								<label class="control-label"><? echo $province_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_room_s ?></label>
								<label class="control-label"><? echo $room_s ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_class_s ?></label>
								<label class="control-label"><? echo $class_s ?></label>
							</div>
							<div class="wizard">
								<h4>Guardian Information</h4>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_fname_g ?></label>
								<label class="control-label"><? echo $fname_g ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_fsurname_g ?></label>
								<label class="control-label"><? echo $fsurname_g ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_mname_g ?></label>
								<label class="control-label"><? echo $mname_g ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_msurname_g ?></label>
								<label class="control-label"><? echo $msurname_g ?></label>
							</div>
							<div class="control-group">
								<label class="control-label"><? echo $l_address_g ?></label>
								<label class="control-label"><? echo $address_g ?></label>
							</div>
							<div id="navigation2">
								<div class="form-actions">
									<button class="btn btn-primary" type="button" onclick="edit();">Edit Student Information</button>
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

<script src="<?=site_url("/js/jquery.js") ?>"></script>
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
<script src="<?=site_url("/js/custom.js") ?>"></script>
<script src="<?=site_url("/js/json.js") ?>"></script>

</body>
<? } ?>
</html>