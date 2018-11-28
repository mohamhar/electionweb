<html>
<head>
<style>
table, th, td {
	border: 1px solid black;
}
</style>
</head>
<body>

</body>
</html>

<?php
define("IN_CODE", 1);
include ("dbconfig.php");

function printDB($dist)
{
    
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id_call,name,address,district,vote from $dbname.$table2 where district=$dist";
    $result = mysqli_query($con, $query);
    echo "<table><tr>
<th>id</th>
<th>name</th>
<th>address</th>
<th>district</th>
<th>vote</th>
</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
<td>" . $row["id_call"] . "</td>
<td>" . $row["name"] . "</td>
<td>" . $row["address"] . "</td>
<td>" . $row["district"] . "</td>
<td>" . vote($row["vote"]) . "</td>
</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($con);
}

function vote($val)
{
    if($val==NULL)
        return "  ";
    elseif ($val==1)
        return "YES";
    elseif ($val==0)
        return "NO";
}
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$dist=$_POST["callval"];
printDB($dist);
?>