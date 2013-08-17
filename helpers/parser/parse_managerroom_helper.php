<?PHP
    
    function parse_managerroom($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('span.lgText');
			
	    if(!empty($fPost)){ 
		$fComment = $html->find('td.smText span.bold');
		$comment = COUNT($fComment)-1;
		
		$error = "ok"; 
	    }else{
		$error = "dead";
	    }
	    
	    $html->clear();
	    unset($html);
	} 
               
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>