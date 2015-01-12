<?php

for ($i=0; $i < 4; $i++) { 
	$ok = file_get_contents('http://www.urbandictionary.com/random.php');
	preg_match('#<div class=\'meaning\'>(.*?)</div>#si', $ok, $thing);
	$wordlist = $thing[0];
	$wordlist = strip_tags($wordlist);
	$wordlist = preg_replace('/\s+/', ' ',$wordlist);
	$wordlist = explode(' ', $wordlist);
	$rand = array_rand($wordlist, 2);
	$temp .= $wordlist[$rand[1]];
	$before .= $wordlist[$rand[1]] . ' ';
}

$find = array ('t','o','i','a');
$replace = array ('+','0','1','@');
$temp = str_ireplace($find, $replace, strtolower($temp));
for ($i=0; $i < strlen($temp); $i++) { 
	$outp .= rand(0, 100) > 80 ? strtoupper( substr($temp, $i, 1) ) : substr($temp, $i, 1);
}
echo $before . ' --> ' . $outp;