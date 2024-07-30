$(document).ready(function(){
    
    $('.labelprof').each(function(){
        $(this).remove();
    });
    $('#idavatarprof').attr('src', 'http://192.168.88.40/GPS/bootstrap/images/profil/user.png');
    $('#idavatarprof').attr('width', '100');
    ima = $('#hideIdprof').attr('value');
    $('#hideIdprof').hide();
    $.ajax({
        url: 'http://192.168.88.40/GPS/User/getUser',
        type:'GET',
        data: "im="+ima,
        dataType:'json',
        success:function(reponse,status){
            console.log(reponse);
            if (reponse.success){
                // $('#idim').attr('value', reponse.user[0]['MATRICULE']);
                $('#hideId').attr('value', reponse.user[0]['MATRICULE']);
                $('#hideId').hide();
                $('#hideTypeprof').hide();
                if (reponse.user[0]['PHOTO']){
                    $('#idavatarprof').attr('src', 'http://192.168.88.40/GPS/bootstrap/images/profil/'+reponse.user[0]['PHOTO']);
                    $('#idavatarprof').attr('width', '150');
                }
                $('#idxnomprof').append('<label class="labelprof" >'+reponse.user[0]['NOM_AG']+'</label>');
                $('#idxprenomprof').append('<label class="labelprof" >'+reponse.user[0]['PRENOM_AG']+'</label>');
                $('#idxdivprof').append('<label class="labelprof">'+reponse.user[0]['LABEL_DIVISION']+'</label>');
                $('#idxfonprof').after('<label class="labelprof" id="labfonprof">'+reponse.user[0]["FONCTION_AG"]+'</label>');
                if(reponse.user[0]['TYPE_AG'] != 'USER'){
                    if(reponse.user[0]['TYPE_AG'] == 'Admin'){
                        $('#labfonprof').after(' <span class="badge badge-pill badge-danger labelprof">Admin</span>');
                    }
                    else{
                        $('#labfonprof').after(' <span class="badge badge-pill badge-danger labelprof"><i class="ti-star">Admin</i></span>');
                    }
                }
                $('#editNomprof').attr('value', reponse.user[0]['NOM_AG']);
                $('#editPrenomprof').attr('value', reponse.user[0]['PRENOM_AG']);
                $('#editNomUtilprof').attr('value', reponse.user[0]['NOM_UTIL_AG']);
                $('#editMailprof').attr('value', reponse.user[0]['MAIL_AG']);
                $('#editContactprof').attr('value', reponse.user[0]['TEL_AG']);
                $('#editAdressprof').attr('value', reponse.user[0]['ADRESSE_AG']);
            }else{
                swal("Echéc", reponse.error, {
                    icon : "error",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
            }
        }
    })

    $('body').on('change', '#backPhoto', function(e){
        var file =  e.target.files[0]
        var imgURL = window.URL.createObjectURL(file)
            
        $('#idavatarprof').attr('src', imgURL)
        $('.profilPhoto').attr('src', imgURL)
    })

    $('#confpass').on('keyup', function(){
        // alert($(this).val());
        newpass = $('#newpass').val();
        if ($('#newpass').val() === $(this).val()){
            swal({
                title: 'Êtes vous sûre?',
                icon: 'warning',
                text: 'Votre mot de passe va être modifié.',
                type: 'warning',
                buttons:{
                    confirm: {
                        text : 'Oui',
                        className : 'btn btn-warning'
                    },
                    cancel: {
                        visible: true,
                        text: 'Annuler',
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: 'http://192.168.88.40/GPS/User/changePass',
                        type:'GET',
                        data: 'newpass='+newpass+'&&ima='+ima,
                        dataType:'json',
                        success:function(reponse,status){
                            if(reponse.success){
                                swal("Succès!", "Votre mot de passe a été changé avec succès!", {
                                    buttons: false,
                                    timer: 3000,
                                });
                                window.location.href = 'http://192.168.88.40/GPS/HomeController/disconnect';
                                    
                            }else{
                                swal("Erreur", "Une erreur, lors du transfert de donnés", {
                                    icon : "error",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success'
                                        }
                                    },
                                });
                            }
                        }
                    })
                } else {
                    swal.close();
                }
            });
        }
    })
    $('#idavatarprof').on('click', function(dede){
        
    })
    $('#passform').on('submit',function(def){
        def.preventDefault();
        if ($('#newpass').val() !== $('#confpass').val()){
            swal("Echèc", "Veuillez confirmer votre mot de passe!", {
                icon : "error",
                buttons: {        			
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            });
        }else{
            swal({
                title: 'Êtes vous sûre?',
                icon: 'warning',
                text: 'Votre mot de passe va être modifié.',
                type: 'warning',
                buttons:{
                    confirm: {
                        text : 'Oui',
                        className : 'btn btn-warning'
                    },
                    cancel: {
                        visible: true,
                        text: 'Annuler',
                        className: 'btn'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: 'http://192.168.88.40/GPS/User/changePass',
                        type:'GET',
                        data: 'newpass='+newpass+'&&ima='+ima,
                        dataType:'json',
                        success:function(reponse,status){
                            if(reponse.success){
                                swal("Succès!", "Votre mot de passe a été changé avec succès!", {
                                    buttons: false,
                                    timer: 3000,
                                });
                                window.location.href = 'http://192.168.88.40/GPS/HomeController/disconnect';
                                    
                            }else{
                                swal("Erreur", "Une erreur, lors du transfert de donnés", {
                                    icon : "error",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success'
                                        }
                                    },
                                });
                            }
                        }
                    })
                } else {
                    swal.close();
                }
            });
        }
        
    })

    $('#editPassprof').on('focus',function(){
        swal({
            // id:"oldpassField",
            title: 'Mot de Passe',
            content: {
                element: "input",
                attributes: {
                    placeholder: "********",
                    type: "password",
                    id: "oldpass",
                    // style:"border: solid 2px red;",
                    className: "form-control"
                },
            },
            buttons: {
                confirm: {
                    text:'Continuer',
                    className : 'btn btn-warning'
                },
                cancel: {
                    visible: true,
                    text:'Annuler',
                    className: 'btn'
                }
            },
        }).then((Delete) => {
            if(Delete){
                ima = $('#hideIdprof').attr('value');
                oldpass = $('#oldpass').val();
                $.ajax({
                    url: 'http://192.168.88.40/GPS/User/passControl',
                    type:'GET',
                    data: 'oldpass='+oldpass+'&&ima='+ima,
                    dataType:'json',
                    success:function(reponse,status){
                        if(reponse.success){
                            $('#passModal').modal('show');
                        }else{
                            swal("Echèc!", "Mot de passe incorrect!", {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                        }
                    }
                })
            }else{
                swal.close();
            }
        });
    });

    $('#formEditUserprof').on('submit', function(prv){
        prv.preventDefault();
        swal({
            title: "Attention",
            text: 'Voullez-vous vraiment valider le(s) modification(s)?',
            icon: 'warning',
            buttons:{
                confirm: {
                    text : 'Oui',
                    className : 'btn btn-warning'
                },
                cancel: {
                    visible: true,
                    text:'Annuler',
                    className: 'btn'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                var modificationData = new FormData($(this)[0]);
                url = $('#formEditUserprof').attr('action');
                key = $('#hideIdprof').val();
                // alert(key);
                // console.log(data);
                $.ajax({
                    url: url,
                    type:'POST',
                    data: modificationData,
                    dataType:'json',
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(reponse,status){
                        console.log(reponse);
                        if(reponse.error){
                            swal("Echéc", reponse.error, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                            console.log(reponse.error);
                        }else{
                            if(reponse.success){
                                swal("Succés", reponse.success, {
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
            }else {
                swal.close();
            }
        });
    });



    let agentLogged = ''
    $.ajax({
        url: 'http://192.168.88.40/GPS/HomeController/salutation',
        dataType:'json',
        success: function(reponse, status){
            if (reponse.success){
                agentLogged = reponse.success
            }
            console.log(agentLogged)
            
            if ((agentLogged['PASSWORD'] === "0000") || (agentLogged['PASSWORD'] === 'default')){
                
                swal({
                    // id:"oldpassField",
                    title: 'Changez votre mot de passe',
                    text:"Saisissez le mot de passe par défaut",
                    content: {
                        element: "input",
                        attributes: {
                            placeholder: "********",
                            type: "password",
                            id: "oldpass",
                            // style:"border: solid 2px red;",
                            className: "form-control"
                        },
                    },
                    buttons: {
                        confirm: {
                            text:'Continuer',
                            className : 'btn btn-warning'
                        },
                        cancel: {
                            visible: true,
                            text:'Annuler',
                            className: 'btn'
                        }
                    },
                }).then((Delete) => {
                    if(Delete){
                        ima = $('#hideIdprof').attr('value');
                        oldpass = $('#oldpass').val();
                        $.ajax({
                            url: 'http://192.168.88.40/GPS/User/passControl',
                            type:'GET',
                            data: 'oldpass='+oldpass+'&&ima='+ima,
                            dataType:'json',
                            success:function(reponse,status){
                                if(reponse.success){
                                    $('#passModal').modal('show');
                                }else{
                                    swal("Echèc!", "Mot de passe incorrect!", {
                                        icon : "error",
                                        buttons: {        			
                                            confirm: {
                                                className : 'btn btn-danger'
                                            }
                                        },
                                    });
                                }
                            }
                        })
                    }else{
                        swal.close();
                    }
                });

            }
        
            
        }
    });
});