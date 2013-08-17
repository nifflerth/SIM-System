<?PHP
    
    function parse_thaihealth($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('#top_subject',0);
			
	    if(!empty($fView)){   
		$view = trim($fView->plaintext);
	
		$view = explode("(Read",$view);
		$view = preg_replace("/[^0-9]/","", $view[1]);
		 
		$fComment = $html->find('#quickModForm div[class^=windowbg] .post');
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