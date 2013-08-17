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
    form.setAttribute('action', '<?=base_url('index.php');?>/teacher/edit/<? echo $id ?>');
    form.style.display = 'hidden';
    document.body.appendChild(form)
    form.submit();
}
</script>
</head>
<body>
<!--top bar-->
<?php
$this->load->view('header');
?>
<div class="main">
	<?php
	$this->load->view('sidebar');
	?>	
<!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>View Teacher</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/teacher/edit', $formattr); ?>
							<div class="wizard">
								<h4>Teacher Information</h4>
							</div>
							<? if($code == 'create'){
									echo "<div class='alert alert-success'>";
  									echo 'Teacher has been created';
									echo "</div><br>";
								}?>
							<div class="control-group">
								<label for="inputprefix" class="control-label"><? echo $l_prefix_t ?></label>
								<label for="inputprefix" class="control-label"><? echo $prefix_t ?></label>
							</div>
							<div class="control-group">
								<label for="inputname" class="control-label"><? echo $l_name_t ?></label>
								<label for="inputname" class="control-label"><? echo $name_t ?></label>
							</div>
							<div class="control-group">
								<label for="inputsname" class="control-label"><? echo $l_sname_t ?></label>
								<label for="inputsname" class="control-label"><? echo $sname_t ?></label>
							</div>
							<div class="control-group">
								<label for="inputgender" class="control-label"><? echo $l_gender_t?></label>
								<label for="inputgender" class="control-label"><? echo $gender_t ?></label>
							</div>
							<div class="control-group">
								<label for="inputstatus" class="control-label"><? echo $l_status_t?></label>
								<label for="inputstatus" class="control-label"><? 
								if($status_t == 1){echo "Active";}else if($status_t == 2){echo "Inactive";} 
								?></label>
							</div>
							<div id="navigation2">
								<div class="form-actions">
									<button class="btn btn-primary" type="button" onclick="edit();">Edit Teacher</button>
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