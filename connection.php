<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "builder_proj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function add_user($email,$password,$conn)
{
	$sql = "INSERT INTO users (user_name, password, date_created)
VALUES ('".$email."', '".$password."', '".date('Y-m-d H:i:s')."')";

if (mysqli_query($conn,$sql) === TRUE) {
  return true; 
} else {
  return false;
}

}

function fetch_user($email,$password,$conn)
{
	$sql = "select * from  users where user_name =  '".$email."' and password =  '".$password."'";
	 $result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
	  return true; 
	} else {
	   return false; 
	}
}

?>