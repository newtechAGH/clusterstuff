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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href="signin.css" rel="stylesheet">
<script src="js/validate_register.js"></script>

<style>
	body
	{
		margin:0;
		padding:0;
		background:url("images/wizard.jpg");
		background-size:cover;
		background-repeat:no-repeat;
	}
	.container
	{
		margin-top:150px;

	}
	.form-signin
	{
		background: #ffffff;
		padding:20px 20px;
		border-radius:10px;
	}
</style>
<script>
	$(document).ready(function(){
		$('.container').hide().fadeIn(2000);

    $("#cancel").click(function(){
      window.location.href = "/";
    });


   $('form').submit(function(e){
     $.ajax({
       type:"POST",
       url:"register.php",
       data:
       {
         name:document.getElementById("register").elements[0].value,
         surname:document.getElementById("register").elements[1].value,
         mail:document.getElementById("register").elements[2].value,
         password:document.getElementById("register").elements[3].value
       },
       success:function(e)
       {
           if(e=="ok")
           {
             location.href='/';
           }
           else if(e=="error")
           {
             alert("Uzytkownik istnieje");
           }
       }
 });

       e.preventDefault();

   });

	});
</script>
</head>



<body>

    <div class="container">

      <form class="form-signin" name="register" id="register" method="post" validate>
        <h2 class="form-signin-heading">Witamy</h2>
         <label for="inputName" class="sr-only">Name</label>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>

         <label for="inputSurname" class="sr-only">Surname</label>
        <input type="text" name="surname" id="inputSurname" class="form-control" placeholder="Surname" required>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="mail" id="inputEmail" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-warning btn-block" type="submit">Register</button>
         <button class="btn btn-lg btn-warning btn-block" id="cancel">Cancel</button>
      </form>

    </div> <!-- /container -->



</body>
</html>
