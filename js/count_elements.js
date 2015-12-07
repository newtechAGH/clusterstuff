function count(kategoria)
{
  var count = 0;
  $.ajax({
  type:"POST",
  async:false,
  url:"php/count_by_category.php",
  data:
  {
    kategoria:kategoria
  },
  success:function(msg)
  {
    count = msg;
  }
 });
   return count;
 }
