function deleteFromDB(id)
{
  $.ajax({
    type:"POST",
    url:"/php/delete_waiting.php",
    data:
    {
      id:id
    },
    success:function(e)
    {
      alert(e);
    }
  });
}
