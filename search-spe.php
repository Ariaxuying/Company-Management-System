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
 $spepri1=$_POST['spepri1'];
 $spepri2=$_POST['spepri2'];
 $specat=$_POST['specat'];
 $d="select * from SpecialSales";
 $resD = mysqli_query($con,$d);
 while($rowD = mysqli_fetch_array($resD)){
     $rd=$rowD['ProductsID'];
     $o="select ProductsPrice from Products where ProductsID=$rd";
     $resO = mysqli_query($con,$o);
     $rowO = mysqli_fetch_array($resO);
     $newp=$rowD['Discount']*$rowO['ProductsPrice'];
    $sql="select ProductsCategoryID from Products where ProductsID=$rd";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    
if($specat=='ProductsCategoryID') 
{if ($newp<=$spepri2&&$newp>=$spepri1)
   
{echo' <table frame="box"style="border:1;size:100pt;">
        <tr><th>SpecialSalesID</th><th>ProductsID</th><th>StartDate</th><th>EndDate</th><th>Discount</th></tr>';
 echo"<tr><td>".
 $rowD['SpecialSalesID']."</td><td>".
 $rowD['ProductsID']."</td><td>".$rowD['StartDate']."</td><td>".$rowD['EndDate']."</td><td>".$rowD['Discount']."</td><tr>";
 $f="";
}}
  
    
elseif($newp<=$spepri2&&$newp>=$spepri1&&$row['ProductsCategoryID']==$specat){

    echo' <table frame="box"style="border:1;size:100pt;">
        <tr><th>SpecialSalesID</th><th>ProductsID</th><th>StartDate</th><th>EndDate</th><th>Discount</th></tr>';
 echo"<tr><td>".
 $rowD['SpecialSalesID']."</td><td>".
 $rowD['ProductsID']."</td><td>".$rowD['StartDate']."</td><td>".$rowD['EndDate']."</td><td>".$rowD['Discount']."</td><tr>";
 $f="";
 
}
  
    }
  if(!isset($f))
      echo'No Result';

  echo'</table>'; 
 echo'<p><input type="submit" value="back"/></p>';   
    

?>


         
</form>
</html>
    





