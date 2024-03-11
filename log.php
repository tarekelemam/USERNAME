<!DOCTYPE html>
<html>
<head>
	<style>
		.center {
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
	</style>
<Title>Blegen Library Log page</Title>

<center><a><H1>Blegen library log</H1></a></center>
</head>
<body>

<?php
date_default_timezone_set('Europe/Athens');
echo "Date:";
echo date('m/d/Y') . "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

 


 

//storing database details in variables.

$currentDate = date('m/d/Y');

$hostname = '172.16.0.19';

$username = 'tarekadmin';

$password = 'ascsa*85';

$dbname = 'members1';

 

//creating connection to database

$con = mysqli_connect($hostname, $username, $password, $dbname);

 

//checking if connection is working or not

if ($con->connect_error) {

    die('Connection failed: ' . $con->connect_error . "<br>");

} 

 

//Output Form Entries from the Database

$sql = "SELECT rfid_log.type, rfid_log.RFID, rfid_log.date, rfid_log.time, `library visitors`.`expDate`,`library visitors`.`Name`, `library visitors`.`LastName`,`library visitors`.`type0` , `library visitors`.`ImageFileName`

FROM rfid_log

LEFT JOIN `library visitors`

ON rfid_log.RFID = `library visitors`.CardNumber 

WHERE rfid_log.date = '$currentDate'

ORDER BY rfid_log.date ASC, rfid_log.time ASC  ";
 

//fire query

$result = mysqli_query($con, $sql);





//checking if query is working or not

   if (mysqli_num_rows($result) > 0) {

        echo '<table border="1" class="Center" style="width:80%">';

        echo '<tr><th>---</th><th>RFID</th><th>LastName</th><th>FirstName</th><th>Date</th><th>Time</th><th>ExpiredDate</th><th>Type</th><th>Photo</th>';

        while ($row = mysqli_fetch_assoc($result)) {

            echo '<tr>';
            echo '<td>' . $row['type'] . '</td>';

            echo '<td>' . $row['RFID'] . '</td>';

            echo '<td>' . $row['LastName'] . '</td>';

            echo '<td>' . $row['Name'] . '</td>';

            echo '<td>' . $row['date'] . '</td>';

            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . $row['expDate'] . '</td>';
            echo '<td>' . $row['type0'] . '</td>';
            echo "<td><img src='photos/" . $row["ImageFileName"] . "' width='100' height='100'></td>";


            echo '</tr>';

        }

        echo '</table>';

    } else {

        echo '0 results';

    }

 

mysqli_close($con);

?>