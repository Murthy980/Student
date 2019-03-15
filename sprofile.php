<!doctype html>
<?php
      session_start();
      if(!isset($_SESSION['login_user']))
      {
        header("Location: session.php");
      }
?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studinfosystem";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $user = $_SESSION["login_user"];
    $sql = "select * from student where id='$user'";
    $res = mysqli_query($conn, $sql);
?>
<html>
<head>
<title>Website</title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sprofile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
table{
   color:ivory;
   width:40%;
   text-align:center;
}
</style>
</head>
<body>
<br>
<table>

</table>
<span style="color:ivory; font-size: 330%; margin-left:40%;">Student Profile </span>
<span style="float:right; "><a href="Connection.php" style="color:#FBEEC1; font-size:250%; text-decoration:none;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></span>
<br>
<br>


<div class="nav">
  <a href="sprofile.html" class="home">Home</a>
  <a href="registration.html" class="reg">Registration</a>
  <a href="gradecard.html" class="gdcard" >Grade card</a>
  <a href="feedback.html" class="fdback">Feedback</a>
</div>
<div class="mytable">
<table  class="fetch">
    <tr style="font-size:25px;">
        <td>Firstname</td>
        <td>Lastname</td>
        <td>Branch</td>
        <td>Photo</td>
    </tr>
    <?php
        $row = mysqli_fetch_assoc($res);
    ?>
    <tr>
        <td><?php echo ucfirst($row["firstname"]) ?></td>
        <td><?php echo ucfirst($row["lastname"]) ?></td>
        <td><?php echo $row["branch"] ?></td>
        <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>'; ?></td>
    </tr>
</table>

<h1 style="font-size:30px;">General Notices</h1>
<table>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >10-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>PRIME MINISTER CONFERENCE </b></a></td>
</tr>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >09-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>FEE STRUCTURE </b></a></td>
</tr>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >08-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>PAYMENT NOTICE</b></a></td>
</tr>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >07-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>REGESTRATION FOR EVEN SEMESTER</b></a></td>
</tr>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >06-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>RESULTS OF ODD SEMESTER</b></a></td>
</tr>
<tr>
<td style="width:20px"><p><span class="symbol"></p></span></td>
<td style="width:100px"><span class="date" >05-02-2019  </span></td>
<td><a href="#" target="_blank" class="note">NOTICE REGARDING THE<b>SUSPENSION OF CLASSES</b></a></td>
</tr>
</table>
</div>
</body>
