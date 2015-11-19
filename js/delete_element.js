function del(id)
{
  $.ajax({
    type:"POST",
    url:"/php/delete_element.php",
    data:
    {
      id:id
    }
  });
}
