<html>
    <form action="Manager.php">
<?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $pro=$_POST['pro'];
 if($pro=='ProductsID')
     echo'Please select a product';
 
else
    {$sql="select * from Products where ProductsID=$pro";
$res=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($res);
echo'<table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsID</th><th>ProductsCategoryID</th><th>ProductsName</th><th>ProductsDescription</th><th>ProductsPrice</th></tr>
        </br>';
     while($row){
          
 echo"<tr><td>".
 $row['ProductsID']."</td><td>".
 $row['ProductsCategoryID']."</td><td>".$row['ProductsName']."</td><td>".$row['ProductsDescription']."</td><td>".$row['ProductsPrice']."</td><tr>";
 $row=mysqli_fetch_array($res);
}}
  mysqli_close($con);echo'</table>';
 echo'<p><input type="submit" value="back"/></p>';

?>


    
</form>
</html>
    




