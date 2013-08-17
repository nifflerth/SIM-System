<?PHP
    
    function parse_kobkid($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $main_content = $html->find('th[colspan=2] a');
		
	    if(!empty($main_content)){
	    
		$fComment = $html->find('.data');
		$comment = COUNT($fComment) -1;
		
		$error = "ok"; 
	    }else{
		$error = "dead";
	    }
	} 
               
        $html->clear();
	unset($html);
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>