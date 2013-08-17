<?PHP
    
    function parse_mxphone($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('#main-content .page-title',0);
			
	    if(!empty($fPost)){  
		    $fView = $html->find('.metadata .total-read',0);
		    $view = trim($fView->plaintext);
		    
		    $fComment = $html->find('.metadata .total-comment',0);
		    $comment = trim($fComment->plaintext);
		    
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