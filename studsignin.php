<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Log in/Sign up </title>

<link href='sign.css' rel='stylesheet' type='text/css'>
</head>

<body>
<h1>Student Information System</h1>

<div class="nav">
  <a href="home_trial.html" class="home">Home</a>
  <a href="studsignin.php" class="student" style="text-align:center;">Student</a>
  <a href="adminsignin.html" class="admin">Admin</a>
</div>

<h2 class="std_signin">STUDENT SIGNIN</h2>

<div class="login-page">
  <div class="form">

  <form action="sigin_stud.php" method="post" name="myform" id="register" class="login-form" >
  <br>
    <input type="text" placeholder="username" name="username" id="userid2" required onkeyup="user_validate()"  /><br>

     <input type="password" placeholder="password" name="pwd1" id="passwordid" required onkeyup="pass_validate()" /><br>
     <div class="error"></div>
      <input type="submit" value="LOGIN"   style="background-color:blue;color:white;font-size:17px;">
<span style="color: red; font-size: 20px;">
 <?php if(isset($_GET['msg']))
  echo $_GET['msg'];
  ?>
</span>

      <p class="message">Not registered? <class="reg"><a href="signup.html"><b>Create an account</b></a></p>
    <hr>
    <p class="forgot"><a href="request.html">forgot password</a></p>
    </form>
  </div>
</div>
</body>
</html>


<script type="text/javascript">
    function user_validate(){
      var user=document.myform.username.value;
      var username1=document.getElementById("userid2");
        if((user.charCodeAt(0) >= 65 && user.charCodeAt(0) <=90 )||( user.charCodeAt(0) >=97 && user.charCodeAt(0) <=122 ))
        {
           username1.style.border="1px solid green";
          username1.style.backgroundColor="";

        }
      else{
        username1.style.border="1px solid red";
        username1.style.backgroundColor="red";
      }
    }
    function pass_validate(){
   var pass=document.getElementById("passwordid");
   var pass1= /[0-9]/;
   var pass2=/[a-z]/;
   var pass3=/[A-Z]/;
   if(myform.pwd1.value.length >=8 && pass1.test(myform.pwd1.value) &&pass2.test(myform.pwd1.value) &&pass3.test(myform.pwd1.value) )
   {
    pass.style.border="1px solid green";
        pass.style.backgroundColor="";

   }
   else{
    pass.style.border="1px solid red";
    pass.style.backgroundColor="red";
   }
 }


</script>
