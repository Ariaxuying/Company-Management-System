<?php
$u=$_REQUEST['u'];
$con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$del="delete from Users where UserID=$u";
mysqli_query($con,$del);
mysqli_close($con);

?>


