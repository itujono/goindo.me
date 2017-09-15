<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function encode($string){
    $CI =& get_instance();
    $id = $CI->encryption->encrypt($string);
    $id = str_replace(['+','/'], ['==11==','==12=='], $id);
    return $id;
}

function decode($string){
    $CI =& get_instance();
    $id = str_replace(['==11==','==12=='], ['+','/'], $string);
    $id = $CI->encryption->decrypt($id);
    return $id;
}

function replacesymbol($string){
    return str_replace([' ','&',',','.','(',')','!','?'], ['','','','','','','',''], $string);
}

function dF($date, $format){
	return date($format, strtotime($date));
}