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
<link rel="stylesheet" href="<?=site_url("/css/jquery.dataTables.css") ?>">

<script src="<?=site_url("/js/json.js") ?>"></script>
<script src="<?=site_url("/js/jquery.js") ?>"></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?>"></script>
<script type="text/javascript" charset="utf-8"> 
	$(document).ready(
		function(){ 
			$('#subject_table').dataTable({
				"bInfo": false,
				"bPaginate": false,
				"bFilter": false,
				"aoColumns": [
   						{ "sWidth": "100px" },
      					{ "sWidth": "100px" },
      					null,
						null,
						{ "sWidth": "230px",
      					  "bSortable": false }
    			]
			}); 
		}
	); 
	
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
							<h3>Student List</h3>
						</div>
						<div class="box-content box-nomargin">
							<? echo form_open('index.php/course/facupdate', $formattr); ?>
							<div class="wizard">
								<h4>ปีการศึกษา <?=$year?> ภาคการศึกษาที่ <?=$part?> ระดับชั้น<?=$classname?> <?=$roomname?></h4>
							</div>
							<? if($result <> '' and $result > 0){
									echo "<div class='alert alert-success'>";
  									echo 'Free Activities are updated';
									echo "</div><br>";
								
								}?>

							<input type="hidden" name="classid" id="classid" value="<? echo $classid ?>">
							<input type="hidden" name="part" id="part" value="<? echo $part ?>">
							<input type="hidden" name="class" id="class" value="<? echo $class ?>">
							<input type="hidden" name="room" id="room" value="<? echo $room ?>">
							<input type="hidden" name="year" id="year" value="<? echo $year ?>">
							<table id="subject_table" class='table table-striped dataTable table-bordered'> 
								<thead> 
									<tr>
										<th>Student ID</th><th>Prefix</th><th>Student Name</th><th>Student Surname</th><th>Free Activity</th>
									</tr> 
								</thead> 
								<tbody>
									<?
										foreach($activity as $f){  
											echo "<tr>";   
											echo "<td>".$f->student_id;
											echo "<input type='hidden' name='student_id[]' id='student_id[]' value='".$f->student_id."'>";
											echo "</td>";   
											echo "<td>".$f->name_full."</td>";
											echo "<td>".$f->student_name."</td>";
											echo "<td>".$f->student_surname."</td>";
											
											echo "<td>";
											echo "<select name='selectac[]' id='selectac[]' class='input-xlarge'>";
											echo "<option value=''>Please select</option>";
											foreach($aclist as $g){        
        										echo "<option value=".$g->activity_id;
        										if($g->activity_id == $f->activity_id){
        											echo " selected ";
        										}
        										echo ">" .$g->activity_name . "</option>";
    										}
    										echo "</select>";
											echo "</td>";
											echo "</tr>";
										}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Student ID</th><th>Prefix</th><th>Student Name</th><th>Student Surname</th><th>Free Activity</th>
									</tr>
								</tfoot>
							</table>
							<div class="form-actions">
									<input class="navigation_button btn btn-danger" id="reset" value="Clear" type="reset" />
									<input class="navigation_button btn btn-primary" id="submit" name="submit" value="Update Activity" type="submit" />
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
<script src="<?=site_url("/js/custom.js") ?>"></script>
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



</body>
<? } ?>
</html>