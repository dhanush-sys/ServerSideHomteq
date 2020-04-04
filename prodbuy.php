<?php
include("db.php");
$pagename="“A smart buy for a smart home"; //Create and populate a variable called $pagename
session_start();
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;
//create a $SQL variable and populate it with a SQL statement that retrieves product details
$SQL="SELECT prodId, prodName, prodPicNameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity FROM product WHERE prodid='$prodid'";
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached, run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p style='color:grey'>".$arrayp['prodDescripLong']."</p>"; //display product description as contained in the array
echo "<p style='color:black'>$".$arrayp['prodPrice']."</p>"; //display product price as contained in the array
echo "<p style='color:grey'>Number of stock left:".$arrayp['prodQuantity']."</p>"; //display product description as contained in the array
echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=POST>";
echo "<select name=h_prodQuantity>";
for($i=1;$i<=$arrayp['prodQuantity'];$i++){
    echo "<option >$i </option>";
};
echo "</select>";
echo "<input type=submit value='ADD TO BASKET'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "<input type=hidden name=submit value=1>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
include("footfile.html"); //include head layout
echo "</body>";
?>