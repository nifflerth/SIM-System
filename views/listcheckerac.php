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
function handleClick(cb) {
	if ($('[name="chkac[]"]:checked').length > 3){
		cb.checked = false;
	}
}

function back_listac(){
	var form = document.createElement('form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '<?=base_url('index.php');?>/course/v_reactivity/<?=$year?>/<?=$class?>/<?=$room?>/<?=$part?>');
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
							<h3>List Required Activity</h3>
						</div>
						<div class="box-content box-nomargin">
							<? echo form_open('index.php/course/racupdate', $formattr); ?>

							<div class="wizard">
								<h4>ปีการศึกษา <?=$year?> ภาคการศึกษาที่ <?=$part?> ระดับชั้น<?=$classname?> <?=$roomname?> <a class='btn pull-right' onclick="back_listac();" name='back_listac' id='back_listac'>Back to Required Activity List</a></h4>
								
							</div>
							
							<? if($code == 'err'){
									echo "<div class='alert alert-warning'>";
  									echo 'Please select 3 activities';
									echo "</div><br>";
								}?>

								
							<div style="text-indent:20px;">Please select 3 required activities</div>
							

							<input type="hidden" name="classid" id="classid" value="<? echo $classid ?>">
							<input type="hidden" name="year" id="year" value="<? echo $year ?>">
							<input type="hidden" name="class" id="class" value="<? echo $class ?>">
							<input type="hidden" name="room" id="room" value="<? echo $room ?>">
							<input type="hidden" name="part" id="part" value="<? echo $part ?>">
							<div class="control-group">
								
									<table class="table table-condensed">
									<?
										foreach($aclist as $f){  
											echo "<tr><td><input type='checkbox' onclick='handleClick(this);' name='chkac[]' id='chkac[]'";
											foreach($activity as $a){
												if($a->activity_id == $f->activity_id){
													echo " checked ";
												}
											}
											echo "value='".$f->activity_id."'> ".$f->activity_name."</tr></td>";     
											
										}
									?>
									</table>
								
							</div>
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