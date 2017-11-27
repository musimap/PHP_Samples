<?php
/**
 * This script shows you how to search for artists recommendations with Musimap's API
 *
 * First, you need to register on https://developers.musimap.net
 * Once validated, create your own client to obtain a 'client_id' and 'client_secret' on https://developers.musimap.net/account/clients
 * Use those credentials to generate an 'access_token' (see https://developers.musimap.net/documentation/api/usage/authentication )
 * Use this 'access_token' to authenticate your request
 *
 * More information on : https://developers.musimap.net/documentation/api/artists/recommendation
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
    CURLOPT_URL => 'https://api.musimap.net/artists/DC78B895-2274-590C-44EA-7D20DC603ED8/recommendations?limit=16',
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
