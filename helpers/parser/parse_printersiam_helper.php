<?PHP
    
    function parse_printersiam($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	    
	    $main_content = $html->find('.textdefault .textboard',0);
	    if(!empty($main_content)){
		$fComment = $html->find('table[width="80%"] .textdefault');
		$comment = COUNT($fComment);
		
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