<?php
session_start();
$now=time();
if($now>$_SESSION['expire']||(!isset($_SESSION['usertype']))||($_SESSION['usertype']!=Administrator))
    header("Location:login.php");?>
<html>
    <head>
        <script>
            function valiem(){
            var ci=document.getElementById("ui").value;
            var a=document.getElementById("a").value;
            var p=document.getElementById("p").value;
            var t=/^[0-9]*$/;
            if(!t.test(ci))
             {window.alert("UserID must be numbers!");
                 return false;}
             else if(!t.test(a))
             {window.alert("Age must be numbers!");
                 return false;}
              else if(!t.test(p))
             {window.alert("Age must be numbers!");
                 return false;}
          
           else return true;
            }
        </script>
    </head>
    <form action="Admin.php"method="POST"onsubmit="valiem()">    
    <div style="text-align:center;">
    <?php
    
    $con=mysqli_connect("localhost","root","123456","hw2");
    if(!$con){
    die('database connection failed');}
$_SESSION['Userid']="";
$_SESSION['flag']=7;
if(isset($_POST['userid'])){
$_SESSION['Userid']=$_POST['userid'];}
if($_SESSION['Userid']=="")
{echo'<h1>Add an Employee</h1>'.
    '<pre>UserID     <input type="text" id="ui" required name="id"/></pre>
     <pre>UserName   <input type="text" required name="name"/></pre>
     <pre>Password   <input type="text" required name="pass"/></pre>
     <pre>UserType   <select name="type">
                     <option value="Administrator">Administrator</option>
                     <option value="Manager">Manager</option>
                     <option value="Employee">Employee</option>
                     </select></pre>
     <pre>Age        <input type="text" id="a"required name="age"/></pre>
     <pre>Pay        <input type="text" id="p"required name="pay"/></pre>';
     $_SESSION['flag']=0;
     mysqli_close($con);

}

 
else{
    $_SESSION['flag']=1;
    $ui=$_SESSION['Userid'];
    $sql="select * from Users where UserID=$ui";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    echo'<h1>Edit an Employee</h1>'.
    '<pre>UserID     <input type="text" required id="ui" name="id" value="'.$ui.'"/></pre>
     <pre>UserName   <input type="text" required name="name" value="'.$row['UserName'].'"/></pre>
     <pre>Password   <input type="text" required name="pass" value="'.$row['Password'].'"/></pre>
     <pre>UserType   <select name="type">
                     <option value="Administrator">Administrator</option>
                     <option value="Manager">Manager</option>
                     <option value="Employee">Employee</option>
                     </select></pre>
     <pre>Age        <input type="text" id="a"required name="age" value="'.$row['Age'].'"/></pre>
     <pre>Pay        <input type="text" id="p"required name="pay" value="'.$row['Pay'].'"/></pre>';
    mysqli_close($con);
    
}
 
 
 
 ?>  
        <input type="submit"value="submit"/>
    </div>
       
    </form>
</html>


