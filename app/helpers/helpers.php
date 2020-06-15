<?php
/**
 * @param string $routeName
 * @return string
 */
function is_active(string $routeName){
    return null !== request()->segment(2)&&request()->segment(2)==$routeName ? 'active':'';

}
function getVideoId($url){
    preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $match);
    return isset($match[1]) ? $match[1] : null; 
}
function slug(string $name){
    return strtolower(trim(str_replace(' ','_',$name)));
}