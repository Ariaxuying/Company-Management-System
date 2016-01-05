<?php
$p=$_REQUEST['p'];
$con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$del="delete from Products where ProductsID=$p";
mysqli_query($con,$del);
mysqli_close($con);
?>



