<?php

function generateCookie($username)
{
    $cookie_name = "jerrymercadostaff";
    $cookie_value = $username;
    setcookie($cookie_name, $cookie_value, time() + (86400),  '/');
}

function checkLogin($username,$password)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "Select email from $dbname.$table where email='$username'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 0) 
    {
        return true;
    }
    else 
    {
        return false;
    }
    mysqli_free_result($result);
    
    mysqli_close($con);
    
}

function checkPassword($username,$password)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select email,password from $dbname.$table where email='$username' and BINARY(password)='$password'";
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    if (($row[password] == $password) && ($row[email] == $username))
    {
        return true;
    }
    else
    {
        return false;
    }
    mysqli_free_result($result);
    
    mysqli_close($con);
}

function printHTML($username,$password)
{
    generateCookie($username);
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select name,authority from $dbname.$table where email='$username' and BINARY(password)='$password'";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "Welcome ".$row['name']."<br>";
        $authority=$row['authority'];
    }
    if ($authority!=0)
    {
        echo "<a href='updatecall.php'> List all users</a>";
    
        if ($authority==5)
        {
        echo "<br> Hi Jerry";
        }
    }
    else 
    {
       echo "<br>No access";
    }
    mysqli_free_result($result);
    
    mysqli_close($con);
}

define("IN_CODE", 1);
include ("dbconfig.php");

$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");

$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);


$status=checkLogin($username,$password);


if ($status) 
{
     echo "<br>login does not exist\n";
} 
else 
{
    $status=checkPassword($username,$password);
    if ($status)
        printHTML($username, $password);
    else
    {}
       ## echo "<br>User exists but password is incorrect\n";
}
mysqli_close($con);
?>
