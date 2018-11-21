<?php
include ("dbconfig.php");
$con = mysqli_connect($server, $username, $pswd, $dbname) or die("Connection fail");
$size = count($_POST['id_call']);
$i=0;
while ($i < $size) 
{
    $voting= $_POST['voteval'][$i];
    $id_call = $_POST['id_call'][$i];
    if($voting==2||$voting==1)
    {
        --$voting;
        $query = "update $dbname.$table2 set vote = '$voting' where id_call = '$id_call' limit 1";
        echo $query;
        mysqli_query($con,$query) or die ("Error in query: $query");
        echo "<br>$id_call Updated to $voting<br>";
    }   
    ++$i;
}
?>