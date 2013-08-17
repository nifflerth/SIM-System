<?PHP
    
    function parse_thpair($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fTitle = $html->find('.topic-title span',0);
	    $title = trim($fTitle->plaintext);
	    
	    if(!empty($title)){  
	    
		    $fVC = $html->find('.topic-meta',0);
		    $vc = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fVC->plaintext));	
		    $vc = str_replace(array("(อ่าน","ตอบ",")"),"",$vc);
		    $vc = explode("/",$vc);
		    
		    $view = trim($vc[0]);
		    $comment = trim($vc[1]);
		    
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