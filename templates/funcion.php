<?php

function CleanQuery($string)
{
$badWords = "(union)|(insert)|(drop)|(http)|(iframe)|(script)|(cmd)|(exec)|(system)|(curl)|(passwd)|(copy)|(alert)|(--)|(>)|(<)|(')|(^)|(#)|(%)|(php)|(wml)|(html))"; 
$string = eregi_replace($badWords, "", $string);
$string = preg_replace(array('/[^a-zA-Z0-9\ \-\_\/\*\(\)\[\]\?\.\,\:\&\@\=\+]/'),array('', '', ''),$string);
$string = mysql_real_escape_string(htmlspecialchars($string)); 
return $string;
}