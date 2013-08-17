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
							<h3>Create Subject</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/subject/input', $formattr); ?>
						<div class="wizard">
							<h4>Subject Information</h4>
						</div>
						<div class="control-group">
							<label for="inputcode" class="control-label"><? echo t_req.$l_code ?></label>
							<div class="controls">
								<input type="text" name="inputcode" id="inputcode" required="required" maxlength="6" class="input-small">
								<? if ($exist <> ''){ ?>
								<span class="help-inline error"><? echo $exist ?></span>
								<? } ?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputgroup" class="control-label"><? echo t_req.$l_grp ?></label>
							<div class="controls">
								<?
									echo "<select name='inputgroup' id='inputgroup' required='required' >";
									echo "<option value=''>Select</option>";
									foreach($subjectgroup as $f){        
    									echo "<option value=".$f->group_id. ">" .$f->group_name . "</option>";
									}
									echo "</select>";
								?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputtype" class="control-label"><? echo t_req.$l_type ?></label>
							<div class="controls">
								<?
									echo "<select name='inputtype' id='inputtype' required='required' >";
									echo "<option value=''>Select</option>";
									foreach($subjecttype as $f){        
    									echo "<option value=".$f->subject_type. ">" .$f->type_name . "</option>";
									}
									echo "</select>";
								?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputtype" class="control-label"><? echo t_req.$l_subclass ?></label>
							<div class="controls">
								<?
									echo "<select name='inputclass' id='inputclass' required='required' >";
									echo "<option value=''>Select</option>";
									foreach($subjectclass as $f){        
    									echo "<option value=".$f->class_id. ">" .$f->class_name . "</option>";
									}
									echo "</select>";
								?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputname" class="control-label"><? echo t_req.$l_name ?></label>
							<div class="controls">
								<input type="text" name="inputname" id="inputname" required="required" maxlength="50" class="input-large">
							</div>
						</div>
						<div class="control-group">
							<label for="inputcredit" class="control-label"><? echo t_req.$l_credit ?></label>
							<div class="controls">
								<select name="inputcredit" id="inputcredit" required="required" class="input-small">
									<option value="0.5">0.5</option>
									<option value="1">1</option>
									<option value="1.5">1.5</option>
									<option value="2">2</option>
									<option value="2.5">2.5</option>
									<option value="3">3</option>
									<option value="3.5">3.5</option>
									<option value="4">4</option>
								</select>
							</div>
							<!--div class="controls">
								<input type="number" name="inputcredit" id="inputcredit" required="required" maxlength="4" class="input-small" min="0.5" max="15" step="0.5">
							</div-->
						</div>
						<div class="control-group">
							<label for="inputdesc" class="control-label"><? echo $l_desc ?></label>
							<div class="controls">
								<input type="text" name="inputdesc" id="inputdesc" maxlength="125" class="input-xlarge">
							</div>
						</div>
						
						<div class="form-actions">
							<input class="navigation_button btn btn-danger" id="back2" value="Clear" type="reset" />
							<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Submit" type="submit"/>
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