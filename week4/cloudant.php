<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 4/21/2016
 * Time: 10:28 AM
 */
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IBM Cloudant User Registration</title>
</head>
<body>
<h1>IBM Cloudant User Registration</h1>
<form method="post" action="includes/actions/createUser.php">
    <table>
        <tr>
            <td><label for="username">Username:</label>
            <td><input type="text" id="username" name="username"></td>
            </td>
        </tr>
        <tr>
            <td><label for="firstName">First Name:</label>
            <td><input type="text" id="firstName" name="firstName"></td>
            </td>
        </tr>
        <tr>
            <td><label for="lastName">Last Name:</label>
            <td><input type="text" id="lastName" name="lastName"></td>
            </td>
        </tr>
        <tr>
            <td><label for="title">Title:</label>
            <td><input type="text" id="title" name="title"></td>
            </td>
        </tr>
        <tr>
            <td><label for="company">Company</label>
            <td><input type="text" id="company" name="company"></td>
            </td>
        </tr>
        <tr>
            <td><label for="age">Age:</label>
            <td><input type="text" id="age" name="age"></td>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email</label>
            <td><input type="text" id="email" name="email"></td>
            </td>
        </tr>
        <tr>
            <td><label for="phone">Phone:</label>
            <td><input type="text" id="phone" name="phone"></td>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">SUBMIT</button>
                <input type="hidden" name="sent_confirm" value="1"></td>
        </tr>
    </table>
</form>
</body>
</html>



