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
<script src="<?=site_url("/js/jquery-ui-1.8.22.custom.min.js") ?>"></script>
<script type="text/javascript" charset="utf-8"> 
	
	$(document).ready(function(){ 
		$("#search").keyup(function(){
			document.getElementById("teacherid").value = ''; 
			if($("#search").val().length>0){ 
				
				$.ajax({ 	type: "post", 
							url: "<?=base_url();?>index.php/course/getResult/"+$("#search").val(), 
							cache: false,	 
							data:'search='+$("#search").val(), 
							success: function(response){ 
								
								$('#finalResult').html(""); 
								var obj = JSON.parse(response); 
								
								if(obj.length>0){ 
									
									try{ 
										var items = []; 
										var elements = [];

										$.each(obj, function(i,val){	 
											
											$("#finalResult").append("<li><a href=# onclick=select("+val.teacher_id+",'"+val.teacher_name+"','"+val.teacher_surname+"');><span class='tab'>"+val.teacher_name+ " " + val.teacher_surname +"</span></a></li>");
											
										});	
						
										
										document.getElementById("finalResult").style.display = '';
										
									}catch(e){	 
										alert(e); 
									}	 
								}else{ 
									$('#finalResult').html($('<li/>').text("No Data Found"));	 
								}	 
							}, 
							error: function(){	 
								alert('Error while request..'); 
							} 
						}); 
			}else
				return false; 
			
		});
		 
	});
	
	function select(teacher_id,name,surname){
		document.getElementById("finalResult").style.display = 'none';
		document.getElementById("search").value = name+" "+surname;
		document.getElementById("teacherid").value = teacher_id;
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
							<h3>Edit Class</h3>
						</div>
						<div class="box-content box-nomargin">
						<? echo form_open('index.php/course/edit_input', $formattr); ?>
						<div class="wizard">
							<h4>Class Information</h4>
						</div>
						<? if($exist == 'err'){
								echo "<div class='alert alert-error'>";
									echo 'Invalid Teacher Information';
								echo "</div><br>";
							}else if($exist == 'err1'){ 
								echo "<div class='alert alert-error'>";
									echo 'Invalid Class Information';
								echo "</div><br>";
							}else if($exist == 'succeed'){
								echo "<div class='alert alert-success'>";
									echo 'Class mofify successfully';
								echo "</div><br>";
							
							}?>
						<input type="hidden" name="classid" id="classid" value="<? echo $classid ?>">
						<div class="control-group">
							<label for="inputyear" class="control-label"><? echo $l_year ?></label>
							<div class="controls">
								<input type="text" name="inputyear" id="inputyear" required="required" class="input-small" disabled="disabled" value="<? echo $year ?>" >
							</div>
						</div>
						<div class="control-group">
							<label for="inputclass" class="control-label"><? echo $l_class ?></label>
							<div class="controls">
								<input type="text" name="inputclass" id="inputclass" required="required" class="input-small" disabled="disabled" value="<? echo $class ?>" >
							</div>
						</div>
						<div class="control-group">
							<label for="inputroom" class="control-label"><? echo $l_room ?></label>
							<div class="controls">
								<input type="text" name="inputroom" id="inputroom" required="required" class="input-small" disabled="disabled" value="<? echo $room ?>" >
							</div>
						</div>
						<div class="control-group">
							<label for="inputteacher" class="control-label"><? echo $l_teacher ?></label>
							<div class="controls">
								<input type="text" name="search" id="search" class='input-xlarge' required="required" placeholder="Please enter a teacher's name to search.">						
								<ul id="finalResult" style="display:none"></ul>
							</div>
						</div>
						<input type="hidden" name="teacherid" id="teacherid" value="">	
	
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