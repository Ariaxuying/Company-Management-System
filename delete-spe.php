<?php
$s=$_REQUEST['s'];
$con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$del="delete from SpecialSales where SpecialSalesID=$s";
mysqli_query($con,$del);
mysqli_close($con);
?>
