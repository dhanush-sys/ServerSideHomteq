<?php
 $servername="127.0.0.1"; 
 $username="root"; 
 $password=""; 
 $dbname="w1714899_0"; 
 $conn=mysqli_connect($servername,$username,$password,$dbname); 
//if the DB connection fails, display an error message and exit
if (!$conn)
{
 die('Could not connect: ' . mysqli_error($conn));
}
//select the database
mysqli_select_db($conn, $dbname);
?>