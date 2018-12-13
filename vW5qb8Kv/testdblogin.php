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

function printDB($db)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query = "select id_elec, id_vote, ward, district, lastname, firstname, middle, street_num, suffix_a, street_name, unit, phone, email, dob, party, reg_date, voted_2018, last_boe_election, num_boe_election, date_last_prim, num_prim, date_last_gen, num_gen, voting_jerry, volunteering, campaign_contr, transportation from $dbname.$db";
    $result = mysqli_query($con, $query);
    echo "<table><tr>
<th>id_elec</th>
<th>id_vote</th>
<th>ward</th>
<th>district</th>
<th>lastname</th>
<th>firstname</th>
<th>middle</th>
<th>street_num</th>
<th>suffix-a</th>
<th>street_name</th>
<th>unit</th>
<th>phone</th>
<th>email</th>
<th>dob</th>
<th>party</th>
<th>reg-date</th>
<th>voted_2018</th>
<th>last_boe_election</th>
<th>num_boe_election</th>
<th>date_last_prim</th>
<th>num_prim</th>
<th>sdate_last_gen</th>
<th>num_gen</th>
<th>voting_jerry</th>
<th>volunteering</th>
<th>campaign_contr</th>
<th>transportation</th>
</tr>";
$i=0;
    while ($row = mysqli_fetch_assoc($result)) {
    	if($i%2==1)
            $cell="#f5f5f0";
        else 
            $cell="#ffffff";
        echo "<tr>
<td bgcolor=$cell>" . $row["id_elec"] . "</td>
<td bgcolor=$cell>" . $row["id_vote"] . "</td>
<td bgcolor=$cell>" . $row["ward"] . "</td>
<td bgcolor=$cell>" . $row["district"] . "</td>
<td bgcolor=$cell>" . $row["lastname"] . "</td>
<td bgcolor=$cell>" . $row["firstname"] . "</td>
<td bgcolor=$cell>" . $row["middle"] . "</td>
<td bgcolor=$cell>" . $row["street_num"] . "</td>
<td bgcolor=$cell>" . $row["suffix_a"] . "</td>
<td bgcolor=$cell>" . $row["street_name"] . "</td>
<td bgcolor=$cell>" . $row["unit"] . "</td>
<td bgcolor=$cell>" . $row["phone"] . "</td>
<td bgcolor=$cell>" . $row["email"] . "</td>
<td bgcolor=$cell>" . $row["dob"] . "</td>"
.party($row["party"]).
"<td bgcolor=$cell>" . $row["reg_date"] . "</td>
<td bgcolor=$cell>" . $row["voted_2018"] . "</td>
<td bgcolor=$cell>" . $row["last_boe_election"] . "</td>
<td bgcolor=$cell>" . $row["num_boe_election"] . "</td>
<td bgcolor=$cell>" . $row["date_last_prim"] . "</td>
<td bgcolor=$cell>" . $row["num_prim"] . "</td>
<td bgcolor=$cell>" . $row["date_last_gen"] . "</td>
<td bgcolor=$cell>" . $row["num_gen"] . "</td>
<td bgcolor=$cell>" . $row["voting_jerry"] . "</td>
<td bgcolor=$cell>" . $row["volunteering"] . "</td>
<td bgcolor=$cell>" . $row["campaign_contr"] . "</td>
<td bgcolor=$cell>" . $row["transportation"] . "</td>
</tr>";
++$i;
    }
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($con);
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
$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");

$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
if($password==Dzs0oae6LPEOOcAsjoXkMgkiBCMkeLYd)
    printDB($table5);
elseif($password==test)
    printDB($demo);
else
    Echo "Wrong password";

?>
