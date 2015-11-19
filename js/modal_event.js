
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

  $('#edytuj_element').click(function(){

  });

});
