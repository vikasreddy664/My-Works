<?php
session_start();
include("config.php");
$select="select * from users where userid='$_SESSION[userid]'";
$result=mysqli_query($conn,$select); 
$Fetch = mysqli_fetch_array($result);
$email=$_SESSION['email'];
if($_SESSION['userid']=="")
{
  echo "<script>location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html>   
<head>
  <title>HOME | Einsehen.com</title>
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <style type="text/css">
   body,
   html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 80%;
    background-image: url('01.jpg') !important;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .made-with-mk {
    width: 50px;
    height: 50px;
    display: block;
    position: fixed;
    z-index: 555;
    bottom: 40px;
    right: 40px;
    border-radius: 30px;
    background-color: rgba(16, 16, 16, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #FFFFFF;
    cursor: pointer;
    padding: 10px 12px;
    white-space: nowrap;
    overflow: hidden;
    -webkit-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    -moz-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    -o-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  }
  .made-with-mk:hover, .made-with-mk:active, .made-with-mk:focus {
    width: 270px;
    color: #FFFFFF;
    transition-duration: .55s;
    padding: 10px 30px;
  }
  .made-with-mk:hover .made-with, .made-with-mk:active .made-with, .made-with-mk:focus .made-with {
    opacity: 1;
  }
  .made-with-mk:hover .brand, .made-with-mk:active .brand, .made-with-mk:focus .brand {
    left: 0;
  }
  .made-with-mk .brand,
  .made-with-mk .made-with {
    float: left;
  }
  .made-with-mk .brand {
    color: #4d4d4d;
    position: relative;
    top: 3px;
    left: -1px;
    vertical-align: middle;
    font-size: 16px;
    font-weight: 600;
  }
  .made-with-mk .made-with {
    color: rgba(255, 255, 255, 0.6);
    position: absolute;
    left: 75px;
    top: 10px;
    opacity: 0;
    margin: 0;
    -webkit-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    -moz-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    -o-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
    transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  }
  .made-with-mk .made-with strong {
    font-weight: 400;
    color: #4d4d4d;
  }
  .login_btn {
    width: 100%;
    background: #4d4d4d !important;
    color: white !important;
  }
</style>
</head>
<body>
  <a target="_blank" href="http://vikasreddy.tk" class="made-with-mk">
    <div class="brand">VR</div>
    <div class="made-with">Designed by <strong >VIKAS REDDY</strong></div>
  </a>
  <div style="width:60%;margin-left:40%;" class="container h-100">
    <label><h2 style="margin-top:50%;margin-bottom:auto;color: grey">Welcome to <b>EINSEHEN<b></h2></label> 
     <br>
     <br>
     <label><button style="margin-top:auto;margin-bottom:auto;margin-left: 40%" type="submit" name="submit"  class="btn login_btn " id="submit"><a style="text-decoration: none;color:white" onclick="return confirm('  Are you sure to Log Out...?')" href="logout.php">Click Here To Log Out </a></button></label>
   </div>
 </body>
 </html>