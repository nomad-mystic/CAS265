<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 4/21/2016
 * Time: 10:39 AM
 */


require_once('serverService.php');

//$key = "friongerysinertandithoug";

if (isset($_POST['firstName'])) {
    $url = 'https://' . $endpoint . '.cloudant.com/newsletter';
    $fields = array(
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'company' => $_POST['company'],
        'title' => $_POST['title'],
        'phone' => $_POST['phone']
    );

//url-ify the data for the POST
    $fields_string = json_encode($fields);

//open connection
    $ch = curl_init();
    $headers = array();
    $headers[] = 'Accept: application/json';
    $headers[] = 'Content-Type: application/json';

//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//execute post
    $result = curl_exec($ch);
    $apiarray = json_decode($result);
//close connection
    curl_close($ch);


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

