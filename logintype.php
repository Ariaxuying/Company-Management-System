<?php
session_start();
$u=$_POST['userID'];
$p=$_POST['password'];
$con=mysqli_connect("localhost","root","123456","hw2");
if(!$con){
    die('database connection failed');
}
$sql="select UserType from Users where UserID=$u and Password='$p'";
$res=mysqli_query($con,$sql);
if($res->num_rows==0)
header("Location:login.php");

else 
{$row=mysqli_fetch_array($res);
$t=$row['UserType'];
$_SESSION['usertype']=$t;
$_SESSION['time']=time();
$_SESSION['expire']=$_SESSION['time']+300;
switch ($t){
    case 'Employee':
        header("Location:Sale.php");
        break;
    case 'Manager':
        header("Location:Manager.php");
        break;
    case 'Administrator':
        header("Location:Admin.php");
    break;}}
        



mysqli_close($con);

?>

