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
				"aoColumns": [
   						null,
      					null,
      					null,
      					null,
      					null,
      					{ 	"sWidth": "80px",
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
							<h3>List Teacher</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="tab-content">
							<div class="tab-pane active" id="basic">
								<table id="subject_table" class='table table-striped dataTable table-bordered'> 
									<thead> 
										<tr>
											<th>Prefix</th><th>Name</th><th>Surname</th><th>Gender</th><th>Status</th><th>Process</th>
										</tr> 
									</thead> 
									<tbody>
									<?
										foreach($subject as $f){  
											echo "<tr>";      
											echo "<td>".$f->name_full."</td>";
											echo "<td>".$f->teacher_name."</td>";
											echo "<td>".$f->teacher_surname."</td>";
											echo "<td>";
											if($f->gender == 1){echo "Male";}else if($f->gender == 2){echo "Female";}
											echo "</td>";
											echo "<td>";
											if($f->status == 1){echo "Active";}else if($f->status == 2){echo "Inactive";}
											echo "</td>";
											echo "<td><a class='btn btn-mini' href='edit/".$f->teacher_id."'><i class='icon-edit'></i>Edit</a> <a class='btn btn-mini' href='view/".$f->teacher_id."'><i class='icon-search'></i>View</a></td>";
											echo "</tr>";
										}
									?>
									</tbody>
									<tfoot>
										<tr>
											<th>Prefix</th><th>Name</th><th>Surname</th><th>Gender</th><th>Status</th><th>Process</th>
										</tr>
									</tfoot>
								</table>
								</div>
							</div>
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