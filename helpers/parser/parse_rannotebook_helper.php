<?PHP
    
    function parse_rannotebook($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fView = $html->find('div.FontCaption',0);
		
	    if(!empty( $fView)){
		$view = trim($fView->next_sibling()->next_sibling()->plaintext);
		$view = explode(")&nbsp;",$view);
		$view = explode("&nbsp;(อ่าน",$view[0]);
		$view = explode(" | ตอบ",$view[1]);
		
		$comment = $view[1];
		$view = $view[0];
		
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