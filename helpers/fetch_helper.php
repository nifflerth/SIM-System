<?php
function fetch($url)
{
	$options = array( 
	        CURLOPT_RETURNTRANSFER => true,         // return web page 
	        CURLOPT_HEADER         => false,        // don't return headers 
	        CURLOPT_FOLLOWLOCATION => true,         // follow redirects 
	        CURLOPT_ENCODING       => "",           // handle all encodings 
	        CURLOPT_USERAGENT      => "Googlebot",     // who am i 
	        CURLOPT_AUTOREFERER    => true,         // set referer on redirect 
	        CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect 
	        CURLOPT_TIMEOUT        => 120,          // timeout on response 
	        CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects
	        CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl 
	        CURLOPT_SSL_VERIFYPEER => false,        // 
	        CURLOPT_VERBOSE        => false
	    ); 

	$ch      = curl_init($url); 
	curl_setopt_array($ch,$options); 
	$content = curl_exec($ch); 
	$err     = curl_errno($ch); 
	$errmsg  = curl_error($ch) ; 
	$header  = curl_getinfo($ch); 
	curl_close($ch);
	
	$size = $header["size_download"]/1024;
	
	$fetch['content'] = $content;
	$fetch['meta'] = $header;
	
	if($header["http_code"]!=200)
	{
		echo 'error:'.$header["http_code"].' ';
		return null;
	}
	else return $fetch;
}
?>