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
    if(count($loginResult) > 0){
        $verification = false;
        $pwSalted = $_POST['password'] . $loginResult['Salt'];
        $hash = md5($pwSalted);
        if($hash == $loginResult['Password']){ 
            $verification = true;
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
        $url = $_SESSION['lastPage'];
        header('Location: index.php');
    }
    else {
        header('Location: login.php?error=1');

    }
    }
}
?>