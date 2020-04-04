<?php
$pagename="Order Confirmation"; //Create and populate a variable called $pagename
session_start();
include("db.php");
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
$total=0;
$currentdatetime=date('Y-m-d H:i:s');
if(empty($_SESSION['basket'])){
    echo "<p>There is No order the basket is empty</p>";
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
}else{
    $userid=$_SESSION['userid'];
    $SQL="INSERT INTO orders(userId,orderDateTime)  VALUES('$userid','$currentdatetime')";
    if (mysqli_query($conn, $SQL)) {
    $maxSQL = "SELECT max(orderNo) as maxno FROM orders WHERE userId=$userid";
    $exeSQL=mysqli_query($conn, $maxSQL) or die (mysqli_error($conn));
	$maxarray = mysqli_fetch_array($exeSQL); //fetch the result of the execution of the SQL statement and store it in an array
    $maxorderno = $maxarray['maxno'];
    $_SESSION['orderno'] = $maxorderno;
    echo "Successful order-ORDER REFERENCE NO: ".$maxorderno."</b>";
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
            echo"</tr>";
            $iSQL="INSERT INTO order_line(orderNo,prodId,quantityOrdered,subTotal)  VALUES($maxorderno,$index,$value,$subtotal)";
            $iexeSQL=mysqli_query($conn, $iSQL) or die (mysqli_error($conn));
        }
        $uSQL="UPDATE orders SET orderTotal=$total WHERE orderNo=$maxorderno";
        $uexeSQL=mysqli_query($conn, $uSQL) or die (mysqli_error($conn));
    echo "<tr>";
    echo "<td colspan='3'> Order Total</td>";
    echo "<td>";
    echo "<p><h5>$".$total."</h5>";
    echo "</td>";
    echo"</tr>";
    echo "</table>";
    unset($_SESSION['basket']);
}
else {
    echo  mysqli_errno($conn);
  }
}
echo "<p>To log out and leave the system <a href='basket.php'>Log Out</a></p>"; 
include("footfile.html"); //include head layout
echo "</body>";
?>