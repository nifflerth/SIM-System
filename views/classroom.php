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

<script src="<?=site_url("/js/jquery.js") ?>"></script>
<script src="<?=site_url("/js/jquery.dataTables.min.js") ?>"></script>
<script type="text/javascript" charset="utf-8"> 
	$(document).ready(
		function(){ 
			$('#table_id').dataTable({
			bDestroy: true
			}); 
		}
	); 
</script> 

</head>
<body>	
<table id="table_id">   
        <thead>        
            <tr>            
                <th>Column 1</th>         
                <th>Column 2</th>          
                <th>etc</th>       
            </tr>   
        </thead> 
        <tbody>  
            <tr>       
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>   
                <td>etc</td>   
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td> 
                <td>etc</td>  
           </tr>
        </tbody>
        <tfoot>
        <tr>            
                <th>Column 1</th>         
                <th>Column 2</th>          
                <th>etc</th>       
            </tr> 
        </tfoot>
    </table> 
		




</body>
<? } ?>
</html>