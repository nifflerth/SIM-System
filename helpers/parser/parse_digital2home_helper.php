<?PHP
    
    function parse_digital2home($fetch,$url = NULL){
    if($fetch == NULL)
	{
		$error = '404';
		$view = NULL;
		$comment = NULL;
	}
	else
	{
		$html = str_get_html($fetch);
	
		$dead_page = $html->find('');
		if($dead_page != NULL)
		{
			$dead_msg = trim($dead_page[0]->plaintext);
			$error = 'delete';
			$status_page = '1';
		}
		else
		{
			$error = "ok";
			$status_page = '0';
		}
	
	    if($status_page != '1')
		{
			$fView = $html->find('.catbg3 td[width=85%]');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$view = trim($fView[0]->plaintext);
				$aview = explode("(",$view);
				$bview = explode(")",$aview[1]); 
				$view = preg_replace("/[^0-9]/", '',$bview[0]);
			}   
		
	    	$fComment = $html->find('.bordercolor');
			$comment = COUNT($fComment) -1;
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