
$(document).ready(function(){


  $('#usun_element').click(function(){
    $.getScript("/js/delete_element.js", function(){
          del($('#modal_id').text());
     });
       $('#myModal2').modal('hide');

       location.reload();
  });

  $('#wypozycz_element').click(function(){

  });


function saveAjaxRequest()
{

}


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
    $('#edit_modal_opis').attr("value",$('#modal_opis').text());

    $(this).one("click",save);
  }

  function save()
  {

    saveAjaxRequest();

    $(this).html("Edytuj")
    .addClass("btn-warning")
    .removeClass("btn-success");

    $('#wypozycz_element,#usun_element').removeAttr("disabled");
    $('.edit').addClass("disapear");
    $('.subelement').removeClass("disapear");
    $('#anuluj_edytowanie').addClass("disapear");


    $(this).one("click",edit);
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


});
