function new_element()
{
  $('#add_element').click(function(){

    $('#table_elements tr[class!="table_names"]').remove();

    $.ajax({
      type:"POST",
      url:"/php/add_element.php",
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
}
function new_category()
{
  $('#add_category').click(function(){

    $.ajax({
      type:"POST",
      url:"/php/add_category.php",
      data:
      {
        kategoria:document.getElementById("new_category").elements[0].value,
        szukaj:document.getElementById("new_category").elements[1].value
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
        
      }

    });

  });
}
