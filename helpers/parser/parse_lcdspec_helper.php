<?PHP
    
    function parse_lcdspec($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	    
	    $fComment = $html->find('div.msgBody');
	    
	    if(!empty($fComment)){ 
	    $comment = COUNT($fComment) - 1;
	    	$error = "ok"; 
	    }else{
		$error = "dead";
	    }
	    
	    $error = "ok";
	    
	    
	       
	    $html->clear();
	    unset($html);
	}
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>