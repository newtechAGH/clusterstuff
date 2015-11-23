function getElementBy(id)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"/php/get_element.php",
    async:false,
    data:
    {
      id:id
    },
    success:function(msg)
    {
      info = msg;
    }
  });
  return info;
}
