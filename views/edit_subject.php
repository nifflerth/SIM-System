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
	?>	
<!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Edit Subject</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/subject/edit_input', $formattr); ?>
						<div class="wizard">
							<h4>Subject Information</h4>
						</div>
						<? if($match == 'succeed'){
									echo "<div class='alert alert-success'>";
  									echo 'Subject modified successfully';
									echo "</div><br>";
						}?>

						<input type="hidden" name="subjectid" id="subjectid" value="<? echo $id ?>">
						<div class="control-group">
							<label for="inputcode" class="control-label"><? echo $l_code ?></label>
							<div class="controls">
								<input type="text" name="inputcode" id="inputcode" required="required" class="input-small" disabled="disabled" value="<? echo $code ?>" >
							</div>
						</div>
						
						<div class="control-group">
							<label for="inputgroup" class="control-label"><? echo $l_grp ?></label>
							<div class="controls">
								<?
									echo "<select name='inputgroup' id='inputgroup'>";
									foreach($subjectgroup as $f){        
    									echo "<option value=".$f->group_id;
    									if ($f->group_id == $group){
    										echo " selected ";
    									}
    									echo ">" . $f->group_name . "</option>";
									}

									echo "</select>";
								?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputtype" class="control-label"><? echo $l_grp ?></label>
							<div class="controls">
								<?
									echo "<select name='inputtype' id='inputtype' >";
									foreach($subjecttype as $f){        
    									echo "<option value=".$f->subject_type;
    									if ($f->subject_type == $type){
    										echo " selected ";
    									}
    									echo ">" . $f->type_name . "</option>";
									}

									echo "</select>";
								?>
							</div>
						</div>
						<div class="control-group">
							<label for="inputclass" class="control-label"><? echo $l_subclass ?></label>
							<div class="controls">
								<input type="text" name="inputclass" id="inputclass" required="required" class="input-medium" disabled="disabled" value="<? echo $class ?>" >	
							</div>						
						</div>
						<div class="control-group">
							<label for="inputname" class="control-label"><? echo $l_name ?></label>
							<div class="controls">
								<input type="text" name="inputname" id="inputname" required="required" class="input-xlarge" disabled="disabled" value="<? echo $name ?>" >	
							</div>						
						</div>
						<div class="control-group">
							<label for="inputcredit" class="control-label"><? echo $l_credit ?></label>
							<div class="controls">
								<input type="text" name="inputcredit" id="inputcredit" required="required" class="input-small" disabled="disabled" value="<? echo $credit ?>" >
							</div>
						</div>
						<div class="control-group">
							<label for="inputdesc" class="control-label"><? echo $l_desc ?></label>
							<div class="controls">
								<input type="text" name="inputdesc" id="inputdesc" class="input-xlarge" value="<? echo $desc ?>" >
							</div>
						</div>
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