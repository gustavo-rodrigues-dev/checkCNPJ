<?php
header('Content-type: application/json; charset=UTF-8');
	// ja ta tudo mastigado em funcoes.php
	require('funcoes.php');
	
	/* observe que algumas validaчѕes sуo necessсrio
	 * pois sobre hipѓtese alguma deve ser confiar no
	 * usuсrio, mas vou deixar isso por sua parte, caso
	 * queira validar o cnpj vocъ pode dar uma olhada no
	 * meu artigo Validando url, e-mail, ip, CPF, CNPJ, cep, data e telefone com uma њnica funчуo 
	 * http://tretasdanet.com/?art=d6ac955326
	*/
	$cnpj = $_POST['cnpj'];
	$captcha = $_POST['captcha'];
	$token = $_POST['viewstate'];
	
	$getHtmlCNPJ = getHtmlCNPJ($cnpj, $captcha, $token);
	if($getHtmlCNPJ)
	{
		$campos = parseHtmlCNPJ($getHtmlCNPJ);
		// evite <pre>, seja criativo e nуo preguiчoso como eu. srs

		echo json_encode($campos);

	}
?>