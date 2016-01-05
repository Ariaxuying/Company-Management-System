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
 $procat=$_POST['procat'];
 $propri=$_POST['propri'];
 if($procat!="ProductsCategoryID")
 {switch ($propri){
    case"ProductsPrice":
      $sql="select * from Products where ProductsCategoryID=$procat";
      break;
    case "<=20":
      $sql="select * from Products where ProductsCategoryID=$procat and ProductsPrice<=20";
      break;
     case "20-40":
      $sql="select * from Products where ProductsCategoryID=$procat and ProductsPrice>=20 and ProductsPrice<=40";
      break;
     case "40-60":
      $sql="select * from Products where ProductsCategoryID=$procat and ProductsPrice>=40 and ProductsPrice<=60";
      break;;
    case ">=60":
      $sql="select * from Products where ProductsCategoryID=$procat and ProductsPrice>=60";
 break;}}
 
else
 {switch ($propri){
    case"ProductsPrice":
      echo'Please select your search criteria';
        $sql="";
      break;
    case "<=20":
      $sql="select * from Products where ProductsPrice<=20";
      break;
     case "20-40":
      $sql="select * from Products where ProductsPrice>=20 and ProductsPrice<=40";
      break;
     case "40-60":
      $sql="select * from Products where ProductsPrice>=40 and ProductsPrice<=60";
      break;;
    case ">=60":
      $sql="select * from Products where ProductsPrice>=60";
 break;}}


 if($sql!=""){        
 $res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
 if(count($row)==0)
 echo'No Result';
 else
 {echo'<table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsID</th><th>ProductsCategoryID</th><th>ProductsName</th><th>ProductsDescription</th><th>ProductsPrice</th></tr>
        </br>';
     while($row){
          
 echo"<tr><td>".
 $row['ProductsID']."</td><td>".
 $row['ProductsCategoryID']."</td><td>".$row['ProductsName']."</td><td>".$row['ProductsDescription']."</td><td>".$row['ProductsPrice']."</td><tr>";
 $row=mysqli_fetch_array($res);
     }}}
  mysqli_close($con);echo'</table>';
 echo'<p><input type="submit" value="back"/></p>';

?>


    
</form>
</html>
    


