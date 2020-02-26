<html>
<body>
<h1 style="padding:5%;margin:15%;border:solid #aaa 1px;">
Welcome

<?php 

$er=0;
function test_input($data) {
	if(empty($data))  {$GLOBALS['er']=1;
	throw new Exception("Some filds are empty please <a href='log.html'>try again</a>");
	return 0;}
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

try{ 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $account = test_input($_POST["account"]);
  $pass = test_input($_POST["pass"]);
  }


call_data();


}catch(Exception $e) {
  echo $e->getMessage();
}
 function  call_data()
 {
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

global  $account;
global  $pass;


// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


$sql = "SELECT * FROM users WHERE account = '$account';";
$result = $conn->query($sql);
if (!empty($result) && $result->num_rows > 0) {
   //  output data of each row
    while($row = $result->fetch_assoc()) {
		if ($row["pass"]==$pass){
			echo   $row["first"]. " " . $row["last"]. "!<br>";
		}else {
		echo ",Your username or password is 
		incorrect <br>You can <a href='log.html'>try again</a>
		or <a href='reg.html'>create an account</a>";
		}
	}
} else {
		echo ",Your username or password is 
		incorrect <br>You can <a href='log.html'>try again</a>
		or <a href='reg.html'>create an account</a>";
}
 


$conn->close();
 }
 ?>
 </h1>
</body>
</html>
