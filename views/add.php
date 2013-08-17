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
<div class="topbar">
	<div class="container-fluid">
		<a href="dashboard.html" class='company'>SIM Systems</a>
		<ul class='mini'>
			</li>
			<li>
				<a href="index.html">
					<img src="<?=site_url("img/icons/fugue/control-power.png") ?>" alt="">
					Logout
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="breadcrumbs">
	<div class="container-fluid">
		<ul class="bread pull-left">
			<li>
				<a href="<?=base_url('index.php');?>/dashboard"><i class="icon-home icon-white"></i></a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/add">
					New Students
				</a>
			</li>
		</ul>

	</div>
</div>
<div class="main">
	<div class="navi">
		<ul class='main-nav'>
			<li>
				<a href="<?=base_url('index.php');?>/dashboard" class='light'>
					<div class="ico"><i class="icon-home icon-white"></i></div>
					Home
				</a>
			</li>
			<li class='active'>
				<a href="<?=base_url('index.php');?>/add" class='light'>
					<div class="ico"><i class="icon-list icon-white"></i></div>
					New Students
				</a>
			</li>
			<li>
				<a href="#" class='light toggle-collapsed'>
					<div class="ico"><i class="icon-tasks icon-white"></i></div>
					Search
					<img src="<?=site_url("img/toggle-subnav-down.png") ?>" alt="">
				</a>
				<ul class='collapsed-nav closed'>
					<li>
						<a href="<?=base_url('index.php');?>/search">
							Search By Student ID
						</a>
					</li>
					<li>
						<a href="<?=base_url('index.php');?>/search">
							Search By Class & Room
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					List Subjects
				</a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Add Scores
				</a>
			</li>
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Prints
				</a>
			</li>	
			<li>
				<a href="<?=base_url('index.php');?>/subject" class='light'>
					<div class="ico"><i class="icon-th-large icon-white"></i></div>
					Systems
				</a>
			</li>								
		</ul>
	</div>
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
							<div class="modal hide" id="myModal2">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">×</button>
							    <h3>Success</h3>
							  </div>
							  <div class="modal-body">
							    <p>Wizard was submit!</p>
							  </div>
							  <div class="modal-footer">
							    <a href="#" class="btn btn-primary" data-dismiss="modal">Ok, thanks!</a>
							  </div>
							</div>
							
							<? echo form_open('index.php/add', $formattr); ?>
							<!--<form method="post" action="forms.html" class='form-horizontal bbq wizard'>-->
								<div class="step" id="step1">
									<ul class="steps">
										<li class="active">
											Step 1
											<span>Guardian Information</span>
										</li>
										<li>
											Step 2
											<span>Student Information</span>
										</li>
										<li>
											Step 3
											<span>Class & Room</span>
										</li>
									</ul>
									<h4>Step 1 Guardian Information</h4>
							
									<!--<div class="control-group">
										<label for="search" class="control-label">Search by surname</label>
										<div class="controls">
											<input class="input-large search-query" name="search" id="search" type="text" placeholder="Enter a guardian's surname"><span class="help-inline">Exist guardian</span>	
											<ul id="finalResult"></ul>										
										</div>
									</div>-->
									<div class="control-group">
										<label for="inputName_G" class="control-label">Name</label>
										<div class="controls"><input type="text" name="inputName_G" id="inputName_G" required="required" maxlength="50">
										</div>
									</div>
									<div class="control-group">
										<label for="inputSName_G" class="control-label">Surname</label>
										<div class="controls">
											<input type="text" name="inputSName_G" id="inputSName_G" required="required" maxlength="50">
										</div>
									</div>
									<div class="control-group">
										<label for="inputAddress_G" class="control-label">Address</label>
										<div class="controls">
											<input type="text" name="inputAddress_G" id="inputAddress_G" class="input-xxlarge" required="required" maxlength="255">
										</div>
									</div>
									<div class="control-group">
										<label for="inputTel_G" class="control-label">Telephone number</label>
										<div class="controls">
											<input type="text" name="inputTel_G" id="inputTel_G" required="required" class="input-medium"
                    						pattern="[0-9]" data-error="Please give a correct telephone number." maxlength="15">
										</div>
									</div>
									<div class="control-group">
										<label for="inputEmail_G" class="control-label">E-mail address</label>
										<div class="controls">
											<input type="email" name="inputEmail_G" id="inputEmail_G" class="input-medium"
                    						data-error="Please give a correct e-mail address." maxlength="50">
										</div>
									</div>
								</div>
								<div class="step" id="step2">
									<ul class="steps">
										<li>
											Step 1
											<span>Guardian Information</span>
										</li>
										<li class="active">
											Step 2
											<span>Student Information</span>
										</li>
										<li>
											Step 3
											<span>Class & Room</span>
										</li>
									</ul>
									<h4>Step 2 Student Information</h4>
									<div class="control-group">
										<label for="selectPrefix_S" class="control-label">Prefix</label>
										<div class="controls">
											<select name="selectPrefix_S" id="selectPrefix_S" required="required">
												<option value="">Select</option>
												<option value="1">ด.ช.</option>
												<option value="2">ด.ญ.</option>
												<option value="3">นาย</option>
												<option value="4">นางสาว</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="inputName_S" class="control-label">Name</label>
										<div class="controls">
											<input type="text" name="inputName_S" id="inputName_S" class="input-medium" required="required" maxlength="50">
										</div>
									</div>
									<div class="control-group">
										<label for="inputSName_S" class="control-label">Surname</label>
										<div class="controls">
											<input type="text" name="inputSName_S" id="inputSName_S" class="input-medium" required="required" maxlength="50">
										</div>
									</div>
									<!--<div class="control-group">
										<label for="inputStudentID_S" class="control-label">Student ID</label>
										<div class="controls">
											<!--<input type="text" name="inputStudentID_S" id="inputStudentID_S" class='required' placeholder="Student ID">
											<span class="input-medium uneditable-input">Student ID</span>
										</div>
									</div>-->
									<div class="control-group">
										<label for="inputIDNO_S" class="control-label">Identify Card No</label>
										<div class="controls">
											<input type="text" name="inputIDNO_S" id="inputIDNO_S" class="input-medium" required="required" maxlength="13" pattern="[0-9]" data-error="Please give a correct Identify Card number." >
										</div>
									</div>
									<div class="control-group">
										<label for="inputDOB" class="control-label">Date of Birth</label>
										<div class="controls">
											<input type="text" name="inputDOB" id="inputDOB" class='datepick input-small' required="required">
										</div>
									</div>
									<div class="control-group">
										<label for="radio" class="control-label">Gender</label>
										<div class="controls">
											<label class="radio"><input type="radio" name="radio" id="radio">Male</label>
											<label class="radio"><input type="radio" name="radio">Female</label>
										</div>
									</div>
									<div class="control-group">
										<label for="selectNAT_S" class="control-label">Nationality</label>
										<div class="controls">
											<?
												echo "<select name='selectNAT_S' id='selectNAT_S'>";
												foreach($nationality as $f){        
        											echo "<option value=".$f->NATIONALITY_ID. ">" .$f->NATIONALITY_NAME . "</option>";
    											}
    											echo "</select>";
											?>
										</div>
									</div>
									<div class="control-group">
										<label for="selectRel_S" class="control-label">Religious</label>
										<div class="controls">
											<?
												echo "<select name='selectRel_S' id='selectRel_S'>";
												foreach($religious as $f){        
        											echo "<option value=".$f->RELIGIOUS_ID. ">" .$f->RELIGIOUS_NAME . "</option>";
    											}
    											echo "</select>";
											?>
										</div>
									</div>
									<div class="control-group">
										<label for="inputFEnroll" class="control-label">First Enroll Date</label>
										<div class="controls">
											<input type="text" name="inputFEnroll" id="inputFEnroll" class='datepick input-small' required="required">
										</div>
									</div>									
									<div class="control-group">
										<label for="inputLastSchool" class="control-label">Last School</label>
										<div class="controls">
											<input type="text" name="inputLastSchool" id="inputLastSchool" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="selectProvince" class="control-label">Province</label>
										<div class="controls">
											<?
												echo "<select name='selectProvince' id='selectProvince'>";
												foreach($provinces as $f){        
        											echo "<option value=".$f->province_id. ">" .$f->province . "</option>";
    											}
    											echo "</select>";
											?>
										</div>
									</div>
									<!--<div class="control-group">
										<label for="basic" class="control-label">Last Class</label>
										<div class="controls">
											<input type="text" name="datepicker" id="datepicker" class='datepick'>
										</div>
									</div>-->
								</div>
								<div class="step" id="step3">
									<ul class="steps">
										<li>
											Step 1
											<span>Guardian Information</span>
										</li>
										<li>
											Step 2
											<span>Student Information</span>
										</li>
										<li class="active">
											Step 3
											<span>Class & Room</span>
										</li>
									</ul>
									<h4>Step 3 Class & Room</h4>
									<div class="control-group">
										<label for="selectClass_S" class="control-label">Class</label>
										<div class="controls">
											<select name="selectClass_S" id="selectClass_S" required="required">
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
										<label for="selectRoom_S" class="control-label">Room</label>
										<div class="controls">
											<select name="selectRoom_S" id="selectRoom_S" required="required">
												<option value="">Select</option>
												<option value="1">Room 1</option>
												<option value="2">Room 2</option>
												<option value="3">Room 3</option>
												<option value="4">Room 4</option>
												<option value="5">Room 5</option>
												<option value="6">Room 6</option>
												<option value="7">Room 7</option>
												<option value="8">Room 8</option>
												<option value="9">Room 9</option>
											</select>
										</div>
									</div>	
								</div>
								<div id="navigation2">
									<div class="form-actions">
									<div class="buttons">
            							<?php echo form_submit( 'submit', 'Submit' ); ?>
        							</div>
										<input class="navigation_button btn btn-danger" id="back2" value="Back" type="reset" />
										<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Submit" type="submit" />
									</div>
								</div>
							<? echo form_close(); ?>

							<!--</form>-->
						</div>
					</div>
				</div>
			</div>

			<!--<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>New Student</h3>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
								<fieldset>
									<legend>Student Information</legend>
									<div class="control-group">
										<label for="basic" class="control-label">Name</label>
										<div class="controls">
											<input type="text" name="name" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="basicround" class="control-label">Surname</label>
										<div class="controls">
											<input type="text" name="surname" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="password" class="control-label">Student ID</label>
										<div class="controls">
											<input type="text" name="student_id" id="password" class='required' maxlength="5">
										</div>
									</div>
									<div class="control-group">
										<label for="placeholder" class="control-label">Identify Card No</label>
										<div class="controls">
											<input type="text" name="id_card" id="placeholder" class='required' maxlength="13">
										</div>
									</div>
									<div class="control-group">
										<label for="icon" class="control-label">Date of Birth</label>
										<div class="controls">
											<input type="text" name="datepicker" id="datepicker" class='datepick'>
										</div>
									</div>
									<div class="control-group">
										<label for="radio" class="control-label">Gender</label>
										<div class="controls">
											<label class="radio"><input type="radio" name="radio" id="radio">Male</label>
											<label class="radio"><input type="radio" name="radio">Female</label>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Nationality</label>
										<div class="controls">
											<select name="select" id="select">
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Religious</label>
										<div class="controls">
											<select name="select" id="select">
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="basic" class="control-label">First Enroll</label>
										<div class="controls">
											<input type="text" name="datepicker" id="datepicker" class='datepick'>
										</div>
									</div>									
									<div class="control-group">
										<label for="basic" class="control-label">Last School</label>
										<div class="controls">
											<input type="text" name="last_school" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="basic" class="control-label">Province</label>
										<div class="controls">
											<input type="text" name="province_last_school" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="basic" class="control-label">Last Class</label>
										<div class="controls">
											<input type="text" name="datepicker" id="datepicker" class='datepick'>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
								<fieldset>
									<legend>Family Information</legend>
									<div class="control-group">
										<label for="basic" class="control-label">Father Name</label>
										<div class="controls">
											<input type="text" name="f_name" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="basicround" class="control-label">Mother Name</label>
										<div class="controls">
											<input type="text" name="m_name" id="basic" class='input-square'>
										</div>
									</div>
									<div class="control-group">
										<label for="grid6" class="control-label">Address</label>
										<div class="controls">
											<input type="text" name="grid" id="grid6" class='span6 input-square'>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="box-content">
							<form action="#" class="form-horizontal">
								<fieldset>
									<legend>Class & Room Details</legend>
									<div class="control-group">
										<label for="select" class="control-label">Class</label>
										<div class="controls">
											<select name="select" id="select">
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Room</label>
										<div class="controls">
											<select name="select" id="select">
												<option value="1">Option-1</option>
												<option value="2">Option-2</option>
												<option value="3">Option-3</option>
												<option value="4">Option-4</option>
												<option value="5">Option-5</option>
											</select>
										</div>
									</div>	
								<div class="form-actions">
									<button class="btn btn-primary" type="submit">Add</button>
								</div>																	
								</fieldset>
							</form>
						</div>							
					</div>
				</div>
			</div>-->


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