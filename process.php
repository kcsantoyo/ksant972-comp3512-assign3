<?php
session_start();

include_once 'resources/includes/connect.php';
include_once 'resources/lib/UsersGateway.class.php';
include_once 'resources/lib/UsersLoginGateway.class.php';

$usersDB = new UsersGateway($connection);
$usersLoginDB = new UsersLoginGateway($connection);

    //get all post data
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $postal = $_POST['postal'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    setcookie("firstName", $first, time() + 3600, "/");
    setcookie("lastName", $last, time() + 3600, "/");
    setcookie("address", $address, time() + 3600, "/");
    setcookie("city", $city, time() + 3600, "/");
    setcookie("region", $region, time() + 3600, "/");
    setcookie("country", $country, time() + 3600, "/");
    setcookie("postalCode", $postal, time() + 3600, "/");
    setcookie("phoneNumber", $phone, time() + 3600, "/");
    setcookie("emailAddress", $email, time() + 3600, "/");
    
    
    //get current date and salt
    $d = time();
    $currentDate = date("Y-m-d h:i:s", $d);
    $salt = md5(microtime());
    $lastUserID = $usersDB->getLastUserID();
    $newUserID = ((int)$lastUserID["UserID"] + 1);
    
    //generate proper password
    $properPass = md5($password . $salt);
    
    //check to make sure that username doesn not already exist
    $exists = $usersLoginDB->checkIfUserExists($email);
    
    if(count($exists) == 0) {
    
    //write values to User (FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email)
    
    $usersDB->addUser($newUserID, $first, $last, $address, $city, $region, $country, $postal, $phone, $email);
    
    //write values to UserLogin (Email, properpassword, Salt, date, date)
    
    $usersLoginDB->addUserLogin($newUserID, $email, $properPass, $salt, $currentDate);
    
    //clear cookies
    setcookie("firstName", "", time() - 3600);
    setcookie("lastName", "", time() - 3600);
    setcookie("address", "", time() - 3600);
    setcookie("city", "", time() - 3600);
    setcookie("region", "", time() - 3600);
    setcookie("country", "", time() - 3600);
    setcookie("postalCode", "", time() - 3600);
    setcookie("phoneNumber", "", time() - 3600);
    setcookie("emailAddress", "", time() - 3600);
    
    header('Location:login.php');
    }
    else {
        header('Location:register.php?error=1');
    }

?>