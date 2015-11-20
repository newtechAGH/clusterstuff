
function show_elements(kategoria)
{

  <!-- read all elements -->
  $.ajax({
    type:"GET",
    dataType:"json",
    url:"/php/show_elements.php",
    data:
    {
      kategoria:kategoria
    },
    success:function(msg)
    {
      if(msg!="error")
      {
      for(var a=0;a<msg.length;a++)
      {
        var klasa = "";
        if(msg[a]["wyp"] == 1)
        {
          klasa = "warning";
        }
        if(msg[a]["uszk"] == 1)
        {
          klasa  ="danger";
        }
        var row = $("<tr class='"+klasa+"'>");

          row.append($("<td id='"+msg[a]["id"]+"'>"+msg[a]["id"]+"</td>"))
               .append($("<td>"+msg[a]["nazwa"]+"</td>"))
               .append($("<td>"+msg[a]["kategoria"]+"</td>"))
               .append($("<td class='hide'>"+msg[a]["opis"]+"</td>"));

        $("#table_elements").append(row);
      }
    }
    else {
       $('#error_div').html("Brak podanych elementów");
    }
  }
  });


}