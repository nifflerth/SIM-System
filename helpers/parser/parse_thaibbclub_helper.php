<?PHP
    
    function parse_thaibbclub($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('#page-body h2',0);
			
	    if(!empty($fPost)){ 

		    $fComment = $html->find('.pagination',0);
		    $comment = trim($fComment->plaintext);
		    $comment = explode("post",$comment);
		    $comment = explode(" ",trim($comment[1]));
		    $comment = trim($comment[1]) - 1;

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