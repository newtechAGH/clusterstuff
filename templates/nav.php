<script>
$(document).ready(function(){
  var user = getUser($('#login').data('value'),$('#password').data('value'));
  if(user.admin == 1)
  {
     $('#add').removeClass('disapear');
    $('#oczekujace').removeClass('disapear');
    $('#nowi').removeClass('disapear');
  }
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
      <a class="navbar-brand" href="main.php">ClusterStuff</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="main.php">Home</a></li>
        <li><a href="wypozyczone.php">Wypożyczone <span class="badge">0</span></a></li>
        <li class="disapear" id="oczekujace"><a href="oczekujace.php">Oczekujace <span class="badge">0</span></a></li>
        <li class="disapear" id="nowi"><a href="nowi.php">Nowi <span class="badge">0</span></a></li>
        <li><a href="/">Wyloguj</a></li>
      </ul>
      <form class="navbar-form navbar-right">
         <!-- Button trigger modal -->
<button type="button" class="btn btn-warning disapear" data-toggle="modal" id="add">
Add
</button>
        <input type="text" class="form-control" style="width:300px;"placeholder="Wyszukaj elementów...">
      </form>
    </div>
  </div>
</nav>
