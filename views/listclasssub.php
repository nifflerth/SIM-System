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
      					null,
      					{	"bSortable": false }
      					
    			]
			}); 
		}
	); 
	
	function add_course () {
	    var form = document.createElement('form');
	    form.setAttribute('method', 'post');
	    form.setAttribute('action', '<?=base_url('index.php');?>/course/add_subject/<?=$classid?>/<?=$year?>');
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
	?>	<!--end sidebar--><!--end sidebar-->
<!-- BODY -->
	<div class="container-fluid">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-head">
							<h3>List Subject</h3>
						</div>
						<div class="box-content box-nomargin">
							<div class="wizard">
								<h4>Class year <?=$year; ?> <a class='btn pull-right' onclick="add_course();" name='add_course' id='add_course'>Add Subject</a></h4>
							</div>
							<input type="hidden" name="class_year" id="class_year" value="<? echo $classid ?>">
							<div class="tab-content">
								<div class="tab-pane active" id="basic">
							
									<table id="subject_table" class='table table-striped dataTable table-bordered'> 
										<thead> 
											<tr>
												<th>ภาคการศึกษา</th><th>Subject Code</th><th>Subject Name</th><th>Subject Group</th><th>Credit</th><th>Status</th><th>Description</th>
											</tr> 
										</thead> 
										<tbody>
										<?
											foreach($subject as $f){  
												echo "<tr>";
												echo "<td>".$f->part."</td>";      
												echo "<td>".$f->subject_code."</td>";
												echo "<td>".$f->subject_name."</td>";
												echo "<td>".$f->group_name."</td>";
												echo "<td>".$f->credit."</td>";
												echo "<td>";
												if($f->status == 1){echo "Active";}else if($f->status == 2){echo "Inactive";}
												echo "</td>";
												echo "<td>".$f->description."</td>";
																							}
										?>
										</tbody>
										<tfoot>
											<tr>
												<th>ภาคการศึกษา</th><th>Subject Code</th><th>Subject Name</th><th>Subject Group</th><th>Credit</th><th>Status</th><th>Description</th>
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