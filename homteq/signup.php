<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<form action=signup_process.php method=POST>";
echo "<label>*First Name </label> <input type='text' name=fname><br><br>";
echo "<label>*Last Name </label> <input type='text' name=lname><br><br>";
echo "<label>*Address</label> <input type='text' name=address><br><br>";
echo "<label>*Postcode </label><input type='text' name=postcode><br><br>";
echo "<label>*Tel No </label> <input type='text' name=telno><br><br>";
echo "<label>*Email Address </label> <input type='text' name=email><br><br>";
echo "<label>*Password </label> <input type='password' name=password><br><br>";
echo "<label>*Confirm password</label> <input type='password' name=cpassword><br><br>";
echo "<p>";
echo "<input style='align:left' type='submit' value='Sign Up'> ";
echo "<a href='signup.php'><button style='align:right' type='button'>Clear Form</button></a>";
echo"</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>