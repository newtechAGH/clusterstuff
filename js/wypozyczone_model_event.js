 function deleteFromElementsBorrowed(id)
 {
   $.ajax({
     type:"POST",
     url:"php/delete_from_borrowed.php",
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
function deleteClassBorrowed(id)
{
  $.ajax({
    type:"POST",
    url:"php/delete_class_borrowed.php",
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
