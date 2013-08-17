<?PHP
    
    function parse_sanook($fetch,$url = NULL){

	//$url = "http://webboard.campus.sanook.com";
        
        $view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
        
            $html = str_get_html($fetch);
           
            $fView = $html->find('#top_subject',0);
            
            if(!empty($fView)){  
            
                $view = trim($fView->plaintext);
                $view = explode("(อ่าน",$view);
                $view = preg_replace("/[^0-9]/","", $view[1]);
                 
                $fComment = $html->find('table[width=100%] td[class^=windowbg] .border_post');
                $comment = COUNT($fComment) - 1;
                
                /*$fPagination = $html->find('form p.pagination span.navPages_current a');
                        
                if(COUNT($fPagination) > 0){
                    $i = 0;
                    foreach($fPagination  as $val){
                        if($i < COUNT($fPagination)-1){
                            $url =  $url."".$val->href;
                            $comment += parse_comment($url);
                        }
                        $i++;
                    }   
                }*/
            
                $error = "ok"; 
	    }else{
		    $error = "dead";
	    }
             
            $html->clear();
            unset($html);
        }
        
        $arr = array("view"=>$view,"comment"=>$comment,"error_code"=>$error);
        
	return $arr;
    }
    function parse_comment($url){
	$fetch = fetch($url);
	$html = str_get_html($fetch);
	
	$fComment = $html->find('table[width=100%] td[class^=windowbg] .border_post');
	$comment = COUNT($fComment) - 1;
	
	$html->clear();
	unset($html);
	
	return $comment;
    }

?>