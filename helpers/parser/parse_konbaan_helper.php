<?PHP
    
    function parse_konbaan($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	   $main_content = $html->find('td.font_web',0);
		
	    if(!empty($main_content)){
	    
		$fComment = $html->find('table[width=100%] .font_web');
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