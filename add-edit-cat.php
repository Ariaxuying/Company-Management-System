<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Employee))
    header("Location:login.php");?>
<html>
    <head>
        <script>
            function valicat(){
            var ci=document.getElementById("ca").value;
            var t=/^[0-9]*$/;
            if(!t.test(ci))
             {window.alert("CategoryID must be numbers!");
                 return false;}
          
           else return true;
            }
        </script>
    </head>
     <div style="text-align:center;">
         <form action="Sale.php" method="POST" onsubmit="return valicat()">    
   
    <?php
    
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$_SESSION['cid']="";
 $_SESSION['flag2']=7;
if(isset($_POST['cid'])){
$_SESSION['cid']=$_POST['cid'];}
if($_SESSION['cid']=="")
{echo'<h1>Add a Product Category</h1>'.
    '<pre>ProductsCategoryID            <input type="text" required id="ca" name="catid"/></pre>
     <pre>ProductsCategoryName          <input type="text" required name="catname"/></pre>
     <pre>ProductsCategoryDescription   <input type="text" required name="catdes"/></pre>';
     $_SESSION['flag2']=2;
     mysqli_close($con);

}

 
else{
    $_SESSION['flag2']=3;
    $catid=$_SESSION['cid'];
    $sql="select * from ProductsCategory where ProductsCategoryID=$catid";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    echo'<h1>Edit a Product</h1>'.
    '<pre>ProductsCategoryID            <input type="text" required id="ca" name="catid" value="'.$catid.'"/></pre>
     <pre>ProductsCategoryName          <input type="text" required name="catname" value="'.$row['ProductsCategoryName'].'"/></pre>
     <pre>ProductsCategoryDescription   <input type="text" required name="catdes" value="'.$row['ProductsCategoryDescription'].'"/></pre>';
    mysqli_close($con);
    
}?>
             <input type="submit"value="submit"/>
         </form>
         
             
       
       
   </div>
</html>