<?PHP
    
    function parse_pooyingnaka($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('td[width=660] span.blackbold',0);
			
	    if(!empty($fPost)){ 

		$fComment = $html->find('td[width=660] table[width=100%] span.pinkdarkbold');
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