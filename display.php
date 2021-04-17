

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
<h1>Your Data</h1>

<?php

session_start();

$name=$_POST['name'];

$phn=$_POST['phn'];

$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"loginsys");
if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
}


        $s="select * from info where name = '$name' && phn= '$phn'";
        $result=mysqli_query($con,$s);
        $numb=mysqli_num_rows($result);

        if($numb==1){


echo "  <table>
<tr>
<th>name</th>
<th>phone number</th>
</tr>
<tr><td>". $name ."</td>"."<td>". $phn ."</td></tr></table>";
echo"<a href=\"signout.php\">SignOut</a>";
        }

        else{
            echo"Invalid information";
            echo"<br>";
            echo"<a href=\"signin.php\">back</a>";
        }
?>



    
</body>
</html>