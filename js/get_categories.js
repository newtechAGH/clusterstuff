function getCategories()
{
  var kat = new Array();
  $.ajax({
    type:"POST",
    async:false,
    dataType:"json",
    url:"/php/kategorie.php",
    dataType:"xml",
    success:function(jsonData)
    {

    }
  });

}
