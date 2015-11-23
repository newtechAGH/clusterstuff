function sendAsk(id_user,id_element,info)
{
    $.ajax({
      type:"POST",
      url:"/php/sendAsk.php",
      data:
      {
        user:id_user,
        element:id_element,
        info:info
      },
      success:function(e)
      {
        alert(e);
      }
    })
}
