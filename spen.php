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
 $spen=$_POST['spen'];
 if($spen=='ProductsID')
     echo'Please select a product';
 
else
    {$sql="select * from SpecialSales where ProductsID=$spen";
$res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
echo'<table frame="box"style="border:1;size:100pt;">
        <tr><th>SpecialSalesID</th><th>ProductsID</th><th>StartDate</th><th>EndDate</th><th>Discount</th></tr>
        </br>';
     while($row){
          
 echo"<tr><td>".
 $row['SpecialSalesID']."</td><td>".
 $row['ProductsID']."</td><td>".$row['StartDate']."</td><td>".$row['EndDate']."</td><td>".$row['Discount']."</td><tr>";

 $row=mysqli_fetch_array($res);
}}
  mysqli_close($con);echo'</table>';
 echo'<p><input type="submit" value="back"/></p>';

?>


    
</form>
</html>
    






