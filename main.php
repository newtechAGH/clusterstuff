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
    <script type="text/javascript" src="docs.min.js"></script>

    <script type="text/javascript" src="js/show_by_category.js"></script>

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
    </style>

    <!-- Custom JS-->
    <script type="text/javascript">



    	$(document).ready(function(){


        $('tbody').on("click","tr:not(.warning,.danger)",function(){

           $('#myModal2 #modal_nazwa').html($(this).children('td:nth-child(2)').text());
            $('#myModal2 #modal_kategoria').html($(this).children('td:nth-child(3)').text());
               $('#myModal2 #modal_opis').html($(this).children('td:nth-child(4)').text());
          $('#myModal2').modal('show');

        });



        <!-- read all elements -->
        $.ajax({
          type:"POST",
          dataType:"json",
          url:"php/show_all.php",
          success:function(msg)
          {
            for(var a=0;a<msg.length;a++)
            {
              var klasa = "";
              if(msg[a]["wyp"] == 1)
              {
                klasa = "warning";
              }
              if(msg[a]["uszk"] == 1)
              {
                klasa  ="danger";
              }
              var row = $("<tr class='"+klasa+"'>");

         				row.append($("<td id='"+msg[a]["id"]+"'>"+msg[a]["id"]+"</td>"))
            			   .append($("<td>"+msg[a]["nazwa"]+"</td>"))
            			   .append($("<td>"+msg[a]["kategoria"]+"</td>"))
                     .append($("<td class='hide'>"+msg[a]["opis"]+"</td>"));

         			$("#table_elements").append(row);
            }
          }
        });


    		$('#add_element').click(function(){

    			$('#table_elements tr[class!="table_names"]').remove();

    			$.ajax({
    				type:"POST",
    				url:"php/add_element.php",
    				data:
    				{
    					nazwa:document.getElementById("new_element").elements[0].value,
    					opis:document.getElementById("new_element").elements[1].value,
    					kategoria:document.getElementById("new_element").elements[2].value
    				},
    				success:function(msg)
    				{
    					alert(msg);
    				},
    				complete:function(msg)
    				{

    				},
    				error:function(msg)
    				{
    					$('#demo').val("error");
    				}

    			});
    		});




        $("#category_menu li").click(function(){
          $("#category_menu li").removeClass("active");
          $(this).addClass("active");
          test();
        });
    	});



    </script>
</head>



<body>

	<!--Include templates-->
     <?
     include("templates/add_element.html");
     include("templates/show_element.html");
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
            <li><a href="#">Wypożyczone <span class="badge">0</span></a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Wyloguj</a></li>
          </ul>
          <form class="navbar-form navbar-right">
          	 <!-- Button trigger modal -->
 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
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
            <li class="active"><a href="#">Wszystko <span class="sr-only">(current)</span><span class="badge">0</span></a></li>
            <li><a href="#">Druk 3D <span class="badge">0</span></a></li>
            <li><a href="#">Elektronika <span class="badge">0</span></a></li>
            <li><a href="#">Mechanika <span class="badge">0</span></a></li>
            <li><a href="#">Narzędzia <span class="badge">0</span></a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">




          <h1 class="page-header"></h1>
          <div id="demo"></div>
          <h2 class="sub-header">Elementy</h2>
          <table id="tabElements">

          </table>

          <div class="table-responsive">
            <table class="table table-hover" id="table_elements">
              <thead>
                <tr class="table_names">
                  <th>ID</th>
                  <th>Nazwa</th>
                  <th>Kategoria</th>

                </tr>
              </thead>
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
