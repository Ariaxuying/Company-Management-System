<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Employee))
    header("Location:login.php");?>
<html>
<head>
        <script>       
function del1() {
   
  var pro=document.getElementsByName("proid");
  for(i=0;i<pro.length;i++){
      if(pro[i].checked)
      {proid=pro[i].value;
        
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

 xmlhttp.open("GET","delete-pro.php?p="+proid,false);
      xmlhttp.send();
}
 
    }
location.reload(true);    
    }

function del2() {
   
  var cat=document.getElementsByName("cid");
  for(i=0;i<cat.length;i++){
      if(cat[i].checked)
      {catid=cat[i].value;
        
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

 xmlhttp.open("GET","delete-cat.php?c="+catid,false);
      xmlhttp.send();
}
 
    }
location.reload(true);    
    }


function del3() {
   
  var spe=document.getElementsByName("sid");
  for(i=0;i<spe.length;i++){
      if(spe[i].checked)
      {speid=spe[i].value;
        
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

 xmlhttp.open("GET","delete-spe.php?s="+speid,false);
      xmlhttp.send();
}
 
    }
location.reload(true);    
    }

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Manager</title>
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
            <p class="username">Sales Manager</p>
            <input type="submit" value="Log out"/>
            
        </div>
        </div>
  </form>
    <!-- Left Dark Bar End --> 
    
    <!-- Right part -->
<div style="position:absolute;left:6cm;top:3cm;bottom:3cm;"> 
    <form action="add-edit-pro.php"method="POST">
    <h1>Product</h1>
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsID</th><th>ProductsCategoryID</th><th>ProductsName</th><th>ProductsDescription</th><th>ProductsPrice</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
     $id1=$_POST['id1'];
     $id2=$_POST['id2']; 
     $name=$_POST['name'];
     $des=$_POST['des'];
     $price=$_POST['price'];
     $id=$_SESSION['proid'];
 if($price>0){
 if($_SESSION['flag1']==3){
     $update="update Products set ProductsCategoryID=$id2,ProductsName='$name',ProductsDescription='$des',ProductsPrice=$price where ProductsID=$id";
 mysqli_query($con,$update);
    $_SESSION['flag1']=7;
 }
 if($_SESSION['flag1']==2){
     $insert="insert into Products values ($id1,$id2,'$name','$des','$price')";
      mysqli_query($con,$insert);
      $_SESSION['flag1']=7;
 }}
 $sql="select * from Products";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".
 '<input type="radio" name="proid"value="'.$row['ProductsID'].'"/>'.$row['ProductsID']."</td><td>".
 $row['ProductsCategoryID']."</td><td>".$row['ProductsName']."</td><td>".$row['ProductsDescription']."</td><td>".$row['ProductsPrice']."</td><tr>";}
mysqli_close($con);
?>
    </table>
    <input type="submit" value="Add/Edit"/>  <input type="button" onclick="del1()" value="Delete"/>
    </form>
 
    
    
    <!--category form-->      
    <form action="add-edit-cat.php"method="POST">    
    <h1>ProductsCategory</h1>
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>ProductsCategoryID</th><th>ProductsCategoryName</th><th>ProductsCategoryDescription</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
     $cid=$_POST['catid'];
     $catname=$_POST['catname'];
     $catdes=$_POST['catdes'];
     $catid=$_SESSION['cid'];
 if($_SESSION['flag2']==3){    
 $update1="update ProductsCategory set ProductsCategoryName='$catname',ProductsCategoryDescription='$catdes' where ProductsCategoryID=$catid";
 mysqli_query($con,$update1);
 $_SESSION['flag2']=7;
 }
 if($_SESSION['flag2']==2){
     
     $insert1="insert into ProductsCategory values ($cid,'$catname','$catdes')";
      mysqli_query($con,$insert1); 
      $_SESSION['flag2']=7;
 }
 $sql="select * from ProductsCategory";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".'<input type="radio" name="cid"value="'.$row['ProductsCategoryID'].'"/>'.$row['ProductsCategoryID']."</td><td>".
 $row['ProductsCategoryName']."</td><td>".$row['ProductsCategoryDescription']."</td><tr>";}
mysqli_close($con);
?>
    </table>
     <input type="submit" value="Add/Edit"/> <input type="button" onclick="del2()" value="Delete"/>
    </form>

        
    <form action="add-edit-spe.php" method="POST">         
<h1>SpecialSales</h1>
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>SpecialSalesID</th><th>ProductsID</th><th>StartDate</th><th>EndDate</th><th>Discount</th></tr>
        </br>
        <?php
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
 die('database connection failed');}
     $sid1=$_POST['sid1'];
     $sid2=$_POST['sid2'];
     $st=$_POST['st'];
     $en=$_POST['en'];
     $dis=$_POST['dis'];
     $sid=$_SESSION['speid'];
 if(($st<=$en)&&$dis>0&&$dis<1){
 if($_SESSION['flag3']==3){  
 $update2="update SpecialSales set ProductsID=$sid2,StartDate='$st',EndDate='$en',Discount=$dis where SpecialSalesID=$sid";
 mysqli_query($con,$update2);
 $_SESSION['flag3']=7;
 }
 if($_SESSION['flag3']==2){
 
     $insert2="insert into SpecialSales values ($sid1,$sid2,'$st','$en',$dis)";
      mysqli_query($con,$insert2);
      $_SESSION['flag3']=7;
 }}
 
 
 $sql="select * from SpecialSales";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".'<input type="radio" name="sid" value="'.$row['SpecialSalesID'].'"/>'.$row['SpecialSalesID']."</td><td>".
 $row['ProductsID']."</td><td>".$row['StartDate']."</td><td>".$row['EndDate']."</td><td>".$row['Discount']."</td><tr>";}
 mysqli_close($con);
 ?>
    </table>
     <input type="submit" value="Add/Edit"/> <input type="button" onclick="del3()" value="Delete"/>   


</form>
</div>
</body>
</html>


