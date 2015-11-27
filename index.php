<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
<link href="signin.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<script src="js/validate_login.js"></script>

<style>


body{
  background:url("images/large.jpg");
  background-size:cover;
  background-repeat:no-repeat;
}
	.form-signin
	{
		background: #ffffff;
		padding:20px 20px;
		border-radius:10px;
		z-index:1000;
}
.container
{
	z-index: 1000;
  margin: 150px auto;
}

</style>

<script>
	$(document).ready(function(){
		$('.container').hide().fadeIn(2000);



    $('form').submit(function(e){

        $.ajax({
          type:"POST",
          url:"php/login.php",
          data:
          {
              login:document.getElementById("login").elements[0].value,
              pass:document.getElementById("login").elements[1].value
          },
          success:function(msg)
          {
               if(msg == "zalogowany")
               {
                 location.href = "main.php";
               }
          }
        });

          e.preventDefault();

    });
    $('#reg').click(function(){
      window.location.href = "/reg.php";
    });
	});
</script>
</head>



<body>

    <div class="container">

      <form class="form-signin" name="login" id="login" type="POST" action="php/login.php" validate>
        <h2 class="form-signin-heading">ClusterStuff</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-warning btn-block" type="submit">Log in</button>
        <button class="btn btn-lg btn-warning btn-block" id="reg">Register</button>

      </form>

    </div>



</body>
</html>
