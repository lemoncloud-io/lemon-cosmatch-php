<?php
require 'vendor/autoload.php';

use Aws\Credentials\Credentials;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Aws\Signature\SignatureV4;

// load AWS access-key/secret-key
$access_key = getenv('ACCESS_KEY');
$access_key = $access_key ? $access_key : 'AKIAJ4GJA3CJNAVCJ4RQ';           // default access-key
$secret_key = getenv('SECRET_KEY');
$url = 'https://mv7p4s8erd.execute-api.ap-northeast-2.amazonaws.com/prod/ingredient';
$region = 'ap-northeast-2';

if (empty($access_key) || empty($secret_key))
{
    echo 'ERROR! Set ACCESS-KEY, SECRET-KEY in environment like below before.' , PHP_EOL;
    echo '> export ACCESS_KEY=AKIAJ4GJA3CJNAVCJ4RQ' , PHP_EOL;
    echo '> export SECRET_KEY=<get key from request>' , PHP_EOL;
    echo '> php sample/call-api-get.php' , PHP_EOL;
    exit(0);
}
// echo 'KEY: "', $access_key,'"  "', $secret_key,'"'; exit(1);

// Prepare credentials
$credentials = new Credentials($access_key, $secret_key);
var_dump($credentials);

// Prepare Client
$client = new Client();
$request = new Request('GET', $url);
var_dump($request);

try {
    // Sign request and send signed-request.
    $s4 = new SignatureV4("execute-api", $region);
    $signedrequest = $s4->signRequest($request, $credentials);
    $response = $client->send($signedrequest);
    var_dump($s4);
    var_dump($request);

    // result.
    echo '------------------------- RESULT ------------------------- ' , PHP_EOL;
    echo $response->getBody(), PHP_EOL;
    echo '------------------------- FINISH ------------------------- ' , PHP_EOL;
    
} catch (\Exception $e){
    // print_r ($e);
    echo $e;
}
