<?PHP
    
    function parse_yenta4($fetch,$url = NULL){
    if($fetch == NULL)
	{
		$error = '404';
		$view = NULL;
		$comment = NULL;
	}
	else
	{
		$html = str_get_html($fetch);
	
		$dead_page = $html->find('.header2 span');
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
			$fView = $html->find('div[class=hm] span[class=xi1]');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$view = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fView[0]->plaintext));
			}   
		
	    	$fComment = $html->find('li[id^=comment-]');
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