<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION["login"] == null || !isset($_SESSION["password"]) || $_SESSION["password"] == null)
{
  header("Location: /");
}
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
    <script type="text/javascript" src="docs.min.js"></script>
    <script type="text/javascript" src="js/count_elements.js"></script>
    <script type="text/javascript" src="js/show_by_category.js"></script>
    <script type="text/javascript" src="js/get_user_data.js"></script>
      <script type="text/javascript" src="js/modal_event.js"></script>
      <script type="text/javascript" src="js/get_element_by_id.js"></script>
    <script type="text/javascript" src="js/add_element.js"></script>

    <!-- Custom CSS -->
    <style>

    	tr:not(.danger)
    	{
    		cursor:pointer;
    	}
    	.danger
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

  <!--Pobierz z bazy danych kategorie -->

        var kategorie_nazwa = [];
        var kategorie_search = [];

        $.ajax({
          type:"POST",
          dataType:"json",
          async:false,
          url:"php/kategorie.php",
          success:function(msg)
          {
            if(msg!="error")
            {
            for(var a=0;a<msg.length;a++)
            {
                kategorie_nazwa.push(msg[a]['nazwa']);
                kategorie_search.push(msg[a]['szukaj']);
            }
          }
        }
        });

       <!--end-->


        <!--Tworz menu -->
        color = "#2f8cff";
        var first_row = $('<li class="active" data-search="'+kategorie_search[0]+'"><a href="#">'+kategorie_nazwa[0]+'<span class="sr-only">(current)</span>   <span class="badge" style="background-color:'+color+'">'+count(kategorie_search[0])+'</span></a></li>');
        $('#category_menu').append(first_row);
        for(var a = 1;a<kategorie_nazwa.length;a++)
        {
          var counts = count(kategorie_search[a]);
          if(counts>0)
          {
            color = "#2f8cff";
          }
          else {
            color = "#b7b7b7";
          }
          var row =  $('<li  data-search="'+kategorie_search[a]+'"><a href="#">'+kategorie_nazwa[a]+'    <span class="badge" style="background-color:'+color+'">'+counts+'</span></a></li>');
          $('#category_menu').append(row);
        }


       <!--end-->


       <!-- uzytkownik posiadajacy uprawnienia admina moze otwierac elementy ktore sa wypozyczone i zepsute -->

        var user = getUser($('#login').data('value'),$('#password').data('value'));
        if(user.admin == 1)
        {
          row = 'tr:not(.warning):not(.replaced)';
        }
        else {
          row = 'tr:not(.warning):not(.danger):not(.replaced)';
        }

        <!--end-->


      <!-- przeslij dane to modelu przedstawiajacego danego na temat elementu -->
        $('tbody').on("click",row,function(){
            $('#myModal2 #modal_id').html($(this).children('td:nth-child(1)').text());
           $('#myModal2 #modal_nazwa').html($(this).children('td:nth-child(2)').text());
            $('#myModal2 #modal_kategoria').html($(this).children('td:nth-child(3)').text());
               $('#myModal2 #modal_opis').html($(this).children('td:nth-child(4)').text());

              $('#myModal2 #zepsuty').prop("checked",parseInt($(this).children('td:nth-child(5)').text()));
          $('#myModal2').modal('show');
        });

        <!--end-->

        $.getScript("js/show_by_category.js",function(){
               show_elements("all","");
        });



        var row;

        $('tbody').on({
       click: function(){
         var id = $(this).children('td:nth-child(1)').text();
         var $what = $(this);
         $.when(
        $.getScript( "/js/get_user_data.js" ),
        $.getScript( "/js/get_element_by_id.js" ),
        $.Deferred(function( deferred ){
            $( deferred.resolve );
        })
        ).done(function(){

                  var element = getBorrowedElement(id);
                  var user = getUserById(element.id_user);

                  var new_row = "<tr class='replaced'>"
                  +"<td colspan='3'><div class='panel panel-warning'>"
                  +"<div class='panel-heading'>Element wypożyczony : "+$what.children('td:nth-child(2)').text()+"</div>"
                  +"<table class='table'>"
                  +"<thead>"
                  +"<tr>"
                  +"<th>Kto</th>"
                  +"<th>Kiedy</th>"
                  +"</tr>"
                  +"</thead>"
                  +"<tbody>"
                  +"<tr>"
                  +"<td>"+user.name+" "+user.surname+"</td>"
                  +"<td>"+element.data+"</td>"
                  +"<tr>"
                  +"</tbody"
                  +"</table>"
                  +"</div>"
                  +"</td>"
                  +"</tr>";

                   row = $what.html();
                   $what.replaceWith(new_row);
                 });
          }
         },"tr.warning");

        $('tbody').on({
          mouseleave: function()
          {
            var new_row = "<tr class='warning'>"+row+"</tr>";
            $(this).replaceWith(new_row);
          }
        },"tr.replaced");




        <!-- poruszanie sie po lewym menu z kategoriami wraz ze zmiana kategoria wywolywane jest zapytanie do bazy danych i wyswietlenie nowych elementow -->
       var categ = "all";
        $("#category_menu li").click(function(){
          $("#category_menu li").removeClass("active");
          $(this).addClass("active");

            	$('#table_elements tr[class!="table_names"]').remove();
              categ = $(this).data("search");

          $.getScript("js/show_by_category.js",function(){
              show_elements(categ,$('#search').val());
          });

        });


        <!--dynamic search -->
        $('#search').keyup(function(e){
          $.getScript("js/show_by_category.js",function(){
              	$('#table_elements tr[class!="table_names"]').remove();
              show_elements(categ,$('#search').val());
          });
        });



        <!--end>

        new_element();
        new_category();


      $('#add').click(function(){
         $('#myModal').modal('show');
      });


            $('#add_new_category').click(function(){
               $('#myModal4').modal('show');
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
     include("templates/show_element.html");
     include("templates/nav.php");
     include("templates/add_category.html");
     ?>



    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" id="category_menu">

          </ul>
        <center>
          <div class="btn-group" role="group" aria-label="Kategorie">
  <button type="button" class="btn btn-primary" id="add_new_category">Dodaj</button>

  <button type="button" class="btn btn-danger" id="delete_category">Usuń</button>
</div>
        </center>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="page-header">SKN NewTech. <small>Elementy w naszej bazie danych</small></h1>

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
