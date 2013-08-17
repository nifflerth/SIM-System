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
<script type="text/javascript" charset="utf-8"> 
	
	function choose_year () {
		if($("#inputyear").val() != ''){
		    var form = document.createElement('form');
		    form.setAttribute('method', 'post');
		    form.setAttribute('action', '<?=base_url('index.php');?>/course/v_class/'+$("#inputyear").val());
		    form.style.display = 'hidden';
		    document.body.appendChild(form)
		    form.submit();
	    }else{
	   	 	var form = document.createElement('form');
		    form.setAttribute('method', 'post');
		    form.setAttribute('action', '<?=base_url('index.php');?>/course/manage_class/val');
		    form.style.display = 'hidden';
		    document.body.appendChild(form)
		    form.submit();

	    }
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
	?>	<!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>Manage Class</h3>
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
							<form method="post" accept-charset="utf-8" class="form-horizontal" />
						
								<div class="wizard">
									<h4>Enter class's year to manage</h4>
								</div>
								<? if($code == 'err1'){
									echo "<div class='alert alert-warning'>";
  									echo 'Please enter class year';
									echo "</div><br>";
								}?>
								<div class="control-group">
									<label for="inputyear" class="control-label"><? echo t_req.$l_year ?></label>
									<div class="controls">
										<input type="text" name="inputyear" id="inputyear" class="input-small" required="required" maxlength="4" >
									</div>
								</div>
								<div class="form-actions">
									<input class="navigation_button btn btn-danger" id="back2" value="Clear" type="reset" />
									<input class="navigation_button btn btn-primary" type="button" value="Submit"  onclick="choose_year();"/>
								</div>			
							</form>
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