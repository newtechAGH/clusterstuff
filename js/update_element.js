function update()
{
  $.ajax({
    type:"POST",
    url:"/php/update_element.php",
    data:
    {
      id:$('#modal_id').text(),
      nazwa:document.getElementById("edit_element").elements[0].value,
      opis:document.getElementById("edit_element").elements[2].value,
      kategoria:document.getElementById("edit_element").elements[1].value
    },
    success:function(msg)
    {

    }
  });
}
