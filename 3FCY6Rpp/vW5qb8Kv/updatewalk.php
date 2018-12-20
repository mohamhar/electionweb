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
function printTable($dist,$ward)
{
   
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id_elec,lastname,firstname,street_num,suffix_a,street_name,unit,party,voting_jerry from $dbname.$table5 where district=$dist and ward=$ward and phonenot like '%(%'";
    $result = mysqli_query($con, $query);
    $i=0;
    echo "<table><tr>";
    echo "<th>id</th>";
    echo "<th>lastname</th>";
    echo "<th>firstname</th>";
    echo "<th>street_num</th>";
    echo "<th>suffix_a</th>";
    echo "<th>street_name</th>";
    echo "<th>unit</th>";
    echo "<th>party</th>";
    echo "<th>voting_jerry</th>";
    echo "</tr>";
    echo "<form name='update' method='post' action='doupdate.php'>\n";  
    printDB($dist,$ward);
    
    echo '<tr>';
    echo "<td><input type='submit' value='submit' /></td>";
    echo '</tr>';
    echo "</form>";
    echo '</table>';
    
}

function printDB($dist,$ward)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id_elec,lastname,firstname,street_num,suffix_a,street_name,unit,party,voting_jerry from $dbname.$table5 where district=$dist and ward=$ward and phone not like '%(%'";
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
        echo "<td bgcolor=$cell>{$row['id_elec']}<input type='hidden' name='id_elec[$i]' value='{$row['id_elec']}'/></td>";
        echo "<td bgcolor=$cell>{$row['lastname']}</td>";
        echo "<td bgcolor=$cell>{$row['firstname']}</td>";
        echo "<td bgcolor=$cell>{$row['street_num']}</td>";
        echo "<td bgcolor=$cell>{$row['suffix_a']}</td>";
        echo "<td bgcolor=$cell>{$row['street_name']}</td>";
        echo "<td bgcolor=$cell>{$row['unit']}</td>";
        echo party($row['party']);
        echo "<td bgcolor=$cell>".vote($row['voting_jerry'],$i)."</td>";
        echo "</tr>";
        ++$i;
    }
    
}

function party($party)
{
    $color;
    if($party=="REP")
        $color="#ff9999";
    elseif($party=="DEM")
        $color="#9999ff";
    elseif($party=="GRE")
        $color="#b3ffb3";
    elseif($party=="LIB")
        $color="#ffff99";
    elseif($party=="RFP")
        $color="#ff99ff";
    else
        $color="#ffffff";
    return "<td bgcolor=$color>$party</td>";
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
    printTable($dist,$ward);
else
    echo "<br>please <a href=\"index.html\">login</a>";

?>




