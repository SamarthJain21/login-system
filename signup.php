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
            $name=NULL;
        }

           if (isset($_POST['phn'])){
            $phn=$_POST['phn'];
        }else {
            $phn=NULL;
        }

        
        $s="select * from info where phn = '$phn'";
        $result=mysqli_query($con,$s);
        $numb=mysqli_num_rows($result);
        
        if($numb==1){
            echo"phone number already taken";
        }
        else{


        $sql="INSERT INTO `info` (`name`, `phn`) VALUES ('$name', '$phn');";

       
        if($con->query($sql)==true){
            echo "successfully inserted";
        }
        else{
            echo "error: $sql <br> $con->error";
        }
    }
        $con->close();

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<h2>User Information</h2>
    <form action="" method="post">
        <fieldset>
            <legend><h3>Personal Details</h3></legend>
        <label for="name">Full Name </label>
        <input type="text" id="name" placeholder="name" name="name">
        <br><br>
        <label for="name">Phone number </label>
        <input type="text" id="phn" placeholder="Phone number" name="phn">        
        </fieldset>
     <br><br>
     <input type="submit">
     <a href="signin.php">SignIn</a>
        </form>
      

</body>
</html>