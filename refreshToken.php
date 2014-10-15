<?php  
header('Content-type: application/json; charset=UTF-8');
require('funcoes.php');

$getCaptchaToken = getCaptchaToken();

echo json_encode(array(
	'status'	=> is_array($getCaptchaToken),
	'data'		=> $getCaptchaToken
	));
?>