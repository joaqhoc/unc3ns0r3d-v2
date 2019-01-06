<?php
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	function getBrowser($user_agent){
		if(strpos($user_agent, 'Maxthon') !== FALSE)
			return "Maxthon";
		elseif(strpos($user_agent, 'SeaMonkey') !== FALSE)
			return "SeaMonkey";
		elseif(strpos($user_agent, 'Vivaldi') !== FALSE)
			return "Vivaldi";
		elseif(strpos($user_agent, 'Arora') !== FALSE)
			return "Arora";
		elseif(strpos($user_agent, 'Avant Browser') !== FALSE)
			return "Avant Browser";
		elseif(strpos($user_agent, 'Beamrise') !== FALSE)
			return "Beamrise";
		elseif(strpos($user_agent, 'Epiphany') !== FALSE)
			return 'Epiphany';
		elseif(strpos($user_agent, 'Chromium') !== FALSE)
			return 'Chromium';
		elseif(strpos($user_agent, 'Iceweasel') !== FALSE)
			return 'Iceweasel';
		elseif(strpos($user_agent, 'Galeon') !== FALSE)
			return 'Galeon';
		elseif(strpos($user_agent, 'Edge') !== FALSE)
			return 'Microsoft Edge';
		elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
			return 'Internet Explorer';
		elseif(strpos($user_agent, 'MSIE') !== FALSE)
			return 'Internet Explorer';
		elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
			return "Opera Mini";
		elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
			return "Opera";
		elseif(strpos($user_agent, 'Firefox') !== FALSE)
			return 'Mozilla Firefox';
		elseif(strpos($user_agent, 'Chrome') !== FALSE)
			return 'Google Chrome';
		elseif(strpos($user_agent, 'Safari') !== FALSE)
			return "Safari";
		elseif(strpos($user_agent, 'iTunes') !== FALSE)
			return 'iTunes';
		elseif(strpos($user_agent, 'Konqueror') !== FALSE)
			return 'Konqueror';
		elseif(strpos($user_agent, 'Dillo') !== FALSE)
			return 'Dillo';
		elseif(strpos($user_agent, 'Netscape') !== FALSE)
			return 'Netscape';
		elseif(strpos($user_agent, 'Midori') !== FALSE)
			return 'Midori';
		elseif(strpos($user_agent, 'ELinks') !== FALSE)
			return 'ELinks';
		elseif(strpos($user_agent, 'Links') !== FALSE)
			return 'Links';
		elseif(strpos($user_agent, 'Lynx') !== FALSE)
			return 'Lynx';
		elseif(strpos($user_agent, 'w3m') !== FALSE)
			return 'w3m';
		else
			return 'No hemos podido detectar su navegador';
	}
	$ua = getBrowser($user_agent);
	echo $ua;
?>