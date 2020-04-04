<?php
$pagename="Your Login Results"; //Create and populate a variable called $pagename
session_start();
include("db.php");
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
$email=$_POST['email'];
$password=$_POST['password'];
if(empty($email) and  empty($password))
{
    echo"<h2> Login failed!</h2>";
    echo"<p> Your log in form is incomplete</p>";
    echo"<p> Make sure you provided all the information</p>";
    echo"<p>go back to <a href='login.php'>login</a></p>";
}
else
{
    $SQL="SELECT userPassword,userType,userFname,userSname,userId FROM users WHERE userEmail='$email'";
	$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    $arrayp=mysqli_fetch_array($exeSQL);
    if(empty($arrayp['userPassword'])){
    echo"<h2> Login failed!</h2>";
    echo"<p>No such user with this email was found </p>";
    echo"<p>go back to <a href='login.php'>login</a></p>";
    }
    else if($arrayp['userPassword']!=$password){
        echo"<h2> Login failed!</h2>";
        echo"<p>Invalid password was entered </p>";
        echo"<p>go back to <a href='login.php'>login</a></p>"; 
    }
    else
    {
        $_SESSION['userid']=$arrayp['userId'];
        $_SESSION['usertype']=$arrayp['userType'];
         $_SESSION['fname']=$arrayp['userFname'];
         $_SESSION['sname']=$arrayp['userSname'];
         echo"<h2> Login Successfull! </h2>";
         echo"<p> Hello ".$_SESSION['fname']." ".$_SESSION['sname']."</p>";
         if($_SESSION['usertype']=='C'){
             echo "<p> You have successfully logged in as customer</p>";    
         }
         else
         {
            echo "<p> You have successfully logged in as staff</p>"; 
         }
         echo"<p>to continue shopping <a href='index.php'>login</a></p>"; 
         echo "<p>to view your <a href='basket.php'>Smart Basket</a></p>"; 
    }
}
//display random text
include("footfile.html"); //include head layout
echo "</body>";
?>