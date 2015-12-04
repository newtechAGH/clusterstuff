
$(document).ready(function(){


  $('#usun_element').click(function(){
    $.getScript("/js/delete_element.js", function(){
          del($('#modal_id').text());
     });
       $('#myModal2').modal('hide');

       location.reload();
  });


  function wypozycz()
  {
       $(this).html("Wyslij zapytanie");
       $(this).on("click",zapytanie);

       $('#zapytanie').removeClass("disapear");
       $('#zapytanie_opis').focus();
  }

  function zapytanie()
  {
    $(this).html("Wypozycz");
     $(this).on("click",wypozycz);

     $('#zapytanie').addClass("disapear");


     $.when(
    $.getScript( "/js/get_user_data.js" ),
    $.getScript( "/js/send_req.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
    ).done(function(){
        user_id = getUser($('#login').data('value'),$('#password').data('value')).id;
        sendAsk(user_id,$('#modal_id').text(),document.getElementById("zapytanie_opis").value);


    });


     $('#myModal2').modal('hide');

     location.reload();


  }

  $('#wypozycz_element').on("click",wypozycz);



  function edit()
  {
    $(this).html("Zapisz")
    .removeClass("btn-warning")
    .addClass("btn-success");

    $('#wypozycz_element,#usun_element').prop("disabled", true);

    $('.edit').removeClass("disapear");
    $('.subelement').addClass("disapear");
    $('#anuluj_edytowanie').removeClass("disapear");


    $('#edit_modal_nazwa').attr("value",$('#modal_nazwa').text());

    document.getElementById("edit_modal_opis").value = $('#modal_opis').text();


    $(this).one("click",save);
  }

  function save()
  {


    $.getScript("/js/update_element.js", function(){
         update();
     });


    $(this).html("Edytuj")
    .addClass("btn-warning")
    .removeClass("btn-success");

    $('#wypozycz_element,#usun_element').removeAttr("disabled");
    $('.edit').addClass("disapear");
    $('.subelement').removeClass("disapear");
    $('#anuluj_edytowanie').addClass("disapear");



    $(this).one("click",edit);

    $('#myModal2').modal("hide");
    location.reload();
    }

  $('#edytuj_element').one("click",edit);

  $('#anuluj_edytowanie').click(function(){

    $('#edytuj_element').one("click",edit);

    $('#edytuj_element').html("Edytuj")
    .addClass("btn-warning")
    .removeClass("btn-success");

    $('#wypozycz_element,#usun_element').removeAttr("disabled");
    $('.edit').addClass("disapear");
    $('.subelement').removeClass("disapear");

    $(this).addClass("disapear");
  });




  $('#wypozycz').on("click",function(){

    $.when(
   $.getScript( "/js/add_to_borrowed.js" ),
   $.getScript( "/js/delete_from_db.js" ),
   $.Deferred(function( deferred ){
       $( deferred.resolve );
   })
   ).done(function(){
            var user = $("#modal_kto_id").text();
            var element = $('#modal_element_id').text();
            var id =  $('#modal_id').text();
            addToBorrowed(user,element);
            deleteFromDB(id);
   });
       $('#myModal3').modal('hide');
       location.reload();
  });

  $('#odrzuc').click(function(){
    $.getScript("/js/delete_from_db.js",function(){
      var id =  $('#modal_id').text();
       deleteFromDB(id);
    });
    $('#myModal3').modal('hide');
    location.reload();
  });


   function checkIfreload()
   {
     location.reload();
   }

});
