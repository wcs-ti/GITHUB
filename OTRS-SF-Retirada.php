<?php

$CASOID = $_GET['casoid']
$DATAHORA = $_GET['datahora']

$base_url = 'https://login.salesforce.com/services/oauth2/token';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $base_url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'client_id'     => '3MVG9IHf89I1t8hq869XQGkWruhqHenJSgQAgWoAe4sciR_vMh7aKOlimedYPbQOEnL4v1WL_n884inSWnc3L',
        'client_secret' => '9594DFDE214F754F794BDBFA9F02510CA73F77F13079F248BE2FBBBECA99FBCD',
        'username'      => 'aplicativo.conectado@wcs.com.br',
        'password'      => 'XQIs2x4USF2KGo4CZY0YXAAgMeORZx95bD',
        'grant_type'    => 'password'
));

$data = curl_exec($ch);
$token = $auth_string['access_token'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://wcs.my.salesforce.com/services/apexrest/v1/Caso/atualizarCasoRetirada',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>"{
    "CasoId":"$CASOID",
    "Data_HoraDesativacao": "$DATAHORA"
}
",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $token",
    'Content-Type: application/json',
    'Cookie: BrowserId=TWhFU1tcEeuPa03CIiSouw'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
