<?php
session_start();
$pagename="Make Your Home Smart"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<p> Thank you,".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
unset($_SESSION);
session_destroy();
echo "<p> you have been successfully logged out </p>";
include("footfile.html"); //include head layout
echo "</body>";
?>