$(document).ready(function(){
    let information= ''
    let complet= ''
    $('.tovalide').each(function(){
        $(this).on('click',function(kalma){
            let artcile = ''
            $tr = $(this).closest('tr')
            $num= $(this).closest('tr').attr('id')
            var laligne =  $tr.children("td").map(function(){
                return $(this).text();
            }).get()
            kalma.preventDefault();
            
            $.ajax({
                url:'demande/info',
                method:'GET',
                data: 'im='+laligne[0]+'&&num='+$num,
                dataType:'json',
                success:function(resu){
                    if (resu.success) {
                        information = resu.user[0]
                        complet = resu.array
                        artcile = resu.array['ART'][0]
                        $('#validationModal').modal('show')
                        $('.Agent').each(function(){
                            $(this).attr('id', laligne[0])
                            $(this).html(information["MATRICULE"]+' - '+information["NOM_AG"]+' '+information["PRENOM_AG"])
                        })
                        $('.structure').each(function(){
                            $(this).attr('id', laligne[2])
                            $(this).html(information["CODE_SER"]+' - '+information["CODE_DIVISION"])
                        })
                        $('.article').each(function(){
                            $(this).html(laligne[3]+'. (Quantité du stock: '+artcile['EFFECTIF_ART']+')')
                        })
                        $('#requestQ').val(laligne[4])
                    }else{
                        swal("Echéc", "Erreur du chargement de données", {
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
        })
    })

    $('.toreceive').each(function(){
        $(this).on('click',function(){
            swal("Attentoin", "Avez-vous vraiment réçu l'objet de la demande?", {
                icon : "warning",
                buttons: {        			
                    confirm: {
                        text: "Oui",
                        className : 'btn btn-warning'
                    },
                    cancel: {
                        visible:true,
                        text: "Annuler",
                        className : 'btn'
                    }
                },
            }).then((Delete) => {
                if (Delete) {     
                    $tr = $(this).closest('tr')
                    num= $(this).closest('tr').attr('id')
                    
                    $.ajax({
                        url: 'http://192.168.88.40/GPS/DemandeController/Recevoir',
                        type:'GET',
                        data: 'num='+num,
                        dataType:'json',
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
                            }
                            if(reponse.success){
                                swal("Succés", reponse.success, {
                                    icon : "success",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-success'
                                        }
                                    },
                                }).then((Delete) => {
                                    if (Delete) {     
                                        window.location.reload();
                                    }

                                });
                            }
                        }
                    })
                } else {
                    swal.close();
                }

            });
            
        })
    })

    $('#accDemForm').on('submit',function(vona){
        vona.preventDefault()
        // console.log(complet['DEM'][0])
        let num = complet['DEM'][0]['NUMEROTATION']
        // console.log(num)
        let qte = $('#acceptQ').val();
        if ((!qte) || (qte == "")){
            swal("Echéc", "Veuillez indiquer la quantité à accorder", {
                icon : "error",
                buttons: {        			
                    confirm: {
                        className : 'btn btn-danger'
                    }
                },
            });
        }else{
            swal({
                title: "Voulez vous accorder "+qte+"?",
                text: 'Veuillez bien vérifier les informations pour la demande '+num+'',
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
                    $.ajax({
                        url: 'http://192.168.88.40/GPS/DemandeController/validation',
                        type:'GET',
                        data: 'num='+num+'&&qte='+qte,
                        dataType:'json',
                        success:function(reponse,status){
                            console.log(reponse);
                            if(reponse.error){
                                swal("Echèc", reponse.error, {
                                    icon : "error",
                                    buttons: {        			
                                        confirm: {
                                            className : 'btn btn-danger'
                                        }
                                    },
                                });
                                console.log(reponse.error);
                            }
                            else{
                                if(reponse.warning){
                                    swal("Attention", reponse.warning, {
                                        icon : "warning",
                                        buttons: {        			
                                            confirm: {
                                                text : 'Accorder',
                                                className : 'btn btn-warning'
                                            },
                                            cancel: {
                                                visible: true,
                                                text:'Annuler',
                                                className: 'btn btn-success'
                                            }
                                        },
                                    }).then((Delete) => {
                                        if (Delete) {
                                            // alert("ato");
                                            $.ajax({
                                                url: 'http://192.168.88.40/GPS/DemandeController/acceptWarning',
                                                type:'GET',
                                                data: 'num='+reponse.info[0].num+'&&inputQte='+reponse.info[0].inputQte+'&&formule='+reponse.info[0].formule,
                                                dataType:'json',
                                                success:function(reponsy,state){
                                                    console.log(reponsy);
                                                    if(reponsy.success){
                                                        // alert('tody');
                                                        swal("Succés", reponsy.success, {
                                                            icon : "success",
                                                            buttons: {        			
                                                                confirm: {
                                                                    className : 'btn btn-success',
                                                                    
                                                                }
                                                            },
                                                        }).then((Delete) => {
                                                            if (Delete) {     
                                                                window.location.href = 'http://192.168.88.40/GPS/demande';
                                                            }
            
                                                        });
                                                    }
                                                    
                                                }
                                            }) 
                                        }
            
                                    });
                                }
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
                } else {
                    swal.close();
                }
            });
        }
    });
    
    var refuser = $('.refusebtn');
            
            $(refuser).each(function(){
                $(this).on('click',function(evt){
                    evt.preventDefault();
                    id = $(this).closest('tr').attr('id');
                    // url = $(this).closest('tr').attr('a');
                    // alert(url);
                    swal({
                        title: "Refuser la demande?",
                        text: 'La demande n° '+id+' sera refusée! Cet action est irreversible',
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
                            $.ajax({
                                url: 'http://192.168.88.40/GPS/DemandeController/refuse',
                                type:'GET',
                                data: 'num='+id,
                                dataType:'json',
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
                                    }
                                    if(reponse.success){
                                        swal("Succés", reponse.success, {
                                            icon : "success",
                                            buttons: {        			
                                                confirm: {
                                                    className : 'btn btn-success'
                                                }
                                            },
                                        }).then((Delete) => {
                                            if (Delete) {     
                                                window.location.reload();
                                            }

                                        });
                                    }
                                }
                            })
                        } else {
                            swal.close();
                        }
                    });
                });
            })
})