$servername = "localhost";
$username = "doanpr5_duckegg22";
$password = "dxqM]@Gw7UwR";
$dbname = "doanpr5_records2";

$mysqli = new mysqli($servername, $username, $password, $dbname);
mysqli_report(MYSQLI_REPORT);

//Just always use "localhost".  And beware of MYSQLI_REPORT_ALL.