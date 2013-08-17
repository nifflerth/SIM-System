<?PHP
    
    function parse_jokergameth($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fComment = $html->find('#postpagestats_above',0);
		 
	    if(!empty($fComment)){
	    
		    $comment = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fComment->plaintext));
		    $comment = explode("จากทั้งหมด",$comment);
		    $comment = trim($comment[1]);

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