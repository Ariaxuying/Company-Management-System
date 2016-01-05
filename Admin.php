<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Administrator))
    header("Location:login.php");?>



<html>

<head>
   
    <script>       
function del() {
   
  var user=document.getElementsByName("userid");
  for(i=0;i<user.length;i++){
      if(user[i].checked)
      {userid=user[i].value;
        
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

 xmlhttp.open("GET","delete-em.php?u="+userid,false);
      xmlhttp.send();
}
 
    }
location.reload(true);    
    }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
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
            <p class="username">Administrator</p>
            <input type="submit" value="Log out"/>
            
        </div>
        </div>
 </form>
    <!-- Left Dark Bar End --> 
    
    <!-- Right part -->
<div style="position:absolute;left:8cm;top:3cm;"> 
    <form action="add-edit-em.php" method="POST">
    
        <?php
    
       echo'<h1>Employee Information</h1>
    <table frame="box"style="border:1;size:100pt;">
        <tr><th>UserID</th><th>User Name</th><th>Password</th><th>User Type</th><th>Age</th><th>Pay</th></tr>
        </br>';
        
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
     $userid=$_POST['id']; 
     $name=$_POST['name'];
     $pass=$_POST['pass'];
     $type=$_POST['type'];
     $age=$_POST['age'];
     $pay=$_POST['pay'];
     $ui=$_SESSION['Userid'];
 if($_SESSION['flag']==1){
     $update="update Users set UserName='$name',Password='$pass',UserType='$type',Age=$age,Pay=$pay where UserID=$ui";
 mysqli_query($con,$update);
 $_SESSION['flag']=7;
 }
 if($_SESSION['flag']==0){
     $insert="insert into Users values ($userid,'$name','$pass','$type',$age,$pay)";
      mysqli_query($con,$insert);
      $_SESSION['flag']=7;
 }
 $sql="select * from Users";
 $res=mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($res)){
 echo"<tr><td>".'<input type="radio" name="userid"value="'.$row['UserID'].'"/>'.$row['UserID']."</td><td>".
 $row['UserName']."</td><td>".
 $row['Password']."</td><td>".$row['UserType']."</td><td>".$row['Age']."</td><td>".$row['Pay']."</td><tr>";}
mysqli_close($con);
    echo '</table>';?>
    
   <input type="submit" value="Add/Edit"/> <input type="button" onclick="del()" value="Delete"/>

   
 

</form>
</div>
</body>
</html>
