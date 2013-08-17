<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class pdf {
 
    function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/MPDF57/mpdf.php'; 
        return new mPDF("utf-8",array(353 , 500),"","",12,15,60,10,6,3,'P');
    }
}