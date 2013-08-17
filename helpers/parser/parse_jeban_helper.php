<?PHP
    
    function parse_jeban($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('.topic-top .topic-right h1');
			
	    if(!empty($fPost)){ 
		$fComment = $html->find('#comment span',0);
		if(!empty($fComment)){
			$comment = trim($fComment->plaintext);
			$comment = explode(" ",$comment);
			$comment = $comment[0];
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