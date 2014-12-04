<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Consulta CANTV</title>
    </head>
    <body>
<?php
$valor = array(
    'sarea'=>251,       //codigo de area sin el 0 ej: 212               
    'stelefono'=> 4820000 //telefono sin codigo
);

//open connection

$ch = curl_init();
$url = 'http://www.cantv.com.ve/seccion.asp?pid=1&sid=450';
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($valor));
curl_setopt($ch, CURLOPT_VERBOSE, false);
curl_setopt($ch, CURLOPT_HEADER, CURLOPT_ENCODING);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($valor));
curl_setopt($ch, CURLOPT_REFERER,'http://www.cantv.com.ve/');
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U;Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
//execute post
$resultado = curl_exec($ch);
$depurar = str_replace('</tr>', '\n', $resultado);
$elimina = strip_tags($depurar);
$datos = explode('\n', $elimina);
foreach($datos as $value) {
           $campo[] = $value;
        }
//close connection
for ($i=3; $i<9; $i++){
echo $campo[$i].'<br>';
}

curl_close($ch);


?>
	</body>
</html>

