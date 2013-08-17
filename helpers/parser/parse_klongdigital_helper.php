<?PHP
    
    function parse_klongdigital($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fTitle = $html->find('table[width=800] td[width=400]',1);
		
	    if(!empty($fTitle)){ 
		$title = trim($fTitle->plaintext);
		if($title != "|"){
		    $fView = $html->find('table[width=800] td[width=400]',0);
		    $view = trim($fView->plaintext);
		    $view = preg_replace("/[^0-9]/","",$view);
		    
		    $fComment = $html->find('table.comment');
		    $comment = COUNT($fComment);
		    
		    $error = "ok";
		}else{
		    $error = "dead";
		}
		
	    }else{
		$error = "dead";
	    }
	} 
               
        $html->clear();
	unset($html);
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>