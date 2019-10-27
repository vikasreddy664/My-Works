<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>   
<head>
  <title>Login | Einhesen.com</title>
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a target="_blank" href="http://vikasreddy.tk" class="made-with-mk">
    <div class="brand">VR</div>
    <div class="made-with">Designed by <strong >VIKAS REDDY</strong></div>
  </a>
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card" >
       <div class="d-flex justify-content-center" >
        <div class="brand_logo_container" style="background-color: #4d4d4d">
          <span><h5 style="margin-top:40%;color: white">EINHESEN</h5></span>
        </div>
      </div>
      <div class="d-flex justify-content-center form_container">
        <form class="form-horizontal" id="form_validation" action="" method="post">
          <div class="input-group mb-3">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong><p id="submit_error" style="color:#cc0000; margin:auto;margin-top: 15%"></p></strong>
          </div>
          <div class="input-group ">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control input_user" value="" placeholder="Enter userid" autocomplete="off">
          </div>
          <label><p id="name_error" style="color:#cc0000;margin:auto;"></p></label>
          <div class="input-group ">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="pwd" id="pwd" class="form-control input_pass" value="" placeholder="Enter password" autocomplete="off">
          </div>
          <label><p id="pwd_error" style="color:#cc0000; margin:auto;"></p></label>
          <div class="d-flex  links">
            <a href="#">Forgot password?</a>
          </div>
          <div class="d-flex justify-content-center mt-3 ">
            <button type="submit" name="submit"  class="btn login_btn" id="submit">Login</button>
          </div>
        </form>
      </div>
      <div class="mt-4">
        <div class="d-flex justify-content-center links">
          Don't have an account? <a href="#" class="ml-2" >Sign Up</a>
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
  $(document).ready(function(){
    var name;
    var pwd;
    var name_error=true;
    var pwd_error=true;

    $(document).ready(function(){
      $('#submit').attr("disabled",true);
    });
    $('#name').keyup(function(){
      name=$('#name').val();
      if(name.length<1){
       $('#name').css("border","1px solid red");
       $('#name').css("box-shadow","3px 1px 3px red");
       $('.user_card').css("border", "2px solid #cc0000");
       $('.brand_logo_container').css("border", "6px solid #cc0000");
       $('#name_error').html("Enter your Id !");

       $('#submit').attr("disabled",true);

       name_error=true;
     }
     else
     {
      $('#submit_error').html("");
      $('#name').css("border","1px solid green");
      $('#name').css("box-shadow","3px 1px 3px green");
      $('.user_card').css("border", "2px solid white");
      $('.brand_logo_container').css("border", "6px solid white");
      $('#name_error').html("");

      name_error=false;

      if(name_error==false && pwd_error==false )
      {
        $('#submit_error').html("");
        $('.user_card').css("border", "2px solid green");
        $('.brand_logo_container').css("border", "6px solid green");
        $('#submit').attr("disabled",false);
      }
      else
      {
        $('#submit').attr("disabled",true);
      }
    }
  });

    $('#pwd').keyup(function(){
      pwd=$('#pwd').val();
      if(pwd.length<5){
        $('#pwd').css("border","1px solid red");
        $('#pwd').css("box-shadow","3px 1px 3px red");
        $('.user_card').css("border", "2px solid #cc0000");
        $('.brand_logo_container').css("border", "6px solid #cc0000");
        $('#pwd_error').html("Minimum length:5 !");
        
        $('#submit').attr("disabled",true);
        
        pwd_error=true;

      }
      else
      {
        $('#submit_error').html("");
        $('#pwd').css("border","1px solid green");
        $('#pwd').css("box-shadow","3px 1px 3px green");
        $('.user_card').css("border", "2px solid white");
        $('.brand_logo_container').css("border", "6px solid white");
        
        $('#pwd_error').html("");
        
        pwd_error=false;

        if(name_error==false && pwd_error==false )
        { 
          $('#submit_error').html("");
          $('.user_card').css("border", "2px solid green");
          $('.brand_logo_container').css("border", "6px solid green");
          $('#submit').attr("disabled",false);
        }
        else
        {
          $('#submit').attr("disabled",true);
        }
      }
    });
    $('#form_validation').submit(function(){
      if(name_error==true ||
        pwd_error==true){
        return false;
    }
    else
    {
      return true;
    }
  });
  });
</script>
<?php
if(isset($_POST['submit']))
{
  $user=mysqli_real_escape_string($conn,$_POST['name']);
  $pass=mysqli_real_escape_string($conn,$_POST['pwd']);
  $select="select * from users where userid='$user'and password='$pass'";
  $res=mysqli_query($conn,$select);
  $fetch=mysqli_fetch_array($res);
  $rc=mysqli_num_rows($res);
  if($rc==1)
  {
    if ($user==$fetch['userid'] && $pass==$fetch['password'])
    {

      $_SESSION['userid']=$user;
      $_SESSION['id']=$user;
      echo "<script>alert('login successfully');</script>";
      echo "<script>location.href='home.php'</script>";
    }

    else
    {
      echo "<script>$('#submit_error').html('Invalid Credentials !');</script>";
      echo "<script>$('.user_card').css('border', '2px solid #cc0000');</script>";
      echo "<script>$('.brand_logo_container').css('border', '6px solid #cc0000');</script>";
      // echo"<script> alert('Invalid Credentials');</script>";
      echo "<script> location.href='index.php' </script>";
    }
  }
  else
  {
    echo "<script>$('#submit_error').html('Invalid Credentials !');</script>";
    echo "<script>$('.user_card').css('border', '2px solid #cc0000');</script>";
    echo "<script>$('.brand_logo_container').css('border', '6px solid #cc0000');</script>";
    // echo "<script>alert('Invalid Credentials');</script> ";
  }
}
?>