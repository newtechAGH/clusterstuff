<script>
 $(document).ready(function(){
	 $.ajax({
		 type:"POST",
		 dataType:"json",
		 async:false,
		 url:"php/kategorie.php",
		 success:function(msg)
		 {
			 if(msg!="error")
			 {
					for(var a = 1; a<msg.length;a++)
					{
					 var query = $("<option>"+msg[a]['szukaj']+"</option>");
					 $('#edit_modal_kategoria').append(query);
				 }
			 }
		 }
	 });

 });


</script>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" onclick="location.reload();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Dodaj nową kategorie</h4>
    </div>
    <div class="modal-body">
       <div class="edit_category">
        <form method="POST" name="edit_category" id="edit_modal_category">
        <h4>Edytuj kategorie</h4>
        <select class="form-control edit disapear" id="edit_modal_kategoria">

        </select>
        <h4>Szukaj</h4>
        <input type="text" class="form-control" placeholder="Nazwa kategorii do wyszukiwania">

        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      <button type="submit" class="btn btn-primary" id="add_category">Dodaj</button>
    </div>
     </form>
  </div>
</div>
</div>
