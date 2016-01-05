<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Manager))
    header("Location:login.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manager</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
<link href="wysiwyg.css" rel="stylesheet" type="text/css" />
<!-- Theme Start -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->
</head>
<body id="homepage">
	<div id="header">
    	<a href="" title=""><image src="img/cp_logo.png" alt="Control Panel" class="logo" /></a>
    	<div id="searcharea">
            <p class="left smltxt"><a href="#" title="">Advanced</a></p>
            <input type="text" class="searchbox" value="Search control panel..." onclick="if (this.value =='Search control panel...'){this.value=''}"/>
            <input type="submit" value="Search" class="searchbtn" />
        </div>
    </div>
        

  
 <!-- Left Dark Bar Start -->
  <form action="login.php">
    <div id="leftside">
    	<div class="user">
        	<image src="img/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
            <p>Logged in as:</p>
            <p class="username">Manager</p>
            <input type="submit" value="Log out"/>
            </form>
            
            
        </div>
        </div>
    <!-- Left Dark Bar End --> 
    
    
    
    <!-- Right part -->
<div style="position:absolute;left:6cm;top:3cm;height:1000pt;"> 
    <form action="search-em.php" method="POST">
    <h1>Employee Information
    </h1>
        <select name="emtp">
            <option value="UserType">UserType</option>
            <option value="Employee">Employee</option>
            <option value="Manager">Manager</option>
            <option value="Administrator">Administrator</option>
        </select>
        
        <select name="empay">
            <option value="Pay">Pay</option>
            <option value="<=500"><=500</option>
            <option value="500-1000">500-1000</option>
            <option value=">=1000">>=1000</option>
        </select>
     <input type="submit" name="sem" value="Search">
            
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>UserID</th><th>User Name</th><th>Password</th><th>User Type</th><th>Age</th><th>Pay</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from Users";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".$row['UserID']."</td><td>".
 $row['UserName']."</td><td>".
 $row['Password']."</td><td>".$row['UserType']."</td><td>".$row['Age']."</td><td>".$row['Pay']."</td><tr>";}
mysqli_close($con);?>
    </table>
    </form>
    
        
        
        
    <h1>Products
    </h1>
    <form action="search-pro.php" method="POST">
      
            <?php   
            echo'<select name="procat">
            <option value="ProductsCategoryID">ProductsCategory</option>';
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from ProductsCategory";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
     $r=$row['ProductsCategoryID'];
     $n=$row['ProductsCategoryName'];
     echo'<option value="'.$r.'">'.$n.'</option>';
 }
mysqli_close($con); echo'</select>';
?>
            
       
        
       <select name="propri">
            <option value="ProductsPrice">Price</option>
            <option value="<=20"><=20</option>
            <option value="20-40">20-40</option>
            <option value="40-60">40-60</option>
            <option value=">=60">>=60</option>
        </select>
      
  
     <input type="submit" name="spro" value="Search">  </form>
    
    <form action="pro.php" method="POST">
       <?php   
            echo'<select name="pro">
            <option value="ProductsID">ProductsName</option>';
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from Products";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
     $pi=$row['ProductsID'];
     $pn=$row['ProductsName'];
     echo'<option value="'.$pi.'">'.$pn.'</option>';
 }
mysqli_close($con); echo'</select>';
?> 
        <input type="submit" value="search this product"/>
        
    </form>
    
  
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsID</th><th>ProductsCategoryID</th><th>ProductsName</th><th>ProductsDescription</th><th>ProductsPrice</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from Products";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".
 $row['ProductsID']."</td><td>".
 $row['ProductsCategoryID']."</td><td>".$row['ProductsName']."</td><td>".$row['ProductsDescription']."</td><td>".$row['ProductsPrice']."</td><tr>";}
mysqli_close($con);?>
    </table>
    
    
        
        
    <h1>ProductsCategory
    </h1>
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsCategoryID</th><th>ProductsCategoryName</th><th>ProductsCategoryDescription</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from ProductsCategory";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".
 $row['ProductsCategoryID']."</td><td>".
 $row['ProductsCategoryName']."</td><td>".$row['ProductsCategoryDescription']."</td><tr>";}
mysqli_close($con);?>
    </table>

        
        
        <h1>SpecialSales</h1>
        <form action="search-spe.php" method="POST">
         Price(with discount)<input type="text" name="spepri1"required placeholder="from"/>
            <input type="text" name="spepri2"required placeholder="to"/>
            
          <?php   
            echo'<select name="specat">
            <option value="ProductsCategoryID">ProductsCategory</option>';
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from ProductsCategory";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
     $r=$row['ProductsCategoryID'];
     $n=$row['ProductsCategoryName'];
     echo'<option value="'.$r.'">'.$n.'</option>';
 }
mysqli_close($con); echo'</select>';
?> 
        <input type="submit" value="Search"/>
        </form>
        
        <form action="spen.php" method="POST">
            <?php   
            echo'<select name="spen">
            <option value="ProductsID">ProductsName</option>';
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from Products inner join SpecialSales where Products.ProductsID=SpecialSales.ProductsID";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
     $r=$row['ProductsID'];
     $n=$row['ProductsName'];
     echo'<option value="'.$r.'">'.$n.'</option>';
 }
mysqli_close($con); echo'</select>';
?> <input type="submit" value="Display special sale information for this product"/>
        </form>
        
        <form action="sten.php" method="POST">
            <input type="date" name="st" placeholder="Enter a start date"/>
            <input type="date" name="en" placeholder="Enter an end date"/>
            <input type="submit" value="search by date">
        </form>
        
            
 
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>SpecialSalesID</th><th>ProductsID</th><th>StartDate</th><th>EndDate</th><th>Discount</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
 $sql="select * from SpecialSales";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".
 $row['SpecialSalesID']."</td><td>".
 $row['ProductsID']."</td><td>".$row['StartDate']."</td><td>".$row['EndDate']."</td><td>".$row['Discount']."</td><tr>";}
mysqli_close($con);?>
    </table>
    
        


</form>
</div>
</body>
</html>




