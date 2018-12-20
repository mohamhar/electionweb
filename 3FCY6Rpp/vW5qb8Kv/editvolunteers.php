
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
$cookie_name = "jerrymercadostaff";
function printTable($dist)
{
    echo "<br><a href='https://passwordsgenerator.net/'>Password generator</a><br>";
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id,name,phone,city,email,password,ward,district,authority from $dbname.$table where authority!=5";
    $result = mysqli_query($con, $query);
    $i=0;
    echo "<table><tr>";
    echo "<th>id</th>";
    echo "<th>name</th>";
    echo "<th>phone</th>";
    echo "<th>city</th>";
    echo "<th>email</th>";
    echo "<th>password</th>";
    echo "<th>ward</th>";
    echo "<th>district</th>";
    echo "<th>authority</th>";
    echo "</tr>";
    echo "<form name='update' method='post' action='editvol.php'>\n";
    printDB();
    
    echo '<tr>';
    echo "<td><input type='submit' value='submit' /></td>";
    echo '</tr>';
    echo "</form>";
    echo '</table>';
    
}

function printDB()
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id,name,phone,city,email,password,ward,district,authority from $dbname.$table where authority!=5";
    $result = mysqli_query($con, $query);
    $i=0;
    while ($row = mysqli_fetch_assoc($result))
    {
        if($i%2==1)
            $cell="#f5f5f0";
            else
                $cell="#ffffff";
                echo '<tr>';
                echo '<tr>';
                echo "<td bgcolor=$cell>{$row['id']}<input type='hidden' name='id[$i]' value='{$row['id']}'/></td>";
                echo "<td bgcolor=$cell>{$row['name']}</td>";
                echo "<td bgcolor=$cell>{$row['phone']}</td>";
                echo "<td bgcolor=$cell>{$row['city']}</td>";
                echo "<td bgcolor=$cell>{$row['email']}</td>";
                echo "<td bgcolor=$cell><input type='text' name='password[$i]' value='{$row['password']}'/></td>";
                echo "<td bgcolor=$cell><input type='num' name='ward[$i]' value='{$row['ward']}'/></td>";
                echo "<td bgcolor=$cell><input type='num' name='district[$i]' value='{$row['district']}'/></td>";
                echo "<td bgcolor=$cell><input type='num' name='authority[$i]' value='{$row['authority']}'/></td>";
                echo "</tr>";
                ++$i;
    }
    
}




function checkCookied($cookie_name)
{
    if (! isset($_COOKIE[$cookie_name]))
    {
        $district=0;
    }
    else
    {
        include ("dbconfig.php");
        $username=$_COOKIE[$cookie_name];
        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        $query = "select district from $dbname.$table where email='$username'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $district=$row['district'];
        }
    }
    return $district;
}

function checkCookiew($cookie_name)
{
    if (! isset($_COOKIE[$cookie_name]))
    {
        $ward=0;
    }
    else
    {
        include ("dbconfig.php");
        $username=$_COOKIE[$cookie_name];
        $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
        $query = "select ward from $dbname.$table where email='$username'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $ward=$row['ward'];
        }
    }
    return $ward;
}



$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
$dist=checkCookied($cookie_name);
$ward=checkCookiew($cookie_name);
if($dist!=0)
    printTable($dist);
else
    echo "<br>please <a href=\"index.html\">login</a>";
        







?>