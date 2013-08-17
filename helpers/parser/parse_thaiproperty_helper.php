<?PHP
    
    function parse_thaiproperty($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $main_content = $html->find('table[width=100%] h3',0);
		
	    if(!empty($main_content)){
	    
		$fComment = $html->find('table[width=100%] table[width=100%] td[align=left] table[cellpadding=4]');
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