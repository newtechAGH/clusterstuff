<script>
$(document).ready(function(){

  <!-- nadanie praw w menu gornym -->

  var user = getUser($('#login').data('value'),$('#password').data('value'));
  if(user.admin == 1)
  {
     $('#add').removeClass('disapear');
    $('#oczekujace').removeClass('disapear');
    $('#nowi').removeClass('disapear');
  }

  $.getScript("/js/countRows.js",function(){
     var borrowed = countRows("ElementsBorrowed");
     var waiting = countRows("ElementsRequest");

     if(borrowed>0)
     {
       color = "#2f8cff";
     }
     else {
       color = "#b7b7b7";
     }

     $('.borrowed').html(borrowed).css("background-color",color);

     if(waiting>0)
     {
       color = "#2f8cff";
     }
     else {
       color = "#b7b7b7";
     }

     $('.waiting').html(waiting).css("background-color",color);

     $('#logout').click(function(){
       $.ajax({
         type:"POST",
         url:"/php/signout.php",
         success:function()
         {
             alert("Wylogowałeś się");
             window.location.href="/";
         }
       });

     });
  });



  <!--end-->
});
</script>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php"><img src="images/logo.png" style="width:150px; margin-top:-10px;"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="main.php">Home</a></li>
        <li><a href="wypozyczone.php">Wypożyczone <span class="badge borrowed">0</span></a></li>
        <li class="disapear" id="oczekujace"><a href="oczekujace.php">Oczekujace <span class="badge waiting">0</span></a></li>
        <li><a href="#" id="logout">Wyloguj</a></li>
      </ul>
      <form class="navbar-form navbar-right">
         <!-- Button trigger modal -->
<button type="button" class="btn btn-warning disapear" data-toggle="modal" id="add">
Add
</button>
        <input type="text" class="form-control" style="width:300px;" id="search" placeholder="Wyszukaj elementów...">
      </form>
    </div>
  </div>
</nav>
