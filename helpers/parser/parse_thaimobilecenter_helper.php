<?PHP
    
    function parse_thaimobilecenter($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('table[width=95%] table[width=97%]',0);
			
	    if(!empty($fPost)){ 

		$fComment = $html->find('table[width=95%] td[width=83%] .text10 .text10',0);
		if(!empty($fComment)){
			$comment = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fComment->plaintext));
			$comment = trim(str_replace(array("ความคิดเห็นที่","&nbsp;"),"",$comment));
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