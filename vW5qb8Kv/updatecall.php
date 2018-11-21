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

function printTable($dist)
{
   
    include ("dbconfig.php");
    $con = mysqli_connect($server, $username, $pswd, $dbname) or die("Connection fail");
    $query = "select id_call,name,address,district,vote from $dbname.$table2 where district=$dist";
    $result = mysqli_query($con, $query);
    echo $query;
    $i=0;
    echo "<table><tr>";
    echo "<th>id</th>";
    echo "<th>name</th>";
    echo "<th>address</th>";
    echo "<th>district</th>";
    echo "<th>vote</th>";
    echo "</tr>";
    echo "<form name='update' method='post' action='doupdatecall.php'>\n";  
    printDB($dist);
    
    echo '<tr>';
    echo "<td><input type='submit' value='submit' /></td>";
    echo '</tr>';
    echo "</form>";
    echo '</table>';
    
}

function printDB($dist)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $username, $pswd, $dbname) or die("Connection fail");
    $query = "select id_call,name,address,district,vote from $dbname.$table2 where district=$dist";
    $result = mysqli_query($con, $query);
    $i=0;
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '<tr>';
        echo '<tr>';
        echo "<td>{$row['id_call']}<input type='hidden' name='id_call[$i]' value='{$row['id_call']}'/></td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['district']}</td>";
        echo "<td>".vote($row['vote'],$i)."</td>";
        echo "</tr>";
        ++$i;
    }
    
}

function vote($val,$i)
{
    if($val==NULL)
        return "<input type='radio' name='voteval[$i]' value='2'> YES<br>
         <input type='radio' name='voteval[$i]' value='1'> NO<br>";
         #return "    ";
    elseif ($val==1)
        return "YES";
    elseif ($val==0)
        return "NO";
}





$con = mysqli_connect($server, $username, $pswd, $dbname) or die("Connection fail");
$dist=$_GET["callval"];
printTable($dist);
?>




