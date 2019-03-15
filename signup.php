<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "studinfosystem";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$roll = $_POST["roll"];
	$register = $_POST["register"];
	$mail = $_POST["mail"];
	$dob = $_POST["date"];
	$dob = str_replace('/', '-', $dob);
	$dob = date('Y-m-d', strtotime($dob));
	$number = $_POST["number"];
	$branch = $_POST["branch"];
	$gender = $_POST["gender"];
	$hobbies =mysqli_real_escape_string($conn, $_POST["message"]);
	$password = $_POST["pwd1"];
	$pw1 = md5($password);

	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


	$sql = "INSERT INTO student (id,firstname,lastname,username,rollnumber,branch,dob,phoneno,email,gender,hobbies,password,image)
          VALUES ('$register','$firstname','$lastname','$username','$roll','$branch','$dob','$number','$mail','$gender','$hobbies','$pw1','$file')";



	if (mysqli_query($conn, $sql)){
		header("Location: studsignin.php");
	}
	else {
		echo "Error Storing data: " . mysqli_error($conn);
	}

	mysqli_close($conn);
 }
?>
