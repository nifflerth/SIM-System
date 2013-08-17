<?PHP
    
    function parse_coffeemade($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('.content .h1',0);
		 
	    if(!empty($fView)){  
		    
		    $fComment = $html->find('div[align=center] table[width=700]');
		    $comment =  COUNT($fComment) - 3;
		    
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