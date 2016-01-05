<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Employee))
    header("Location:login.php");?>
<html>
        <head>
        <script>
            function valispe(){
            var si=document.getElementById("si").value;
            var pi=document.getElementById("pi").value;
            var di=document.getElementById("di").value;
            var st=document.getElementById("st").value;
            var en=document.getElementById("en").value;
            var t=/^[0-9]*$/;
            if(!t.test(si))
             {window.alert("SpecialSalesID must be numbers!");
                 return false;}
            else if(!t.test(pi))
             {window.alert("ProductsID must be numbers!");
                 return false;}
            else if(st>en)
              {window.alert("Inappropriate date set!");
                 return false;}  
            
             else if(!(di>0&&di<1))
             {window.alert("discounts must from 0-1");
                 return false;}
          
           else return true;
            }
        </script>
    </head>
    <form action="Sale.php"method="POST"onsubmit="valispe()">    
    <div style="text-align:center;">
    <?php
    
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$_SESSION['speid']="";
 $_SESSION['flag2']=7;
if(isset($_POST['sid'])){
$_SESSION['speid']=$_POST['sid'];}
if($_SESSION['speid']=="")
{echo'<h1>Add a Product</h1>'.
    '<pre>SpecialSalesID         <input type="text" id="si"required name="sid1"/></pre>
     <pre>ProductsID             <input type="text" id="pi"required name="sid2"/></pre>
     <pre>StartDate              <input type="date" id="st"required name="st"/></pre>
     <pre>EndDate                <input type="date" id="en"required name="en"/></pre>
     <pre>Discount               <input type="text" id="di"required name="dis"/></pre>';
     $_SESSION['flag3']=2;
     mysqli_close($con);

}

 
else{
    $_SESSION['flag3']=3;
    $sid=$_SESSION['speid'];
    $sql="select * from SpecialSales where SpecialSalesID=$sid";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    echo'<h1>Edit a Product</h1>'.
    '<pre>SpecialSalesID      <input type="text" id="si"required name="sid1" value="'.$sid.'"/></pre>
     <pre>ProductsID          <input type="text" id="pi"required name="sid2" value="'.$row['ProductsID'].'"/></pre>
     <pre>StartDate           <input type="date" id="st"required name="st" value="'.$row['StartDate'].'"/></pre>
     <pre>EndDate             <input type="date" id="en"required name="en" value="'.$row['EndDate'].'"/></pre>
     <pre>Discount            <input type="text" id="di"required name="dis" value="'.$row['Discount'].'"/></pre>';
    mysqli_close($con);
    
}
 
 
 
 ?>  
        <input type="submit"value="submit"/>
    </div>
       
    </form>
</html>





