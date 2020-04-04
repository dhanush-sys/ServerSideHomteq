<?php
if(isset($_SESSION['userid']))
{
    echo "<p style='float: right'>".$_SESSION['fname']." ".$_SESSION['sname']." | Customer No. ".$_SESSION['userid']." </p>";
}
?>