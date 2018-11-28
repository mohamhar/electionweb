<?php 
include ("dbconfig.php");
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$name = mysqli_real_escape_string($con, $_POST["Name"]);
$email = mysqli_real_escape_string($con, $_POST["Email"]);
$number = $_POST["Phone"];
$city = mysqli_real_escape_string($con, $_POST["City"]);
$message = mysqli_real_escape_string($con, $_POST["Message"]);
$lang= mysqli_real_escape_string($con, $_POST["language"]);

$query="insert into $dbname.$table (name,email,phone,city,message,language) 
values ('$name','$email',$number,'$city','$message','$lang')";
##echo $query;
mysqli_query($con,$query)

?>

<script type="text/javascript">setTimeout("window.close();", 30);</script>