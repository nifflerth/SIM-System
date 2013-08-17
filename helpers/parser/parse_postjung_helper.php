<?PHP
    
    function parse_postjung($fetch,$url = NULL){
    if($fetch == NULL)
	{
		$error = '404';
		$view = NULL;
		$comment = NULL;
	}
	else
	{
		$html = str_get_html($fetch);
	
		$dead_page = $html->find('.mainbox div[style^=background-color:#ffff88]');
		if($dead_page != NULL)
		{
			$dead_msg = trim($dead_page[0]->plaintext);
			$error = $dead_msg;
			$status_page = '1';
		}
		else
		{
			$error = "ok";
			$status_page = '0';
		}
	
	    if($status_page != '1')
		{
			$fView = $html->find('div[style^=font-size] span');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$aview = trim($fView[0]->plaintext);
				$view = preg_replace("/[^0-9]/","",$aview);
			}   
		
	    	$fComment = $html->find('#cmncms div[userid]');
			$comment = COUNT($fComment);
	    }
	    else
		{
			$view = NULL;
			$comment = NULL;
		}
	        $html->clear();
		unset($html);
	}
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
?>