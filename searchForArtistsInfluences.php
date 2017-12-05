<?php
/**
 * This script shows you how to search for artists by influences with Musimap's API
 *
 * Please note that Artists influences are mostly weighted at 10%
 *
 * First, you need to register on https://developers.musimap.net
 * Once validated, create your own client to obtain a 'client_id' and 'client_secret' on https://developers.musimap.net/account/clients
 * Use those credentials to generate an 'access_token' (see https://developers.musimap.net/documentation/api/usage/authentication )
 * Use this 'access_token' to authenticate your request
 *
 * More information on : https://developers.musimap.net/documentation/api/artists/search
 *
 * Please note this code is not in a production-state. Do not use it without having it updated !
 */

// Get cURL resource
$curl = curl_init();

// Headers definition
$headers = [
    'Content-length: 0',
    'Content-type: application/json',
    'Authorization: Bearer '.base64_encode('YOUR_ACCESS_TOKEN')  // replace it with a generated access_token
];

// Set some options
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://api.musimap.net/artists/search?offset=0&limit=10&influences[0][type]=artist&influences[0][direction]=from&influences[0][uid]=3B970FE1-83BB-4291-4F3E-226FBADEE365&influences[0][importance]=10&reference_provider=qobuz&output=details,references',
    CURLOPT_USERAGENT => 'Musimap PHP Sample',
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTPHEADER => $headers
]);

// Send the request & save response to $response
$response = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

// Decode the response to an associative array
$array = json_decode($response, true);

// Print the response
die( print_r($array, true) );
