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
<link rel="stylesheet" href="<?=site_url("/css/bootstrap.datepicker.css") ?>">

<script src="<?=site_url("/js/json.js") ?>"></script>
<script src="<?=site_url("/js/jquery.js") ?>"></script>
<script type="text/javascript" charset="utf-8"> 
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = mm+'/'+dd+'/'+yyyy;

$(document).ready(function() {
   $('#inputdob_s').datepicker({
    	endDate: today,
    	keyboardNavigation: false,
    	forceParse: false,
    	autoclose: true
	});
})
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
							<h3>Add New Student</h3>
						</div>
						<div class="box-content box-nomargin">


							<? echo form_open('index.php/student/input', $formattr); ?>
								<? if($code == 'c/r'){
									echo "<div class='alert alert-error'>";
  									echo 'Class or room not found';
									echo "</div><br>";
								
								}?>
								<div class="wizard">
									<h4>Step 1 Guardian Information</h4>
								</div>
								
								<div class="control-group">
									<label for="inputfname_g" class="control-label"><? echo t_req.$l_fname_g ?></label>
									<div class="controls">
										<input type="text" name="inputfname_g" id="inputfname_g" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputfsname_g" class="control-label"><? echo t_req.$l_fsurname_g ?></label>
									<div class="controls">
										<input type="text" name="inputfsname_g" id="inputfsname_g" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputmname_g" class="control-label"><? echo t_req.$l_mname_g ?></label>
									<div class="controls">
										<input type="text" name="inputmname_g" id="inputmname_g" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputmsname_g" class="control-label"><? echo t_req.$l_msurname_g ?></label>
									<div class="controls">
										<input type="text" name="inputmsname_g" id="inputmsname_g" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputaddr_g" class="control-label"><? echo t_req.$l_address_g ?></label>
									<div class="controls">
										<input type="text" name="inputaddr_g" id="inputaddr_g" class="input-xxlarge" required="required" maxlength="255">
									</div>
								</div>
														
								<div class="wizard">
									<h4>Step 2 Student Information</h4>
								</div>
								<div class="control-group">
									<label for="selectprefix_s" class="control-label"><? echo t_req.$l_prefix_s ?></label>
									<div class="controls">
										<select name="selectprefix_s" id="selectprefix_s" required="required">
											<option value="">Select</option>
											<option value="1">ด.ช.</option>
											<option value="2">ด.ญ.</option>
											<option value="3">นาย</option>
											<option value="4">นางสาว</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="inputname_s" class="control-label"><? echo t_req.$l_name_s ?></label>
									<div class="controls">
										<input type="text" name="inputname_s" id="inputname_s" class="input-medium" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputsname_s" class="control-label"><? echo t_req.$l_sname_s ?></label>
									<div class="controls">
										<input type="text" name="inputsname_s" id="inputsname_s" class="input-medium" required="required" maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label for="inputidno_s" class="control-label"><? echo t_req.$l_inputidno_s ?></label>
									<div class="controls">
										<input type="text" name="inputidno_s" id="inputidno_s" class="input-medium" required="required" maxlength="13" data-error="Please give a correct Identify Card number." >
									</div>
								</div>
								<div class="control-group">
									<label for="inputdob_s" class="control-label"><? echo t_req.$l_dob_s ?></label>
									<div class="controls">
										<input type="text" name="inputdob_s" id="inputdob_s" class='input-small' required="required">
									</div>
								</div>
								
								<div class="control-group">
									<label for="selectnat_s" class="control-label"><? echo $l_nat_s ?></label>
									<div class="controls">
										<?
											echo "<select name='selectnat_s' id='selectnat_s'>";
											foreach($nationality as $f){        
       											echo "<option value=".$f->NATIONALITY_ID. ">" .$f->NATIONALITY_NAME . "</option>";
    										}
    										echo "</select>";
										?>
									</div>
								</div>
								<div class="control-group">
									<label for="selectrel_s" class="control-label"><? echo $l_rel_s ?></label>
									<div class="controls">
										<?
											echo "<select name='selectrel_s' id='selectrel_s'>";
											foreach($religious as $f){        
        										echo "<option value=".$f->RELIGIOUS_ID. ">" .$f->RELIGIOUS_NAME . "</option>";
    										}
    										echo "</select>";
										?>
									</div>
								</div>
								<div class="control-group">
									<label for="inputfenroll_s" class="control-label"><? echo t_req.$l_enroll_s ?></label>
									<div class="controls">
										<input type="text" name="inputfenroll_s" id="inputfenroll_s" class='datepick input-small' required="required">
									</div>
								</div>									
								<div class="control-group">
									<label for="inputlastschool_s" class="control-label"><? echo $l_lstschool_s ?></label>
									<div class="controls">
										<input type="text" name="inputlastschool" id="inputlastschool_s" class='input-square'>
									</div>
								</div>
								<div class="control-group">
									<label for="selectprovince_s" class="control-label"><? echo $l_province_s ?></label>
									<div class="controls">
										<?
											echo "<select name='selectprovince_s' id='selectprovince_s'>";
											echo "<option value=''>Please select</option>";
											foreach($provinces as $f){        
        										echo "<option value=".$f->province_id. ">" .$f->province . "</option>";
    										}
    										echo "</select>";
										?>
									</div>
								</div>
							
								<div class="wizard">
									<h4>Step 3 Class & Room</h4>
								</div>	
								<div class="control-group">
									<label for="selectclass_s" class="control-label"><? echo t_req.$l_class_s ?></label>
									<div class="controls">
										<select name="selectclass_s" id="selectclass_s" required="required">
											<option value="">Select</option>
											<option value="A01">อนุบาล 1</option>
											<option value="A02">อนุบาล 2</option>
											<option value="A03">อนุบาล 3</option>
											<option value="P01">ประถมศึกษาที่ 1</option>
											<option value="P02">ประถมศึกษาที่ 2</option>
											<option value="P03">ประถมศึกษาที่ 3</option>
											<option value="P04">ประถมศึกษาที่ 4</option>
											<option value="P05">ประถมศึกษาที่ 5</option>
											<option value="P06">ประถมศึกษาที่ 6</option>
											<option value="M01">มัธยมศึกษาที่ 1</option>
											<option value="M02">มัธยมศึกษาที่ 2</option>
											<option value="M03">มัธยมศึกษาที่ 3</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label for="selectroom_s" class="control-label"><? echo t_req.$l_room_s ?></label>
									<div class="controls">
										<select name="selectroom_s" id="selectroom_s" required="required">
											<option value="">Select</option>
											<option value="01">Room 1</option>
											<option value="02">Room 2</option>
											<option value="03">Room 3</option>
											<option value="04">Room 4</option>
											<option value="05">Room 5</option>
											<option value="06">Room 6</option>
											<option value="07">Room 7</option>
											<option value="08">Room 8</option>
											<option value="09">Room 9</option>
										</select>
									</div>
								</div>					
													
								<div class="form-actions">
									<input class="navigation_button btn btn-danger" id="back2" value="Clear" type="reset" />
									<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Submit" type="submit" />
								</div>
							
						</div>
						<? echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
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