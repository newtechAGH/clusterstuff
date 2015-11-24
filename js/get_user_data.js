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

function getUserById(id)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"/php/getUserById.php",
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
