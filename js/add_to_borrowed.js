function addToBorrowed(user,element)
{
  $.ajax({
    type:"POST",
    url:"/php/add_to_borrow_table.php",
    data:
    {
      user:user,
      element:element
    },
    success:function(msg)
    {
      alert(msg);
    }
  });
}
