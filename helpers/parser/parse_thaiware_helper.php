<?PHP
    
    function parse_thaiware($fetch,$url = NULL){
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
			$fView = $html->find('');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$aview = trim($fView[1]->plaintext);
				$page_view = explode("(",$aview);
				$pview = explode(")",$page_view[1]);
				$ptest = preg_replace("/[^0-9]/","",$pview[0]);
				if(!is_numeric($ptest))
				{
					$page_view = explode(")",$page_view[2]);
					$ptest = preg_replace("/[^0-9]/","",$pview[0]);
					$view = $ptest;
				}
				else $view = $ptest;
			}   
		
	    	$fComment = $html->find('div[id^=post_id_]');
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