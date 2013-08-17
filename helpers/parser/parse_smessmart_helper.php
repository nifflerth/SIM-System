<?PHP
    
    function parse_smessmart($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('.single-title',0);
			
	    if(!empty($fPost)){

		    $fComment = $html->find('.single-comment',0);
		    $comment = trim($fComment->plaintext);
		    $comment = explode(" ",$comment);
		    
		    $comment = (COUNT($comment) > 1) ? trim($comment[0]) : 0;
		    
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