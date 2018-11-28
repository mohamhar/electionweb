<?php
include ("dbconfig.php");
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$size = count($_POST['id_req']);
$i=0;
while ($i < $size)
{
    $vol= $_POST['volval'][$i];
    $id_req = $_POST['id_req'][$i];
    if($vol==2)
    {
        --$voting;
        $queryreq = "select name, email, phone, city from $dbname.$table4 where id_req=$id_req";
        $resultreq = mysqli_query($con,$queryreq);
        ##echo $queryreq;
        while ($row = mysqli_fetch_assoc($resultreq))
        {
            $name=$row['name'];
            $email=$row['email'];
            $phone=$row['phone'];
            $city=$row['city'];
        }
        $queryin = "insert into $dbname.$table(name,phone,city,email,password,authority) values ('$name','$phone','$city','$email','CHANGETHISASAP',0)";
        $queryup = "update $dbname.$table4 set allow = '$volval' where id_req = '$id_req' limit 1";
        mysqli_query($con,$queryin) or die ("Error in query: $queryin");
        mysqli_query($con,$queryup) or die ("Error in query: $queryup");
        echo "<br>";
        ##echo $queryin;
        echo "<br>";
        ##echo $queryup;
        echo "<br>$id_req updated<br>";
    }
    elseif($vol==1)
    {
        --$vol;
        $queryup = "update $dbname.$table4 set allow = '$volval' where id_req = '$id_req' limit 1";
        mysqli_query($con,$queryup) or die ("Error in query: $queryup");
        echo "<br>";
        ##echo $queryup;
        echo "<br>$id_req updated<br>";
    }
    ++$i;
}
?>