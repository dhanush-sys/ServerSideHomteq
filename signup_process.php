<?php
$pagename="Your Sign Up Results"; //Create and populate a variable called $pagename
session_start();
include("db.php");
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$postcode=$_POST['postcode'];
$telno=$_POST['telno'];
$email=$_POST['email'];
$password=$_POST['password'];
$cPassword=$_POST['cpassword'];
echo "<p> $email $fname $address $password $postcode $lname $telno $cPassword </p>";
if(empty($fname) and empty($lname) and empty($address) and empty($postcode) and empty($telno) and empty($email) and empty($password) and empty($cpassword)){
    echo"<h2> Sign-up failed!</h2>";
    echo"<p> Your sign up form is incomplete</p>";
    echo"<p> Make sure you provided all the information</p>";
    echo"<p>go back to <a href='signup.php'>Sign up</a></p>";
}
else{
    if($password==$cPassword){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $SQL="INSERT INTO users(userFname,userSname,userAddress,userPostCode,userTelNo,userEmail,userPassword,userType)  VALUES('$fname','$lname','$address','$postcode','$telno','$email','$password','C')";
                    if (mysqli_query($conn, $SQL)) {
                        echo"<h2> Sign-up Successful!</h2>";
                        echo "<p> to continue please <a href='login.php'>log in</a> </p>";
                        mysqli_errno($conn);
                    } 
                    else {
                         if(mysqli_errno($conn)==1062){
                            echo"<h2> Sign-up failed!</h2>";
                            echo "<p> already exists </p>";
                            echo"<p>go back to <a href='signup.php'>Sign up</a></p>"; 
                         }
                         else
                         {
                            echo"<h2> Sign-up failed!</h2>";
                            echo "<p> sql error code ".mysqli_errno($conn)."</p>";
                            echo"<p>go back to <a href='signup.php'>Sign up</a></p>"; 
                         }
                        }
        }
        else
        {
            echo"<h2> Sign-up failed!</h2>";
            echo "<p> Email not valid </p>";
            echo "<p> enter proper email </p>";
            echo"<p>go back to <a href='signup.php'>Sign up</a></p>";
        }
    } 
    else{
        echo"<h2> Sign-up failed!</h2>";
        echo"<p> passwords dont match</p>";
        echo"<p>go back to <a href='signup.php'>Sign up</a></p>";
    }
}
include("footfile.html"); //include head layout
echo "</body>";
?>