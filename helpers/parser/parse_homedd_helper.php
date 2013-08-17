<?PHP
    
    function parse_homedd($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   

	    $main_content = $html->find('table[width=95%] table[width=100%] tr td',0);
		
	    if(!empty($main_content)){
	    
		$fComment = $html->find('form[name=frmWebboardTitle] table[bgcolor=#B9CED5]');
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