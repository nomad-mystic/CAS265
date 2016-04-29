<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 4/22/2016
 * Time: 4:09 PM
 */

include_once '../db/serverService.php';

function create_user($password, $username, $endpoint)
{
    if (isset($_POST['firstName'])) {

        $url = 'https://' . $endpoint . '.cloudant.com/user_profile';
        $fields = array(
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'company' => $_POST['company'],
            'phone' => $_POST['phone'],
            'username' => $_POST['username']
        );

        $error_message = 'Please Fill out all input fields';
        foreach ($fields as $key => $value) {
            if ($fields[$key] == '') {
                echo $error_message;
                exit;
            }
        }
        // passwords and username
        //url-ify the data for the POST
        $fields_string = json_encode($fields);
        echo $fields_string;

        //open connection
        $connection = curl_init();
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Content-Length: ' . strlen($fields_string);

        //set the url, number of POST vars, POST data
        curl_setopt($connection, CURLOPT_URL, $url);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, 'POST');
        //curl_setopt($connection, CURLOPT_POST, count($fields));
        curl_setopt($connection, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($connection, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($connection, CURLOPT_USERPWD, "$username:$password");

        //execute post
        curl_exec($connection);
        //close connection
        curl_close($connection);
    }
}
create_user($password, $username, $endpoint);

