<?PHP
    
    function parse_vmodtech($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    
	    $error = "tag comment ดึงไม่ได้";
	    
	} 
               
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>