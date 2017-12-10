<?php
session_start();
include 'resources/includes/connect.php';
include 'resources/lib/UsersGateway.class.php';
include 'resources/lib/LoginGateway.class.php';

$users = new UsersGateway($connection);
$logins = new LoginGateway($connection);

/*
    Check password by taking posted password and salting and md5, if it matches set verification to true
*/
if(isset($_POST['username']) && isset($_POST['password'])){
    $loginResult = $logins->findbyId($_POST['username']);
    $verification = false;
    if(count($loginResult) > 0){
        $pwSalted = $_POST['password'] . $loginResult['Salt'];
        $hash = md5($pwSalted);
        
        if($hash == $loginResult['Password']){ 
            $verification = true;
        }
    }
    /*
        Checks verification and if true will start the session
    */
            if($verification == true){
                $userResult = $users->findbyId($loginResult['UserID']);
                $_SESSION['UserID'] = $userResult['UserID'];
                $_SESSION['FirstName'] = $userResult['FirstName'];
                $_SESSION['LastName'] = $userResult['LastName'];
                $_SESSION['Email'] = $userResult['Email'];
                
                if (isset($_SESSION['lastPage'])) {
                    $url = $_SESSION['lastPage'];
                    if ($url == $_SESSION['url']) {
                        header('Location: ' . $_SESSION['url']);
                    }
                }
                else {
                    header('Location: index.php');
                }
            }
            else if (empty($_POST['username'])) {
                header('Location: login.php?error=1');  // Invalid username
            }
            else {
                header('Location: login.php?error=2');  // Invalid password
            }
        }
?>