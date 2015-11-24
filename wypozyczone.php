<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Main Page">
    <meta name="author" content="Michal Zegen">

    <!-- CSS files-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="dashboard.css" rel="stylesheet">

     <!--JS files-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/get_user_data.js"></script>
      <script type="text/javascript" src="js/get_element_by_id.js"></script>




    <!-- Custom CSS -->
    <style>

    	tr:not(.warning):not(.danger)
    	{
    		cursor:pointer;
    	}
    	.warning,.danger
    	{
    		cursor:not-allowed;
    	}
      .hide
      {
        visibility: hidden;
      }

      .disapear
      {
        display: none;
      }
    </style>

    <!-- Custom JS-->
    <script type="text/javascript">



    	$(document).ready(function(){


         $.getScript("js/add_element.js",function(){
            new_element();
         });


      $('#add').click(function(){
         $('#myModal').modal('show');
      });


      $.ajax({
        type:"POST",
        dataType:"json",
        async:false,
        url:"php/borrowed_elements.php",
        success:function(e)
        {
          for(var a = 0 ; a<e.length;a++)
          {
            var user = getUserById(e[a].user);
            var element = getElementBy(e[a].element);

            var row = $("<tr>");

              row.append($("<td>"+e[a]["id"]+"</td>"))
                   .append($("<td>"+user.name+" "+user.surname+"</td>"))
                   .append($("<td>"+element.nazwa+"</td>"))
                   .append($("<td>"+element.kategoria+"</td>"))
                   .append($("<td>"+e[a]["data"]+"</td>"))
                    .append($("<td><button class='btn btn-primary oddaj' id='"+e[a]["id"]+"'>Zwróć</button></td>"))
                    .append($("<td class='hide'>"+user.id+"</td>"))
                     .append($("<td class='hide'>"+element.id+"</td>"));

            $("#table_elements").append(row);
          }
        }
      });
    var user = getUser($('#login').data("value"),$('#password').data("value"));
    $('#powitanie').html("Twoje wypozyczone elementy, "+user.name+" "+user.surname);


    $('.oddaj').on("click",function(){
        //Skasuj wartosc z tabeli ElementsBorrowed i zmien wartosc na 0 w tabeli Elemenets kolumna wypozyczone
    });

});
    </script>
</head>



<body>

    <input type="hidden" id="login" data-value=<?php echo $_SESSION['login']; ?> />
      <input type="hidden" id="password" data-value=<?php echo $_SESSION['password']; ?> />


	<!--Include templates-->
     <?
     include("templates/add_element.php");
     include("templates/show_request.php");
     ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ClusterStuff</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Wypożyczone <span class="badge" style="background-color:green;">0</span></a></li>
            <li><a href="#">Oczekujace <span class="badge">0</span></a></li>
                <li><a href="#">Nowi <span class="badge">0</span></a></li>
            <li><a href="#">Wyloguj</a></li>
          </ul>
          <form class="navbar-form navbar-right">
          	 <!-- Button trigger modal -->
 <button type="button" class="btn btn-warning" data-toggle="modal" id="add">
  Add
</button>
            <input type="text" class="form-control" placeholder="Wyszukaj elementów...">
          </form>
        </div>
      </div>
    </nav>





    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" id="category_menu">

          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">




          <h1 class="page-header"></h1>

          <h2 class="sub-header"><div id="powitanie"></div></h2>


          <table id="tabElements">

          </table>

          <div class="table-responsive">
            <table class="table table-hover" id="table_elements">
              <thead>
                <tr class="table_names">
                  <th>ID</th>
                  <th>Kto</th>
                  <th>Nazwa</th>
                  <th>Kategoria</th>
                  <th>Data wypozyczenia</th>
                </tr>
              </thead>
              <div id="error_div"></div>
              <tbody>

                    <!-- Area for elements from database -->

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



</body>
</html>
