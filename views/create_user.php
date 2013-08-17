<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Information Management Systems</title>
<meta name="description" content="">
<?php $role = $this->session->userdata("logged_in"); ?>
<?php $data['ac_role'] = $role['ac_role'];?>
<?php if($data['ac_role'] == 1) { ?>
<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="<?=site_url("/css/bootstrap.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/jquery.fancybox.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/style.css") ?>">
<link rel="stylesheet" href="<?=site_url("/css/bootstrap-responsive.css") ?>">
</head>

<body>				
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
							<h3>Create User</h3>
						</div>
						<div class="box-content box-nomargin">
							<? echo form_open('index.php/system_m/acc_input', $formattr); ?>
								<div class="wizard">
									<h4>Account Information</h4>
								</div>
								<div class="control-group">
									<label for="inputusername" class="control-label"><? echo t_req.$l_username ?></label>
									<div class="controls">
										<input type="text" name="inputusername" id="inputusername" class="input-medium" required="required" maxlength="25">
										<? if ($exist <> ''){ ?>
										<span class="help-inline error"><? echo $exist ?></span>
										<? } ?>
									</div>
								</div>
								<div class="control-group">
									<label for="inputpass" class="control-label"><? echo t_req.$l_password ?></label>
									<div class="controls">
										<input type="password" name="inputpass" id="inputpass" class="input-medium" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputlevel" class="control-label"><? echo $l_level ?></label>
									<div class="controls">
										<?
											echo "<select name='inputlevel' id='inputlevel' class='input-medium'>";
											foreach($level as $f){        
       											echo "<option value=".$f->level_no. ">" .$f->level_name . "</option>";
    										}
    										echo "</select>";
										?>
									</div>
								</div>
								
								<div class="control-group">
									<label for="inputteacherid" class="control-label"><? echo $l_teacherid ?></label>
									<div class="controls">
										<input type="text" name="inputteacherid" id="inputteacherid" class="input-small" required="required" maxlength="5">
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
<script src="<?=site_url("js/jquery.js")?>"></script>
<script src="<?=site_url("js/less.js")?>"></script>
<script src="<?=site_url("js/bootstrap.min.js")?>"></script>
<script src="<?=site_url("js/jquery.peity.js")?>"></script>
<script src="<?=site_url("js/jquery.fancybox.js")?>"></script>
<script src="<?=site_url("js/jquery.flot.js")?>"></script>
<script src="<?=site_url("js/jquery.color.js")?>"></script>
<script src="<?=site_url("js/jquery.flot.resize.js")?>"></script>
<script src="<?=site_url("js/custom.js")?>"></script>
</body>
<? } ?>
</html>
