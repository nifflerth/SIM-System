<?PHP
    
    function parse_meedmoh($fetch,$url = NULL){
        
	$html = str_get_html($fetch);
       
       
	$fView = $html->find('.catbg span');
	if($fView !=NULL)
	{
		$aview = trim($fView[1]->plaintext);
		$bview = explode("(",$aview);
		$cview = explode(")",$bview[1]);
		$view = preg_replace("/[^0-9]/","",$cview[0]);
	}else $view = '-1';
	 
        $fComment = $html->find('hr[class=post_separator] div[class^=windowbg]');
	$comment = COUNT($fComment) - 1;
        
	
	$error = "ok"; 

        $html->clear();
	unset($html);
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>