<?php
session_start();

include_once 'resources/includes/connect.php';
include_once 'resources/lib/UsersGateway.class.php';
include_once 'resources/lib/UsersLoginGateway.class.php';

$usersDB = new UsersGateway($connection);
$usersLoginDB = new UsersLoginGateway($connection);
   
    $id = $_SESSION['UserID'];
    $result = $usersDB->findByID($id);
    //get all post data
    if(isset($_POST['firstname'])){
       $first = $_POST['firstname'];
    }
    else {
       $first = $result['FirstName'];
    }
    
    $last = $_POST['lastname'];
    
    if(isset($_POST['address'])) {
       $address = $_POST['address'];
    }
    
    else{
       $address = $result['Address'];
    }
    $city = $_POST['city'];
    
    if(isset($_POST['region'])) { 
       $region = $_POST['region'];
    }
    else { 
       $region = $result['Region'];
    }
    $country = $_POST['country'];
    
    if(isset($_POST['postal'])) {
       $postal = $_POST['postal'];
    }
    else {
       $postal = $result['Postal'];
    }
    
    if(isset($_POST['phone'])) {
       $phone = $_POST['phone'];
    }
    else { 
       $phone = $result['Phone'];
    }
    
    $email = $_POST['email'];
    
    //get current date and salt
    $d = time();
    $currentDate = date("Y-m-d h:i:s", $d);
    
    //write values to User (FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email)
    $infoArray = array(
      'FirstName' => $first,
      'LastName' => $last,
      'Address' => $address,
      'City' => $city,
      'Region' => $region,
      'Country' => $country,
      'Postal' => $postal,
      'Phone' => $phone,
      'Email' => $email
       );
    //write values to UserLogin (Email, properpassword, Salt, date, date)
    $usersDB->updateUserInfo($infoArray, $id);
    
    $usersLoginDB->updateUserLoginInfo($email, $currentDate, $id);
    
    $_SESSION['FirstName'] = $first;
    $_SESSION['LastName'] = $last;
    $_SESSION['Email'] = $email;
    
    header('Location:profile.php');
  

?>