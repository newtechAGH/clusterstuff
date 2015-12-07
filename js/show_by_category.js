
function show_elements(kategoria,sub)
{

  <!-- read all elements -->
  $.ajax({
    type:"POST",
    dataType:"json",
    url:"php/show_elements.php",
    data:
    {
      kategoria:kategoria,
      search:sub
    },
    success:function(msg)
    {
      if(msg!="error")
      {
      for(var a=0;a<msg.length;a++)
      {

        if(msg[a]["wyp"] == 1)
        {
          klasa = "warning";
          row = $("<tr class='"+klasa+"'>");
        }
        else if(msg[a]["uszk"] == 1)
        {
          klasa  ="danger";
          row = $("<tr class='"+klasa+"'>");
        }
        else {
          row = $("<tr>");
        }


          row.append($("<td id='"+msg[a]["id"]+"'>"+msg[a]["id"]+"</td>"))
               .append($("<td>"+msg[a]["nazwa"]+"</td>"))
               .append($("<td>"+msg[a]["kategoria"]+"</td>"))
               .append($("<td class='hide'>"+msg[a]["opis"]+"</td>"))
              .append($("<td class='hide'>"+msg[a]["uszk"]+"</td>"));

        $("#table_elements").append(row);
      }
    }
    else {
       $('#error_div').html("Brak podanych elementów");
    }
  }
  });


}
