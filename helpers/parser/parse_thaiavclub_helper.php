<?PHP
    
    function parse_thaiavclub($fetch,$url = NULL){
    if($fetch == NULL)
	{
		$error = 'dead';
		$view = NULL;
		$comment = NULL;
	}
	else
	{
		$html = str_get_html($fetch);
       
		$fView = $html->find('#top_subject');
		if($fView != NULL)
		{
			$view = trim($fView[0]->plaintext);
		    $view = explode("(อ่าน",$view);
	        $view = preg_replace("/[^0-9]/","", $view[1]);
		}
		else 
		{
			$view = '-1';
		}
		
	    $fComment = $html->find('div[class^=windowbg] div.post');
		$comment = COUNT($fComment) - 1;
        
		$error = "ok"; 
         
	        $html->clear();
		unset($html);
	}
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>