<?PHP
    
    function parse_hometophit($fetch,$url = NULL){
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
			$fView = $html->find('table[width=771] table[width=100%] td[bgcolor=#FFFFFF] font[color=#993300]');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$view = trim($fView[0]->plaintext);
				$view = preg_replace("/[^0-9]/", '',$view);
			}   
		
	    	$fComment = $html->find('table[width=600]');
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