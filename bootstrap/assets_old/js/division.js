$(document).ready(function () {
    var service = $('.service'), codediv = $('.codedivision'), labeldiv = $('.labeldivision'), supprimer = $('.supprimer'), formdiv = $('#formdiv');
    
    $(form).on('submit', function (e) {
     e.preventDefault();
     var data = $(this).serialize();
     url = $(this).attr('action');

     alert(data);
     $.ajax({
         type: 'POST',
         url: url,
         data: data,
         dataType: 'json',
         success:function(resultat){
             console.log(resultat);
             if (resultat.success) {
                 console.log(resultat);
                 $('tbody').prepend('<tr id="'+resultat.codediv+'"><td class ="service">'+resultat.codeser+'</td><td class="codedivision">'+resultat.codediv+'</td><td class="labeldivision">'+resultat.labeldiv+'</td><td class="supprimer"><button id="'+resultat.codediv+'" class="btn btn-outline-danger"><i class="ti-trash"></i></button></td></tr>');
                 $('#codediv').val('');
                 $('#labeldiv').val('');
             }
         }
     });
    });
    $(service).each(function () {
     $(this).on('click', function () {
        $(this).attr('contenteditable', true); 
     });
     $(this).blur(function () {
        $(this).removeAttr('contenteditable');
        var divisionlab = $(this).text(); 
     });
    });
 });