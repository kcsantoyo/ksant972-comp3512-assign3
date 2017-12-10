<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

        <link rel="stylesheet" href="resources/css/styles.css"></body>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
        <script type="text/javascript" src="resources/js/login.js"></script>
    
</head>
    <body>
        
 <div id="login_layout" class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main id="login_layout_content" class="mdl-layout__content">
	    <?php
            if (isset($_GET['error'])) {
                $errorCode = $_GET['error'];
                echo "<div id='errorId'>" . $errorCode . "</div>";
            }
        ?>
	    
	    
	    <section class="page-content">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--black">
				<h2 class="mdl-card__title-text">Welcome</h2>
			</div>
	  	<div class="mdl-card__supporting-text">
				<form action='verification.php' method='POST'>
					<div class="mdl-textfield mdl-js-textfield">
						<input id="userField"class="mdl-textfield__input" type="text" name="username" />
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input id="passField" class="mdl-textfield__input" type="password" name="password"/>
						<label class="mdl-textfield__label" for="userpass">Password</label>
					</div>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<input class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type='submit' value='Login'/>
			</div>
			</form>
		</div>
		<div>
            <p>Don't have a login? Click <a href="register.php"><u>Here</u></a> to create one!</p>
        </div>
		 </section>
	</main>
</div>
</body>
</html>