<?php
//vamos receber o id do captcha da RF e gerar o link
$idCaptcha = $_GET['id'];
if(preg_match('#^[a-z0-9-]{36}$#', $idCaptcha))
{
	$url = 'http://www.receita.fazenda.gov.br/scripts/captcha/Telerik.Web.UI.WebResource.axd?type=rca&guid='.$idCaptcha;
	/* poderiamos fazer simplemente
	* $imgsource = file_get_contents($url);
	* mas, para evitar possíveis problemas com allow_url_fopen
	* vamos usar somente curl pra garantir
	*/
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
	$imgsource = curl_exec($ch);
	curl_close($ch);
	
	/* se tiver obtido sucesso em pegar a imagem
	* crio uma imagem a partir da string usando imagecreatefromstring
	* e seto o header para image/jpg e mando 
	* o browser exibir ela.
	* poderia usar curl_getinfo($ch) para analisar
	* CONTENT_TYPE retornado pelo servidor, pra garantir
	* que é uma imagem e o formato é jpg, pois caso
	* o id tenha expirado o server retorna um gif, então
	* deixo isso como exercício.
	*/
	if(!empty($imgsource))
	{
		$img = imagecreatefromstring($imgsource);
		header('Content-type: image/jpg');
		imagejpeg($img);
	}
}
?>