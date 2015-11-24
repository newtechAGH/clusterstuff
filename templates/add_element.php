 <script>
  $(document).ready(function(){
		$.ajax({
			type:"POST",
			dataType:"json",
			async:false,
			url:"/php/kategorie.php",
			success:function(msg)
			{
				if(msg!="error")
				{
					 for(var a = 1; a<msg.length;a++)
					 {
						var query = $("<option>"+msg[a]['szukaj']+"</option>");
						$('#add_element_search').append(query);
					}
				}
			}
		});
	});


 </script>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adding new element</h4>
      </div>
      <div class="modal-body">
         <div class="new_element">
          <form method="POST" name="add_element" id="new_element">
          <h4>Nazwa</h4>
          <input type="text" class="form-control" placeholder="Nazwa elementu" autofocus>
          <h4>Opis</h4>
          <textarea class="form-control" rows="3" placeholder="Krótki opis"></textarea>
          <h4>Kategoria</h4>
          <select class="form-control" id="add_element_search">

          </select>


          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="add_element">Add</button>
      </div>
       </form>
    </div>
  </div>
</div>
