<?php
$c=$_REQUEST['c'];
$con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$del="delete from ProductsCategory where ProductsCategoryID=$c";
mysqli_query($con,$del);
mysqli_close($con);

?>




