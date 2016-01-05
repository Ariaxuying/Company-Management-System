<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Manager))
    header("Location:login.php");?>
<html>
    <form action="Manager.php">
<?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $emtp=$_POST['emtp'];
 $empay=$_POST['empay'];
 if($emtp!="UserType")
 {switch ($empay){
    case"Pay":
      $sql="select * from Users where UserType='$emtp'";
      break;
    case "<=500":
      $sql="select * from Users where UserType='$emtp' and Pay<=500";
      break;
     case "500-1000":
      $sql="select * from Users where UserType='$emtp' and Pay>=500 and Pay<=1000";
      break;
     case ">=1000":
      $sql="select * from Users where UserType='$emtp' and Pay>=1000";
 break;}}
 
else
 {switch ($empay){
    case"Pay":
      echo 'Please select your search criteria';
      $sql="";
      break;
    case "<=500":
      $sql="select * from Users where Pay<=500";
      break;
     case "500-1000":
      $sql="select * from Users where Pay>=500 and Pay<=1000";
      break;
     case ">=1000":
      $sql="select * from Users where Pay>=1000";
 break;}}

 
if($sql!="")
{$res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
 if(count($row)==0)
 echo'No Result';
 else
 {echo'<table frame="box"style="border:1;size:100pt;">
        <tr><th>UserID</th><th>User Name</th><th>Password</th><th>User Type</th><th>Age</th><th>Pay</th></tr>
        </br>';
     while($row){
          
 echo"<tr><td>".$row['UserID']."</td><td>".
 $row['UserName']."</td><td>".
 $row['Password']."</td><td>".$row['UserType']."</td><td>".$row['Age']."</td><td>".$row['Pay']."</td><tr>";
$row=mysqli_fetch_array($res);}}}
  mysqli_close($con);echo'</table>';
 echo'<p><input type="submit" value="back"/></p>';

?>


    
</form>
</html>
    

