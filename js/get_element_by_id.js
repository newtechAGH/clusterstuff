function getElementBy(id)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"php/get_element.php",
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
function getBorrowedElement(id)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"php/borrowed_elements_by_id.php",
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

function getElementByUser(id,user)
{
  var info = null;
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"php/get_element_user.php",
    async:false,
    data:
    {
      id:id,
      user:user
    },
    success:function(msg)
    {
      info = msg;
    }
  });
  return info;
}
