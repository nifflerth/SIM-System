<?PHP
    
    function parse_smethailandclub($fetch,$url = NULL){
        
	$view = 0;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fComment = $html->find('table[id^=item_]');
	    $comment = COUNT($fComment);
		$view = '-1';
	    $error = "ok"; 
	    /*
	    if(!empty($fComment)){
		$comment = COUNT($fComment);
		
		$error = "ok"; 
	    }else{
		$error = "dead";
	    }*/
		$html->clear();
	unset($html);
	    
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
	
		}
	}
?>