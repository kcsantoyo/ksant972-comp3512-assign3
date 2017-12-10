<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="utf-8">
   <title>Update User Information</title>
   <link rel="stylesheet" href="/resources/css/styles.css" />
   <script type="text/javascript" src="/resources/js/register-form.js"></script>
</head>
<body>
<form method="post" action="process-edit-info.php" id="mainForm">
   <fieldset>
      <legend id="legend">Edit User Info</legend>
      <table>
         <tr>
            <td colspan="2">
               <p>
               <label>First Name</label><br/>
               <input type="text" name="firstname" id="first" class="hilightable" value="<?php if(isset($_COOKIE["firstName"])) { echo $_COOKIE["firstName"]; }?>">
               </p>
               <p>
               <label>Last Name</label><br/>
               <input type="text" name="lastname" id="last" class="required hilightable" value="<?php if(isset($_COOKIE["lastName"])) { echo $_COOKIE["lastName"]; }?>">
               </p>
               <p>
               <label>Address</label><br/>
               <input type="text" name="address" id="address" class="hilightable" value="<?php if(isset($_COOKIE["address"])) { echo $_COOKIE["address"]; }?>">
               </p>
               <p>
               <label>City</label><br/>
               <input type="text" name="city" id="city" class="required hilightable" value="<?php if(isset($_COOKIE["city"])) { echo $_COOKIE["city"]; }?>">
               </p>
               <p>
               <label>Region</label><br/>
               <input type="text" name="region" id="region" class="hilightable" value="<?php if(isset($_COOKIE["region"])) { echo $_COOKIE["region"]; }?>">
               </p>
               <p>
               <label>Country</label><br/>
               <input type="text" name="country" id="country" class="required hilightable" value="<?php if(isset($_COOKIE["country"])) { echo $_COOKIE["country"]; }?>">
               </p>
               <p>
               <label>Postal Code</label><br/>
               <input type="text" name="postal" id="postal" class="hilightable" value="<?php if(isset($_COOKIE["postalCode"])) { echo $_COOKIE["postalCode"]; }?>">
               </p>
               <p>
               <label>Phone Number</label><br/>
               <input type="text" name="phone" id="phone" class="hilightable" value="<?php if(isset($_COOKIE["phoneNumber"])) { echo $_COOKIE["phoneNumber"]; }?>">
               </p>
               <p>
               <label>Email</label><br/>
               <input type="email" name="email" id="email" class="required hilightable" value="<?php if(isset($_COOKIE["emailAddress"])) { echo $_COOKIE["emailAddress"]; }?>">
               </p>
               <div id="checkEmail">
                  <?php if (isset($_GET['error'])) {echo "<p id='emailError'>Email address is already in use!</p>";} ?>
               </div>
            </td>
            </tr>
            <tr>
            <td colspan="2">
               <div class="rectangle centered"> 
                  <input type="submit" class="btn" value="Submit Changes">      
               </div>
            </td>
         </tr>
      </table>
   </fieldset>
</form>
   <div id="errors" class="visible">
   </div>

</body>
</html>