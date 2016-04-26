<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 4/23/2016
 * Time: 1:35 AM
 */

require('../db/serverService.php');

//function login() {
    $url = 'https://nomad-mystic.cloudant.com/user_profile/_all_docs?include_docs=true';

    $connection = curl_init();
    $headers = array();
    $headers[] = 'Accept: text/html';
    $headers[] = 'Content-Type: application/json';
    
    curl_setopt($connection, CURLOPT_URL, $url);
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($connection, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($connection, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($connection, CURLOPT_USERPWD, "$username:$password");

// executing cURL call
    $results = curl_exec($connection);
    $json_response = json_encode($results);

// Closing the connection
    curl_close($connection);
//    return $json_response;
//}
// call the login function
//$json_response = login();
echo $json_response;
