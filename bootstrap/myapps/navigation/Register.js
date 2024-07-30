
$(document).ready(function(){
    $('.s2').each(function(){
        $(this).hide().animate({
            'marginLeft':'100%'
        });
    });
    $('.s3').each(function(){
        $(this).hide().animate({
            'marginLeft':'100%'
        });
    });

    $('#listDiv').each(function(){
        $(this).remove()
    });
    $('#im').on('blur',function(){
        im = $(this).val();
        // alert(im);
        $.ajax({
            url:'http://192.168.88.40/GPS/UserController/im_control',
            type:'GET',
            data:'im='+im,
            dataType:'json',
            success:function(result,status){
                // alert("fotsiny");
                if (result.error){
                    swal("Echéc", result.error, {
                        icon : "error",
                        buttons: {        			
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    });
                    console.log(result.error);
                }
            }
        })
    });
    $('#uemail').on('blur',function(){
        mail = $(this).val();
        // alert(im);
        $.ajax({
            url:'http://192.168.88.40/GPS/UserController/mail_control',
            type:'GET',
            data:'mail='+mail,
            dataType:'json',
            success:function(result,status){
                // alert("fotsiny");
                if (result.error){
                    swal("Echéc", result.error, {
                        icon : "error",
                        buttons: {        			
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    });
                    console.log(result.error);
                }
            }
        })
    });
    // $('#cpassId').on('blur', function(){
    //     passy = $('#idpass').val();
    //     cpassy = $(this).val();
    //     if (!(passy == cpassy)){
    //         swal("Echéc", "Une erreur lors de la confirmation de mot de passe", {
    //             icon : "error",
    //             buttons: {        			
    //                 confirm: {
    //                     className : 'btn btn-danger'
    //                 }
    //             },
    //         });
    //     }
    // });

    $('body').on('click','.next', function(evm){
        
        
        evm.preventDefault();
        id = $(this).attr('id');
        if (id === 'next1' ){
            nom = $('#uname').val();
            adresse = $('#uadress').val();
            if ((!(nom)) ||  (!(adresse))){
                if(!(nom)){
                    messageAl = "Le champs nom est obligatoire!"; 
                }else{
                    if(!(adresse)){
                        messageAl = "Veuillez saisir l'adresse!"; 
                    }
                }
                swal("Echéc", messageAl, {
                    icon : "error",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
                // console.log(messageAl);
            }else{

                $('.s1').each(function(){
                    $(this).hide().animate({
                        'marginLeft':'-100%'
                    });
                });
                $('.s2').each(function(){
                    $(this).show().animate({
                        'marginLeft':'0%'
                    },400);
                });
                $('.numerotation1').removeClass('active');
                $('.numerotation2').addClass('active');

                $('.numerotation1').addClass('previous');
                $('.numerotation3').addClass('next');

                $('.numerotation1').attr('id','previous1');
                $('.numerotation3').attr('id','next2');
                var service_selected = $("#id_service option:selected").val();
                // alert(service_selected);
                $.ajax({
                    url:'http://192.168.88.40/GPS/UserController/getDivision',
                    type:'GET',
                    data:'service='+service_selected,
                    dataType:'json',
                    success:function(result,status){
                        $('#listDiv').each(function(){
                            $(this).remove()
                        });
                        var res = result.division;
                        $.each(res, function(i,v){
                            // console.log(v["DESIGNATION_CMPT"]);
                            $('#id_division').append('<option id="listDiv" value="'+v["CODE_DIVISION"]+'">'+v["LABEL_DIVISION"]+'</option>');
                            // $('#unityid').attr('value', v["UNITE_ART"]);
                        });
                    }
                })
                $('#id_service').on('blur',function(){
                    $('#listDiv').each(function(){
                        $(this).remove()
                    });
                    var service_selected = $("#id_service option:selected").val();
                    // alert(service_selected);
                    $.ajax({
                        url:'http://192.168.88.40/GPS/UserController/getDivision',
                        type:'GET',
                        data:'service='+service_selected,
                        dataType:'json',
                        success:function(result,status){
                            $('#listDiv').each(function(){
                                $(this).remove()
                            });
                            var res = result.division;
                            $.each(res, function(i,v){
                                // console.log(v["DESIGNATION_CMPT"]);
                                $('#id_division').append('<option id="listDiv" value="'+v["CODE_DIVISION"]+'">'+v["LABEL_DIVISION"]+'</option>');
                                // $('#unityid').attr('value', v["UNITE_ART"]);
                            });
                        }
                    })
                });
                $('#id_service').on('change',function(){
                    $('#listDiv').each(function(){
                        $(this).remove()
                    });
                    var service_selected = $("#id_service option:selected").val();
                    // alert(service_selected);
                    $.ajax({
                        url:'http://192.168.88.40/GPS/UserController/getDivision',
                        type:'GET',
                        data:'service='+service_selected,
                        dataType:'json',
                        success:function(result,status){
                            $('#listDiv').each(function(){
                                $(this).remove()
                            });
                            var res = result.division;
                            $.each(res, function(i,v){
                                // console.log(v["DESIGNATION_CMPT"]);
                                $('#id_division').append('<option id="listDiv" value="'+v["CODE_DIVISION"]+'">'+v["LABEL_DIVISION"]+'</option>');
                                // $('#unityid').attr('value', v["UNITE_ART"]);
                            });
                        }
                    })
                });
            }
        }else{
            im = $('#im').val();
            fonction = $('#ufunction').val();
            porte = $('#porte').val();
            // alert(porte)
            if ((!(im)) || (!(fonction)) || !(porte)){
                if(!(im)){
                    var messageAl = "Le numéro matricule est requis!"; 
                }else{
                    if (!(porte)){
                        var messageAl = "Veuillez indiquer le numéro de porte de l'Agent";
                    }
                    else{
                        if(!(fonction)){
                            var messageAl = "Veuillez indiquer le fonction de l'agent!"; 
                        }
                    }
                }
                swal("Echéc", messageAl, {
                    icon : "error",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
                // console.log(messageAl);
            }else{
                $('.s2').each(function(){
                    $(this).hide().animate({
                        'marginLeft':'-100%'
                    });
                });
                $('.s3').each(function(){
                    $(this).show().animate({
                        'marginLeft':'0%'
                    },400);
                });
                
                $('.numerotation2').removeClass('active');
                $('.numerotation3').addClass('active');

                $('.numerotation1').removeClass('previous');
                $('.numerotation3').removeClass('next');
                $('.numerotation2').addClass('previous');

                $('.numerotation1').attr('id','');
                $('.numerotation2').attr('id','previous2');
                $('.numerotation3').attr('id','');
            }
            
        }
    });
    $('body').on('click','.previous', function(){
        
        id = $(this).attr('id');
        if (id === 'previous1' ){
            $('.s1').each(function(){
                $(this).show().animate({
                    'marginLeft':'0%'
                },400); 
            });
            $('.s2').each(function(){
                $(this).hide().animate({
                    'marginLeft':'100%'
                });
            });
            
            $('.numerotation2').removeClass('active');
            $('.numerotation1').addClass('active');

            $('.numerotation1').removeClass('previous');
            $('.numerotation3').removeClass('next');
            $('.numerotation2').addClass('next');

            $('.numerotation1').attr('id','');
            $('.numerotation2').attr('id','next1');
            $('.numerotation3').attr('id','');
        }else{
            $('.s2').each(function(){
                $(this).show().animate({
                    'marginLeft':'0%'
                },400); 
            });
            $('.s3').each(function(){
                $(this).hide().animate({
                    'marginLeft':'100%'
                });
            });
            
            $('.numerotation3').removeClass('active');
            $('.numerotation2').addClass('active');

            $('.numerotation1').addClass('previous');
            $('.numerotation2').removeClass('previous');
            $('.numerotation3').addClass('next');

            $('.numerotation1').attr('id','previous1');
            $('.numerotation2').attr('id','');
            $('.numerotation').attr('id','next2');
        }
    });

    // SUBMIT

    $('#addUserfrom').on('submit', function (evm){
        evm.preventDefault();
        mail = $('#uemail').val();
        nomutil = $('#username').val();
        phone = $('#uphone').val();
        // pass = $('#idpass').val();
        // cfpass = $('#cpassId').val();
        if ((!(mail)) || (!(nomutil)) || (!(phone))){
            if(!(mail)){
                var messageAl = "L'adresse email est obligatoire"; 
            }else{
                if(!(nomutil)){
                    var messageAl = "Le nom en tant qu'utilisateur est obligatoire"; 
                }else{
                    var messageAl = "L'addresse téléphonique est obligatoire"; 
                }
            }
            swal("Echéc", messageAl, {
                icon : "error",
                buttons: {        			
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            });
            // console.log(messageAl);
        }else{
            var userdata = new FormData($(this)[0]);
            url = $(this).attr('action');
            // alert(url);
            $.ajax({
                    url: url,
                    type:'POST',
                    data: userdata,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(answer,status){
                        
                        if(answer.error){
                            swal("Echéc", answer.error, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            // console.log(answer.error);
                        }else{
                            if(answer.success){
                                // console.log(answer.success);
                                swal("Succés", answer.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success',
                                            
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    }
            })
        }
    });


    // $('.cancel').each(function(){
    //     $(this).on('click', function(){
    //         id = $(this).attr('id');
    //         if (id === 'cancel1' ){
    //             $('.s1').each(function(){
    //                 $(this).hide();
    //             });
    //             $('.s2').each(function(){
    //                 $(this).show();
    //             });
    //             $('.s3').each(function(){
    //                 $(this).hide();
    //             });
    //         }else{
    //             $('.s1').each(function(){
    //                 $(this).hide();
    //             });
    //             $('.s3').each(function(){
    //                 $(this).show();
    //             });
    //             $('.s2').each(function(){
    //                 $(this).hide();
    //             });
    //         }
    //     });
    // });
    // $('#next').on('click', function(){
    //     var nom = $('#inom').val();
    //     var prenom = $('#iprenom').val();
    //     var adresse = $('#iadresse').val();
    //     if (nom ===""){
    //         $('#inom').css('border', 'solid 2px red');
    //         $('#iprenom').css('border', '');
    //         console.log($('#inom'));
    //         $('#iadresse').css('border', '');
    //     }else{
    //         if (prenom ==="") {
    //             $('#iprenom').css('border', 'solid 2px red');
    //             $('#inom').css('border', '');
    //             $('#iadresse').css('border', '');
    //         } else {
    //             if (adresse ==="") {
    //                 $('#iadresse').css('border', 'solid 2px red');
    //                 $('#inom').css('border', '');
    //                 $('#iprenom').css('border', '');
    //             } else {
    //                 swal("Préparation...", {
    //                     buttons:false,
    //                     timer: 1100
    //                 });
    //                 $('#inom').css('border', '');
    //                 $('#iprenom').css('border', '');
    //                 $('#iadresse').css('border', '');
    //                 $('.s1').each(function(){
    //                     $(this).hide();
    //                 });
    //                 $('#prev').fadeIn(5);
    //                 $('#sub').fadeIn(5);
    //                 $('.s2').each(function(){
    //                     $(this).fadeIn(5);
    //                 });
                    
    //             }
    //         }
    //     }
    // });
    // $('#prev').on('click', function(){
    //     $('.s2').each(function(){
    //         $(this).hide();
    //     });
    //     $(this).hide();
    //     $('#sub').hide();
    //     $('.s1').each(function(){
    //         $(this).fadeIn(0);
    //     });
    // });
    // $('#sub').on('click', function(al){
    //     al.preventDefault();
    //     //===========================================CONTROL CHAMPS=======================================
    //     $('#ipseudo').css('border','');
    //     $('#imail').css('border','');
    //     $('#itel').css('border','');
    //     $('#ipassword').css('border','');
    //     $('#iconfpassword').css('border','');
    //     var control ="";
    //     if($('#ipseudo').val() ===""){
    //         $('#ipseudo').css('border','solid 2px red');
            
    //     }else{
    //         if ($('#imail').val() ==="") {
    //             $('#imail').css('border','solid 2px red');
                
    //         } else {
    //             if ($('#itel').val() ==="") {
    //                 $('#itel').css('border','solid 2px red');
                    
                    
    //             } else {
    //                 if ($('#ipassword').val() ==="") {
    //                     $('#ipassword').css('border','solid 2px red');
                        
                        
    //                 } else {
    //                     if ($('#iconfpassword').val() === $('#ipassword').val()) {
    //                         control='safety';
    //                     } else {
    //                         $('#iconfpassword').css('border','solid 2px red');
                            
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     //===========================================CONTROL CHAMPS=======================================
    //     if (control ==="safety"){
    //         url = $('#registerForm').attr('action');
    //         var garbage = $('#registerForm').serialize();
    //         console.log(garbage);
    //         $.ajax({
    //             url: url,
    //             type:'POST',
    //             data: garbage,
    //             dataType:'json',
    //             success:function(reponse,status){
    //                 console.log(reponse);
    //                 if (reponse.success){
    //                     swal("Succés", reponse.success, {
    //                         icon : "success",
    //                         buttons: {        			
    //                             confirm: {
    //                                 className : 'btn btn-success',
                                    
    //                             }
    //                         },
    //                     }).then((Delete) => {
    //                         if (Delete) {     
    //                             window.location.href = "/Immobilier/LoginServlet";
    //                         }

    //                     });
    //                 }
    //                 if (reponse.error){
    //                     console.log(reponse.error);
    //                     swal("Echèc", reponse.error, {
    //                         icon : "error",
    //                         buttons: {        			
    //                             confirm: {
    //                                 className : 'btn btn-secondary',
                                    
    //                             }
    //                         },
    //                     });
    //                 }
    //             }
    //         })
    //     }
    // });

});