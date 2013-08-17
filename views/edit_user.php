<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Information Management Systems</title>
<meta name="description" content="">
<?php $role = $this->session->userdata("logged_in"); ?>
<?php $data['ac_role'] = $role['ac_role']; ?>
<?php if($data['ac_role'] <= 2) { ?>
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
<!--end topbar-->

<div class="main">
<!--sidebar-->
	<?php
	$this->load->view('sidebar');
	?><!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Edit User</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/system_m/edit_input', $formattr); ?>
						<div class="wizard">
							<h4>User Information</h4>
						</div>
						<? if($match == 'succeed'){
									echo "<div class='alert alert-success'>";
  									echo 'User account modified successfully';
									echo "</div><br>";
						}?>
						
						<div class="control-group">
							<label for="inputuserid" class="control-label"><? echo $l_userid ?></label>
							<div class="controls">
								<input type="text" name="inputuserid" id="inputuserid" required="required" class="input-small" disabled="disabled" value="<? echo $userid ?>" >
							</div>
						</div><input type="hidden" name="userid" id="userid" value="<? echo $userid ?>">
						<div class="control-group">
							<label for="inputusername" class="control-label"><? echo $l_username ?></label>
							<div class="controls">
								<input type="text" name="inputusername" id="inputusername" required="required" class="input-medium" disabled="disabled" value="<? echo $username ?>" >
							</div>
						</div>
						<div class="control-group">
							<label for="checkresetpass" class="control-label"><? echo $l_resetpass ?></label>
							<div class="controls">
								<label class="checkbox">
  									<input type="checkbox" value="resetpass" name="checkresetpass" id="checkresetpass">Reset password to 'initial'</label>
							</div>
						</div>
						<div class="control-group">
							<label for="inputlevel" class="control-label"><? echo $l_level ?></label>
							<div class="controls">
								<?
									echo "<select name='inputlevel' id='inputlevel' class='input-medium'>";
									foreach($levellist as $f){        
											echo "<option value=".$f->level_no;
											if($level == $f->level_no){
												echo " selected";
											}
											echo ">" .$f->level_name . "</option>";
									}
									echo "</select>";
								?>
							</div>
						</div>
						
						<? if ( $teacherid <> '' ){ ?>
						<div class="control-group">
							<label for="inputteacherid" class="control-label"><? echo $l_teacherid ?></label>
							<div class="controls">
								<input type="text" name="inputteacherid" id="inputteacherid" class="input-small" required="required" maxlength="5" disabled="disabled" value="<? echo $teacherid ?>">
								<span class="help-inline"><? if($teachername <> ''){ echo "Name : ".$teachername; } if($teachersname <> ''){ echo " Surname : ".$teachersname; } ?></span>
							</div>
						</div>	
						<? } ?>	
						<div class="control-group">
							<label for="selectstatus" class="control-label"><? echo $l_status ?></label>
							<div class="controls">
								<select class="input-small" name="selectstatus" id="selectstatus">
  									<option value="1" <? if( $status == '1' ){ echo "selected"; }  ?> >Active</option>
  									<option value="2" <? if( $status == '2' ){ echo "selected"; }  ?> >Inactive</option>
								</select>							
							</div>
						</div>	
						<div class="form-actions">
							<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Edit User" type="submit"/>
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