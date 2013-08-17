<?PHP
    
    function parse_fws($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('div.postbody',0);
		 
	    if(!empty($fView)){		
		    $fComment = $html->find('.topic-actions .pagination',0);
		    $comment = trim($fComment->plaintext);
		    $comment = explode(" posts ",$comment);
		    $comment  = trim($comment[0]);
		    
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