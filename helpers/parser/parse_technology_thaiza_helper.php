<?PHP
    
    function parse_technology_thaiza($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('table[width=100%] td[bgcolor=#F1FFCE] td',0);
	    if(!empty($fView)){
	       $view = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fView->plaintext));
		$view = explode("(อ่าน",$view);
		$view = preg_replace("/[^0-9]/","",$view[1]);
		 
		$fComment = $html->find('table[width=100%] td[bgcolor=#CCCCCC] span[class=bold-4]');
		$comment = COUNT($fComment);
		
		$error = "ok"; 
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