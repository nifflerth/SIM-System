<?PHP
    
    function parse_seclub_forum($fetch,$url = NULL){
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
			$fView = $html->find('.catbg3 td[id=top_subject]');
			if($fView == NULL)
			{
				$view = '-1';
			}
			else
			{
				$view = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE"$fView[0]->plaintext));
				$page_view = explode("(",$view);
				$pview = explode(")",$page_view[1]);
				$ptest = preg_replace("/[^0-9]/", '',$view);
				if(!is_numeric($ptest))
				{
					$page_view = explode(")",$page_view[2]);
					$view = $ptest
				}
				else $view = $ptest;
			}   
		
	    	$fComment = $html->find('.forumline tbody tr td[width=100%] table[width=100%]');
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