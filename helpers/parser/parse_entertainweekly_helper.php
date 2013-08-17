<?PHP
    
    function parse_entertainweekly($fetch,$url = NULL){
        
	
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	    
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('.pre_content table[width=610] td[width=99]',0);
	     if(!empty($title)){
		
		$view = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fView->plaintext));
		$view = preg_replace("/[^0-9]/","",$view);
		 
		$fComment = $html->find('.pre_content table[width=610] td[width=93]',0);
		$comment = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fComment->plaintext));
		$comment = preg_replace("/[^0-9]/","",$comment);
        
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