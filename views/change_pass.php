<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Information Management Systems</title>
<meta name="description" content="">
<?php $role = $this->session->userdata("logged_in"); ?>
<?php $data['ac_role'] = $role['ac_role'];?>
<?php if($data['ac_role'] != null) { ?>
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
	<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Change Password</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/system_m/edit_pass', $formattr); ?>
						<div class="wizard">
							<h4>Please enter a new password</h4>
						</div>
						<? if($match == 'succeed'){
									echo "<div class='alert alert-success'>";
  									echo 'Password changed successfully';
									echo "</div><br>";
						}?>
						
						<div class="control-group">
							<label for="inputpass" class="control-label"><? echo $l_password ?></label>
							<div class="controls">
								<input type="password" name="inputpass" id="inputpass" required="required" maxlength="50" class="input-medium">
								<? if ($match == 'err'){ ?>
								<span class="help-inline error">Password did not match</span>
								<? } ?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputrepass" class="control-label"><? echo $l_passre ?></label>
							<div class="controls">
								<input type="password" name="inputrepass" id="inputrepass" required="required" maxlength="50" class="input-medium">
							</div>
						</div>
						<div class="form-actions">
							<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Change password" type="submit"/>
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
