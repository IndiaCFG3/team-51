<html lang="zxx">

<head>
<meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div class="wrapper">
    <div class="container">
      
      <div class="signup">Log in as a Student Teacher</div>
      <div class="login">Log in as an Assosiate</div>
      <form onsubmit="return false;">
       <div class="signup-form">
          <input type="text" id="email" placeholder="Your Email Address" class="input"><br/>
          <input type="password" id="password" placeholder="Your Password" class="input"><br />

          <div class="btn" onclick="loginstudent();" >Log in</div>
          <div class="formResult"> </div>
          </div>
      </form>
      <form onsubmit="return false;">
      <div class="login-form">
          <input type="text" id="username" placeholder="Username" class="input"><br />
          <input type="password" id="apassword" placeholder="Password" class="input"><br />
          <div class="btn" onclick="loginassociate();">Log in</div>
          <div class="formResult"> </div>
         <!-- <span><a href="#">I forgot my username or password.</a></span>-->
       </div>
       </form>
      
    </div>
  </div>


</body>
</html>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/core.js"></script>
   
<script>
$(".login-form").hide();
$(".login").css("background", "none");

$(".login").click(function(){
  $(".signup-form").hide();
  $(".login-form").show();
  $(".signup").css("background", "none");
  $(".login").css("background", "#fff");
});

$(".signup").click(function(){
  $(".signup-form").show();
  $(".login-form").hide();
  $(".login").css("background", "none");
  $(".signup").css("background", "#fff");
});

$(".btn").click(function(){
  $(".input").val("");
});
</script>