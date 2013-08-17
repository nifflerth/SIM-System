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
<script src="<?=site_url("/js/jquery-ui-1.8.22.custom.min.js") ?>"></script>
<SCRIPT language="javascript">

	function addRow(tableID) {
		var subject_name = '';
		var subject_id = '';
		$.ajax({ 	type: "post", 
					url: "<?=base_url();?>index.php/course/getSubject/<?=$classclass?>/"+$("#inputsubject").val(), 
					cache: false,	 
					data:'search='+$("#inputsubject").val(), 
					success: function(response){ 
						var obj = JSON.parse(response); 
						
						if(obj.length>0){ 
							
							try{ 
	
								$.each(obj, function(i,val){
									subject_name = val.subject_name;
									subject_id = val.subject_id;
								});	
									
								var table = document.getElementById(tableID);
						        var rowCount = table.rows.length;
						        var row = table.insertRow(rowCount);
								var cell1 = row.insertCell(0);
						        var element1 = document.createElement("input");
						        element1.type 	= "button";
						        element1.name	= "delete[]";
						        element1.value  = "Remove";
						        element1.onclick = function(){deleteRow('dataTable',rowCount)};
						        cell1.appendChild(element1);
						        
						        var cell2 = row.insertCell(1);
						        var element2 = document.createElement("input");
					            element2.type = "text";
					            element2.name = "id[]";
					            element2.value = subject_id;
					            cell2.appendChild(element2)
					            cell2.style.display = 'none';
						        
						        var cell3 = row.insertCell(2);
						        cell3.innerHTML = $("#inputsubject").val();
						
						        var cell4 = row.insertCell(3);
						        cell4.innerHTML = subject_name;		
						        
						     
					    
					            var cell5 = row.insertCell(4);
						        var element3 = document.createElement("input");
					            element3.type = "text";
					            element3.name = "rownum[]";
					            element3.value = rowCount;
					            cell5.appendChild(element3)
					           	cell5.style.display = 'none';	        
												
							}catch(e){	 
								alert(e); 
							}	 
						}
						document.getElementById("inputsubject").value = ''; 
					}, 
					error: function(){	 
						alert('Error while request..'); 
					} 
		});    
		
		     
	}
	
	function deleteRow(tableID,rowNumber) {
		try {
						
           	var table = document.getElementById(tableID);
        	
        	var rowCount = table.rows.length;
        	
        	for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var rowNum = row.cells[4].childNodes[0];
                if(null != rowNum && rowNumber == rowNum.value) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
       	}catch(e){
             alert(e);
        }
	}
	
	function back_course(){
		var form = document.createElement('form');
		    form.setAttribute('method', 'post');
		    form.setAttribute('action', '<?=base_url('index.php');?>/course/v_course_class/<?=$year?>/<?=$classcode?>/<?=$roomcode?>');
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
							<h3>Add Subject</h3>
						</div>
						<div class="box-content box-nomargin">
							
							<div class="wizard">
								<h4>Course Information <a class='btn pull-right' onclick="back_course();" name='back_course' id='back_course'>Back to course</a></h4>
							</div>
							<? echo form_open('index.php/course/inputcourse', $formattr); ?>
							
							<? if($row <> ''){
									echo "<div class='alert alert-success'>";
  									echo $row.' subject(s) inserted successfully';
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
									<input type="text" class='input-small' disabled="disabled" required="required" value="<?=$class?>">
								</div>
							</div>
							<div class="control-group">
								<label for="selectroom" class="control-label"><? echo $l_room ?></label>
								<div class="controls">
									<input type="text" class='input-small' disabled="disabled" required="required" value="<?=$room?>">
								</div>
							</div>
							
							<div class="control-group">
									<label for="selectpart" class="control-label"><? echo $l_part ?></label>
									<div class="controls">
										<select name="selectpart" id="selectpart" required="required">
											<option value="1">ภาคเรียนที่ 1</option>
											<option value="2">ภาคเรียนที่ 2</option>
										</select>
									</div>
								</div>
												
							<div class="control-group">
								<label for="inputsubject" class="control-label"><? echo $l_search_sub ?></label>
								<div class="controls">
									<div class="input-append">
										<input type="text" id="inputsubject" id="inputsubject" class='input-medium'>
										<button class="btn" type="button" onclick="addRow('dataTable');" >Add</button>
									</div>
								</div>
							</div>	
							

							 <div class="control-group">
							 <div class="controls">
    						<!--INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" /-->				
							<TABLE id="dataTable" border="1" class="table table-striped table-bordered">
								<tr><td width="65px" align="center">Delete</td><td style="display:none;">ID</td><td width="100px" align="center">Subject Code</td><td width="350px" align="center">Subject Name</td><td style="display:none;">rowNum</td></tr>
						    </TABLE>
						    </div>
						    </div>
						    <input type="hidden" name="classid" id="classid" value="<?=$classid?>">
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