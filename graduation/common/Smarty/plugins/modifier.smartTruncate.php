<?php 
function smartDetectUTF8($string) 
{ 
static $result = array(); 
if(! array_key_exists($key = md5($string), $result)) 
{ 
$utf8 = " 
/^(?: 
[\x09\x0A\x0D\x20-\x7E] # ASCII 
| [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte 
| \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs 
| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte 
| \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates 
| \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3 
| [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15 
| \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16 
)+$/xs 
"; 
$result[$key] = preg_match(trim($utf8), $string); 
} 
return $result[$key]; 
} 
function smartStrlen($string) 
{ 
$result = 0; 
$number = smartDetectUTF8($string) ? 3 : 2; 
for($i = 0; $i < strlen($string); $i += $bytes) 
{ 
$bytes = ord(substr($string, $i, 1)) > 127 ? $number : 1; 
$result += $bytes > 1 ? 1.0 : 0.5; 
} 
return $result; 
} 
function smartSubstr($string, $start, $length = null) 
{ 
$result = ''; 
$number = smartDetectUTF8($string) ? 3 : 2; 
if($start < 0) 
{ 
$start = max(smartStrlen($string) + $start, 0); 
} 
for($i = 0; $i < strlen($string); $i += $bytes) 
{ 
if($start <= 0) 
{ 
break; 
} 
$bytes = ord(substr($string, $i, 1)) > 127 ? $number : 1; 
$start -= $bytes > 1 ? 1.0 : 0.5; 
} 
if(is_null($length)) 
{ 
$result = substr($string, $i); 
} 
else 
{ 
for($j = $i; $j < strlen($string); $j += $bytes) 
{ 
if($length <= 0) 
{ 
break; 
} 
if(($bytes = ord(substr($string, $j, 1)) > 127 ? $number : 1) > 1) 
{ 
if($length < 1.0) 
{ 
break; 
} 
$result .= substr($string, $j, $bytes); 
$length -= 1.0; 
} 
else 
{ 
$result .= substr($string, $j, 1); 
$length -= 0.5; 
} 
} 
} 
return $result; 
} 
function smarty_modifier_smartTruncate($string, $length = 80, $etc = '...', 
$break_words = false, $middle = false) 
{ 
if ($length == 0) 
return ''; 
if (smartStrlen($string) > $length) { 
$length -= smartStrlen($etc); 
if (!$break_words && !$middle) { 
$string = preg_replace('/\s+?(\S+)?$/', '', smartSubstr($string, 0, $length+1)); 
} 
if(!$middle) { 
return smartSubstr($string, 0, $length).$etc; 
} else { 
return smartSubstr($string, 0, $length/2) . $etc . smartSubstr($string, -$length/2); 
} 
} else { 
return $string; 
} 
} 
?> 