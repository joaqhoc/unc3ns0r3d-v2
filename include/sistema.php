<?php
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	function getPlatform($user_agent){
		if(strpos($user_agent, 'Windows NT 10.0') !== FALSE)
			return "Windows 10";
		elseif(strpos($user_agent, 'Windows NT 6.3') !== FALSE)
			return "Windows 8.1";
		elseif(strpos($user_agent, 'Windows NT 6.2') !== FALSE)
			return "Windows 8";
		elseif(strpos($user_agent, 'Windows NT 6.1') !== FALSE)
			return "Windows 7";
		elseif(strpos($user_agent, 'Windows NT 6.0') !== FALSE)
			return "Windows Vista";
		elseif(strpos($user_agent, 'Windows NT 5.1') !== FALSE)
			return "Windows XP";
		elseif(strpos($user_agent, 'Windows NT 5.2') !== FALSE)
			return 'Windows 2003';
		elseif(strpos($user_agent, 'Windows NT 5.0') !== FALSE)
			return 'Windows 2000';
		elseif(strpos($user_agent, 'Windows ME') !== FALSE)
			return 'Windows ME';
		elseif(strpos($user_agent, 'Win98') !== FALSE)
			return 'Windows 98';
		elseif(strpos($user_agent, 'Win95') !== FALSE)
			return 'Windows 95';
		elseif(strpos($user_agent, 'WinNT4.0') !== FALSE)
			return 'Windows NT 4.0';
		elseif(strpos($user_agent, 'Windows Phone') !== FALSE)
			return 'Windows Phone';
		elseif(strpos($user_agent, 'Windows') !== FALSE)
			return 'Windows';
		elseif(strpos($user_agent, 'iPhone') !== FALSE)
			return 'iPhone';
		elseif(strpos($user_agent, 'iPad') !== FALSE)
			return 'iPad';
		elseif(strpos($user_agent, 'Debian') !== FALSE)
			return 'Debian';
		elseif(strpos($user_agent, 'Ubuntu') !== FALSE)
			return 'Ubuntu';
		elseif(strpos($user_agent, 'Slackware') !== FALSE)
			return 'Slackware';
		elseif(strpos($user_agent, 'Linux Mint') !== FALSE)
			return 'Linux Mint';
		elseif(strpos($user_agent, 'Gentoo') !== FALSE)
			return 'Gentoo';
		elseif(strpos($user_agent, 'Elementary OS') !== FALSE)
			return 'ELementary OS';
		elseif(strpos($user_agent, 'Fedora') !== FALSE)
			return 'Fedora';
		elseif(strpos($user_agent, 'Kubuntu') !== FALSE)
			return 'Kubuntu';
		elseif(strpos($user_agent, 'Linux') !== FALSE)
			return 'Linux';
		elseif(strpos($user_agent, 'FreeBSD') !== FALSE)
			return 'FreeBSD';
		elseif(strpos($user_agent, 'OpenBSD') !== FALSE)
			return 'OpenBSD';
		elseif(strpos($user_agent, 'NetBSD') !== FALSE)
			return 'NetBSD';
		elseif(strpos($user_agent, 'SunOS') !== FALSE)
			return 'Solaris';
		elseif(strpos($user_agent, 'BlackBerry') !== FALSE)
			return 'BlackBerry';
		elseif(strpos($user_agent, 'Android') !== FALSE)
			return 'Android';
		elseif(strpos($user_agent, 'Mobile') !== FALSE)
			return 'Firefox OS';
		elseif(strpos($user_agent, 'Mac OS X+') || strpos($user_agent, 'CFNetwork+') !== FALSE)
			return 'Mac OS X';
		elseif(strpos($user_agent, 'Macintosh') !== FALSE)
			return 'Mac OS Classic';
		elseif(strpos($user_agent, 'OS/2') !== FALSE)
			return 'OS/2';
		elseif(strpos($user_agent, 'BeOS') !== FALSE)
			return 'BeOS';
		elseif(strpos($user_agent, 'Nintendo') !== FALSE)
			return 'Nintendo';
		else
			return 'Unknown Platform';
	}
	$ua = getPlatform($user_agent);
	echo $ua;
?>