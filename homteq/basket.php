<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST['submit1']))
{
    $delproid=$_POST['delproid'];
    unset($_SESSION['basket'][$delproid]);
    echo "<p> 1 item removed";
}
if(isset($_POST['submit'])){
	$newprodid=$_POST['h_prodid'];
	$reququantity=$_POST['h_prodQuantity'];
	$_SESSION['basket'][$newprodid]=$reququantity;
	echo "<p>1 item added to the basket</p>";
}else{
	echo "<p>Current basket unchanged";
}	
    
$total=0;
if(isset($_SESSION['basket'])){
	echo "<table border='2'>";
	echo "<tr>";
	echo "<td>";
	echo "<p><h5>Product Name</h5></p>";
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Price</h5></p>"; 
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Quantity</h5></p>"; 
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Subtotal</h5></p>";
	echo "</td>";
	echo "<td>";
	echo "<p><h5></h5></p>";
	echo "</td>";
	echo "</tr>";

	foreach($_SESSION['basket'] as $index => $value){
		$SQL="SELECT  prodName,prodPrice FROM product WHERE prodId=$index";
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
		$arrayp=mysqli_fetch_array($exeSQL);
		echo "<tr>";
		echo "<td>";
		echo "<p><h5>".$arrayp["prodName"]."</h5>";
		echo "</td>";
		echo "<td>";
		echo "<p><h5>$".$arrayp["prodPrice"]."</h5>";
		echo "</td>";
		echo "<td>";
		echo "<p><h5>".$value."</h5>";
		echo "</td>";
		$subtotal=$arrayp["prodPrice"]*$value;
		$total=$subtotal+$total;
		echo "<td>";
		echo "<p><h5>$".$subtotal."</h5>";
		echo "</td>";
		echo "<td>";
		echo "<form action=basket.php method=POST>";
		echo "<input type=submit name=submit1 value='Remove'>";
		echo "<input type=hidden name=delproid value=".$index.">";
		echo "</form>";
		echo "</td>";
		echo"</tr>";
	}
	
echo "<tr>";
echo "<td colspan='3'> Total</td>";
echo "<td>";
echo "<p><h5>$".$total."</h5>";
echo "</td>";
echo "<td>";
echo "<p><h5></h5></p>";
echo "</td>";
echo"</tr>";
echo "</table>";
}else{
	echo "<p>The basket is empty</p>";
	echo "<table border='2'>";
	echo "<tr>";
	echo "<td>";
	echo "<p><h5>Product Name</h5>";
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Price</h5>"; 
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Quantity</h5>"; 
	echo "</td>";
	echo "<td>";
	echo "<p><h5>Subtotal</h5>";
	echo "</td>";
	echo "<td>";
	echo "<p><h5></h5></p>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan='3'> Total</td>";
	echo "<td>";
	echo "<p><h5>$".$total."</h5>";
	echo "</td>";
	echo "<td>";
	echo "<p><h5></h5></p>";
	echo "</td>";
	echo"</tr>";	
	echo "</table>";

}
if(isset($_SESSION['userid']))
{
	echo "<p> To finalize your order <a href='checkout.php'>Check out</a></p>";
}
else{
echo "<a href='clearbasket.php'>Clear Basket</a><br>";
echo "<p>New homteq customers : <a href='signup.php'>Sign Up</a></p>";
echo "<p>Returning homteq customers : <a href='login.php'>login</a></p><br>";}
include("footfile.html"); //include head layout
echo "</body>";
?>