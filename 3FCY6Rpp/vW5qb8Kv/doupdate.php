<?php
include ("dbconfig.php");
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$size = count($_POST['id_elec']);
echo $size."<br>";
$i=0;
while ($i < $size) 
{
    $voting= $_POST['voteval'][$i];
    $id = $_POST['id_elec'][$i];
    if($voting==2||$voting==1)
    {
        --$voting;
        $query = "update $dbname.$table5 set voting_jerry = '$voting' where id_elec = '$id' limit 1";
        mysqli_query($con,$query) or die ("Error in query: $query");
        echo $query."<br>";
        echo "<br>$id Updated to $voting<br>";
    }   
    ++$i;
}
?>