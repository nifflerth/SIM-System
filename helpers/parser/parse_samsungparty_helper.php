<?PHP
    
    function parse_samsungparty($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('.topic-actions',0);
			
	    if(!empty($fPost)){ 

		    $fComment = $html->find('.pagination',0);
		    if(!empty($fComment)){
			    $comment = trim($fComment->plaintext);
			    $comment = explode("post",$comment);
			    $comment = trim($comment[0]) -1;
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