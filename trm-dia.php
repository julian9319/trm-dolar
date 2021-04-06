<?php

$hoy=date('Y-m-d');

$endpoint='https://www.datos.gov.co/resource/mcec-87by.json?vigenciahasta='.$hoy;
$resp_text = json_decode(file_get_contents($endpoint, false));

if (empty($resp_text)) {

	$endpoint='https://www.datos.gov.co/resource/mcec-87by.json?vigenciadesde='.$hoy;
	$resp_text = json_decode(file_get_contents($endpoint, false));	

}

if (! empty($resp_text)) {

	echo "TRM: {$resp_text{0}->valor}".PHP_EOL;
	echo "Unidad: {$resp_text{0}->unidad}".PHP_EOL;
	echo "vigencia: desde {$resp_text{0}->vigenciadesde} hasta {$resp_text{0}->vigenciahasta}".PHP_EOL;

} else {
		
		echo 'No se cargo información: '.PHP_EOL.$endpoint.PHP_EOL;	
}

exit;
