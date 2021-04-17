
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
<h2>Sign In</h2>
    <form action="display.php" method="post">
        <fieldset>
            <legend><h3>Personal Details</h3></legend>
            <pre>Name: <input type="text" name="name" required>
    </pre>
       
      
        
        <pre>Phone number: <input type="text" name="phn"  required>
    </pre>
        </fieldset>
     <br><br>

     <?php
if(isset($_POST['name'])){

$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"loginsys");
if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
}
           if (isset($_POST['name'])){
            $name=$_POST['name'];
        }else {
         echo"please fill your name";
        }

           if (isset($_POST['phn'])){
            $phn=$_POST['phn'];
        }else {
            echo"please fill your phone number";
        }


        $s="select * from info where name = '$name' && phn= '$phn'";
        $result=mysqli_query($con,$s);
        $numb=mysqli_num_rows($result);

        if($numb==1){
           
           

            
            session_start();
            
            $_SESSION['name']=$name;
           
            $_SESSION['phn']=$phn;
            
            //echo "<script>location.href='display.php'</script>";
        }
        else{
           
            echo"incorrect info";
            
        }
        $con->close();

}


?>
     <input type="submit" value="Next">
     <a href="signup.php">Dont have an account? signup</a>
        </form>

</body>
</html>