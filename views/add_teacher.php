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
</head>
<body>			
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
							<h3>Create Teacher</h3>
						</div>
						<div class="box-content box-nomargin">
							<? echo form_open('index.php/teacher/input', $formattr); ?>
								<div class="wizard">
									<h4>Teacher Information</h4>
								</div>
								<? if($code == 'err'){
									echo "<div class='alert alert-warning'>";
  									echo 'Please enter all require fields.';
									echo "</div><br>";
								}?>
								<div class="control-group">
									<label for="selectprefix_t" class="control-label"><? echo t_req.$l_prefix_t ?></label>
									<div class="controls">
										<select name="selectprefix_t" id="selectprefix_t" required="required">
											<option value="">Select</option>
											<option value="3">นาย</option>
											<option value="4">นางสาว</option>
											<option value="5">นาง</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="inputname_t" class="control-label"><? echo t_req.$l_name_t ?></label>
									<div class="controls">
										<input type="text" name="inputname_t" id="inputname_t" class="input-medium" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputsname_t" class="control-label"><? echo t_req.$l_sname_t ?></label>
									<div class="controls">
										<input type="text" name="inputsname_t" id="inputsname_t" class="input-medium" required="required" maxlength="50">
									</div>
								</div>
								<div class="form-actions">
									<input class="navigation_button btn btn-danger" id="back2" value="Clear" type="reset" />
									<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Submit" type="submit" />
								</div>
							<? echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end BODY-->
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