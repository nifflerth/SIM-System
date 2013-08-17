<?PHP
    
    function parse_thaihealth($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fTitle = $html->find('.entry-title',0);
			
	    if(!empty($fTitle)){  
		    
		$fComment = $html->find('#commentlist .comment-author');
		if(!empty($fComment)){
			
			$comment = COUNT($fComment);
		}
    
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