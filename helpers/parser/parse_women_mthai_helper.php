<?PHP
    
    function parse_women_mthai($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('#maincontent #topic_title',0);
			
	    if(!empty($fPost)){
		    $fComment = $html->find('div[id^=comment_entry_] .comment_head .comment_seq',0);
		    if(!empty($fComment)){
			$comment = trim($fComment->plaintext);
			$comment = preg_replace("/[^0-9]/","",$comment);
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