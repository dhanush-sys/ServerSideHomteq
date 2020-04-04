<?php
$pagename="Login"; //Create and populate a variable called $pagename
session_start();
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<form action=login_process.php method=POST>";
echo "<label>Email </label> <input type='text' name=email><br><br>";
echo "<label>Password </label> <input type='text' name=password><br><br>";
echo "<input style='align:left' type='submit' value='Log In'> ";
echo "<a href='login.php'><button style='align:right' type='button'>Clear Form</button></a>";
echo "</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>