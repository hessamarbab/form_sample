<html>
<body>
<h1 style="padding:5%;margin:15%;border:solid #aaa 1px;">
Welcome
<?php 

$er=0;
function test_input($data) {
	if(empty($data))  {$GLOBALS['er']=1;
	throw new Exception("Some filds are empty please <a href='reg.html'>try again</a>");
	return 0;}
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}try{ 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $first = test_input($_POST["first"]);
  $last = test_input($_POST["last"]);
  $account = test_input($_POST["account"]);
  $pass = test_input($_POST["pass"]);
  $pass_rep = test_input($_POST["pass_rep"]);
  $gender = test_input($_POST["gender"]);
	if($pass!=$pass_rep) throw new Exception("Your pass isn't valid <a href='reg.html'>try again</a>");
  }
if($gender=='male')
echo 'Mr.';
else
echo 'Ms.';
echo $last.'! <br>';

add_data();


}catch(Exception $e) {
  echo $e->getMessage();
}
 function  add_data()
 {
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
$db = "test";
global $first;
global  $last;
global  $account;
global  $pass;
if($GLOBALS['gender']=="male")
  $gender =1;else $gender =0;

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


$sql = "SELECT id FROM sample WHERE account=".$account.";";
$result = $conn->query($sql);
echo $result;

$sql = "INSERT INTO users (first, last, account,pass,gender)
VALUES ('$first','$last', '$account','$pass', '$gender')";

if ($conn->query($sql) === TRUE) {
	echo ' your account has been maked!';
} else {
    echo "your username is repeatitive  please <a href='reg.html'>try again</a> " ;
}

$conn->close();
 }
 ?>
 </h1>
</body>
</html>
