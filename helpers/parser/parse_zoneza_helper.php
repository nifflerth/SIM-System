<?PHP
    
    function parse_zoneza($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('#ContentLayout',0);
			
	    if(!empty($fView)){
		    
		$fComment = $html->find('.LeftTDcommentTB',0);
		if(!empty($fComment)){
			$comment = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fComment->plaintext));
			$comment = trim(str_replace("ความคิดเห็นที่","",$comment));
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