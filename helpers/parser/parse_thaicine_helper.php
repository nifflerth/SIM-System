<?PHP
    
    function parse_thaicine($fetch,$url = NULL){
        
	$view = -1;
	$comment = 0;
	$error = "";
	
	if($fetch == NULL){
	    $error = '404';
	}else{
	
	    $html = str_get_html($fetch);
	   
	    $fPost = $html->find('table[cellspacing=2]',0);
			
	    if(!empty($fPost)){ 

		$fComment = $html->find('div[style=text-align: left;]',0);
		
		if(!empty($fComment)){
			$comment = trim(iconv("tis-620","utf-8//TRANSLIT//IGNORE",$fComment->plaintext));
			$comment = explode("จำนวนหัวข้อทั้งหมด",$comment);
			$comment = explode(" ",trim($comment[1]));
			$comment = str_replace("*","",$comment);
			$comment = trim($comment[0]);
		}
    
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
?>