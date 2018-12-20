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

function printDB()
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id,name,email,password,walklist,calllist,district,authority from $dbname.$table";
    $result = mysqli_query($con, $query);
    echo "<table><tr>
<th>id</th>
<th>name</th>
<th>email</th>
<th>password</th>
<th>walklist</th>
<th>calllist</th>
<th>district</th>
<th>authority</th>
</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
<td>" . $row["id"] . "</td>
<td>" . $row["name"] . "</td>
<td>" . $row["email"] . "</td>
<td>" . $row["password"] . "</td>
<td>" . $row["walklist"] . "</td>
<td>" . $row["calllist"] . "</td>
<td>" . $row["district"] . "</td>
<td>" . $row["authority"] . "</td>
</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($con);
}
printDB();

?>
