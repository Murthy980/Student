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
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['pwd1']);
$pw1 = md5($password);
	$sql = "SELECT id FROM student WHERE username = '$username' and password = '$pw1'";
    $result = mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($result);
    /* $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];*/
    $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        $_SESSION["login_user"] = $res["id"];
        header("location: sprofile.php");
    }
    else {
        $msg = "Invalid password or Username";
        header("location: studsignin.php?msg=$msg");
    }
}
?>
