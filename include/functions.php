<?php
function session_checker($user = null){
if(!isset($_SESSION['usuario_id'])){
exit(); 
}
}
function verifica_email($EMAIL){
list($User, $Domain) = explode("@", $EMAIL);
$result = @checkdnsrr($Domain, 'MX');
return($result);
}
?>
