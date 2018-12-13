<?php
include ("dbconfig.php");
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$size = count($_POST['id']);
echo $size."<br>";
$i=0;
while ($i < $size)
{
    $id= $_POST['id'][$i];
    $pass= $_POST['password'][$i];
    $ward= $_POST['ward'][$i];
    $district= $_POST['district'][$i];
    $authority= $_POST['authority'][$i];
    $query = "update $dbname.$table set password = '$pass',ward='$ward',district='$district',authority='$authority' where id = '$id' limit 1";
    mysqli_query($con,$query) or die ("Error in query: $query");
    echo $query."<br>";
    echo "<br>$id Updated to $voting<br>";
    ++$i;
}
?>