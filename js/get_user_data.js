function getUser(login,password)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"/php/getUser.php",
    async:false,
    data:
    {
      login:login,
      password:password
    },
    success:function(msg)
    {
      info = msg;
    }
  });
  return info;
}
