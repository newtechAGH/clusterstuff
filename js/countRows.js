function countRows(tabela)
{
    var count = 0;
    $.ajax({
    type:"POST",
    async:false,
    url:"php/count_rows.php",
    data:
    {
      tabela:tabela
    },
    success:function(msg)
    {
      count = msg;
    }
   });
     return count;
}
