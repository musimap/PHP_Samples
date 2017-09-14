<?php
/**
 * This script shows you how to generate an access_token with Musimap's API
 *
 * First, you need to register on https://developers.musimap.net
 * Once validated, create your own client to obtain a 'client_id' and 'client_secret' on https://developers.musimap.net/account/clients
 *
 * More information on : https://developers.musimap.net/documentation/api/usage/authentication
 *
 * Please note this code is not in a production-state. Do not use it without having it updated !
 */


// Get cURL resource
$curl = curl_init();

// Set some options
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => 'https://api.musimap.net/oauth/access_token',
    CURLOPT_USERAGENT => 'Musimap PHP Sample',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        'grant_type' => 'client_credentials',
        'client_id' => 'YOUR_CLIENT_ID', // replace it with your own client_id
        'client_secret' => 'YOUR_CLIENT_SECRET' // replace it with your own client_secret
    ]
]);

// Send the request & save response to $response
$response = curl_exec($curl);

// Close request to clear up some resources
curl_close($curl);

// Decode the response to an associative array
$array = json_decode($response, true);

// Print the response
die( print_r($array, true) );