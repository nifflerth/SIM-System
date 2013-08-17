<?PHP
    
    function parse_executivegoclub($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('.fb_title',0);
		 
	    if(!empty($fView)){		
		    $fComment = $html->find('#fb_views .msgtitle');
		    $comment = COUNT($fComment) - 1;
    
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