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
	
	function back_class(){
		var form = document.createElement('form');
		    form.setAttribute('method', 'post');
		    form.setAttribute('action', '<?=base_url('index.php');?>/course/v_class/<?=$year?>');
		    form.style.display = 'hidden';
		    document.body.appendChild(form)
		    form.submit();
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
							<h3>Create Class</h3>
						</div>
						<div class="box-content box-nomargin">
							
							<div class="wizard">
								<h4>Class Information  <a class='btn pull-right' onclick="back_class();" name='back_class' id='back_class'>Back to class list</a></h4>
							</div>
							<? echo form_open('index.php/course/inputclass', $formattr); ?>
							
							<? if($exist == 'err'){
									echo "<div class='alert alert-error'>";
  									echo 'Invalid Teacher Information';
									echo "</div><br>";
								}else if($exist == 'err1'){ 
									echo "<div class='alert alert-error'>";
  									echo 'Class already created';
									echo "</div><br>";
								}else if($exist == 'succeed'){
									echo "<div class='alert alert-success'>";
  									echo 'Class create successfully';
									echo "</div><br>";
								
								}?>
							
							<div class="control-group">
								<label for="inputyear" class="control-label"><? echo $l_year ?></label>
								<div class="controls">
									<input type="text" class='input-small' disabled="disabled" required="required" value="<?=$year?>">
								</div>
							</div>
							<input type="hidden" name="inputyear" id="inputyear" value="<?=$year?>">
							<div class="control-group">
								<label for="selectclass" class="control-label"><? echo $l_class ?></label>
								<div class="controls">
									<select name="selectclass" id="selectclass" required="required">
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
								<label for="selectroom" class="control-label"><? echo $l_room ?></label>
								<div class="controls">
									<select name="selectroom" id="selectroom" required="required">
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
<script src="<?=site_url("/js/jquery.form.wizard-min.js") ?>"></script>
<script src="<?=site_url("/js/custom.js") ?>"></script>



</body>
<? } ?>
</html>