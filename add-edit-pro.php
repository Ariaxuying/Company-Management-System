<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Employee))
    header("Location:login.php");?>
<html>
    <head>
        <script>
            function valipro(){
            var pi=document.getElementById("pi").value;
            var ci=document.getElementById("ci").value;
            var pr=document.getElementById("pr").value;
            var t=/^[0-9]*$/;
            if(!t.test(pi))
             {window.alert("ProductsID must be numbers!");
                 return false;}
          
           else if(!t.test(ci))
               {window.alert("CategoryID must be numbers!");
                 return false;}
                 else if(pr<=0)
                    {
                        window.alert("Inappropriate Price!");
                        return false;
                 }
                   else 
                        return true;}
       
        </script>
    </head>
    <form action="Sale.php"method="POST"onsubmit="valipro()">    
    <div style="text-align:center;">
    <?php
    
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$_SESSION['proid']="";
 $_SESSION['flag1']=7;
if(isset($_POST['proid'])){
$_SESSION['proid']=$_POST['proid'];}
if($_SESSION['proid']=="")
{echo'<h1>Add a Product</h1>'.
    '<pre>ProductsID             <input type="text" id="pi"required name="id1"/></pre>
     <pre>ProductsCategoryID     <input type="text" id="ci"required name="id2"/></pre>
     <pre>ProductsName           <input type="text" required name="name"/></pre>
     <pre>ProductsDescription    <input type="text" required name="des"/></pre>
     <pre>ProductsPrice          <input type="text" id="pr"required name="price"/></pre>';
     $_SESSION['flag1']=2;
     mysqli_close($con);

}

 
else{
    $_SESSION['flag1']=3;
    $id=$_SESSION['proid'];
    $sql="select * from Products where ProductsID=$id";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    echo'<h1>Edit a Product</h1>'.
    '<pre>ProductsID            <input type="text" id="pi"required name="id1" value="'.$id.'"/></pre>
     <pre>ProductsCategoryID    <input type="text" id="ci"required name="id2" value="'.$row['ProductsCategoryID'].'"/></pre>
     <pre>ProductsName          <input type="text" required name="name" value="'.$row['ProductsName'].'"/></pre>
     <pre>ProductsDescription   <input type="text" required name="des" value="'.$row['ProductsDescription'].'"/></pre>
     <pre>ProductsPrice         <input type="text" id="pr"required name="price" value="'.$row['ProductsPrice'].'"/></pre>';
    mysqli_close($con);
    
}
 
 
 
 ?>  
        <input type="submit"value="submit"/>
    </div>
       
    </form>
</html>



