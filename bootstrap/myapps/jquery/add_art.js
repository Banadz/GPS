$(document).ready(function(){
    // adding article
    let info = ''
    var addArt = $('.addArt');
    $(addArt).on('click',function(){
        $('#AdditionModal').modal('show');
        
        $tr = $(this).closest('tr');
        info =  $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        var id = info[0];
        var unite = info[5];
        $('#labelUnicite').html(' (en '+unite+')');
        $('#xunitaire').hide();
        $('#xmonta').hide();
        $('body').on('blur','#id_effectif', function(){
            $('#type_prix').focus();
        });
        $('#type_prix').on('blur', function(){
            var choice =  $('#type_prix option:selected').val();
            if (choice === 'yes'){
                $('#xunitaire').fadeIn(500);
            }else{
                $('#xmonta').fadeIn();
            }
        });
        $('#type_prix').on('focus', function(){
            $('#xunitaire').hide();
            $('#xmonta').hide();
            $('#prix_uni').attr('value','');
            $('#id_montant').attr('value','');
        });
        $('#prix_uni').on('blur', function(){
            $('#xmonta').fadeIn(1000);
            number1 = $("#id_effectif").val();
            number2 = $('#prix_uni').val();
            qte = parseInt(number1);
            uni = parseInt(number2);
            mon = (qte * uni);
            mon = parseInt(mon);
            $('#id_montant').value = mon;
            $('#id_montant').attr('value', mon);
        });

        $('#fournisform').on('submit', function(def){
            def.preventDefault();
            var garbage = $(this).serialize();
            url = $(this).attr('action');
            var id = info[0];
            var qte = $("#id_effectif").val();
            if ((!qte) || (qte == "")){
                swal("Echéc", "Veuillez indiquer la quantité à insérer", {
                    icon : "error",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
            }else{
                swal({
                    title: "Valider l'ajout de "+qte+"?",
                    text: "Veiullez bien vérifier les informations avant de valider pour l'article n° "+id,
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
                            url: url,
                            type:'GET',
                            data: 'id='+id+'&'+garbage+'&description=',
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
                        })
                    } else {
                        swal.close();
                    }
                });
            }
        });
        
    });



    // =================================================RECTIFICATION =========================================================
        $('#restriunitaire').hide();
        $('#restrimonta').hide();
        $('body').on('blur','#id_effectifR', function(){
            $('#restritype_prix').focus();
        });
        $('body').on('blur','#restritype_prix', function(){
            var choice =  $('#restritype_prix option:selected').val();
            if (choice === 'yes'){
                $('#restriunitaire').fadeIn(500);
                $('#restriunitaire').focus();
            }else{
                $('#restrimonta').fadeIn();
                $('#restrimonta').focus();
            }
        });
        $('#restritype_prix').on('focus', function(){
            $('#restriunitaire').hide();
            $('#restrimonta').hide();
            $('#prix_uniR').attr('value','');
            $('#id_montantR').attr('value','');
        });
        $('#prix_uniR').on('blur', function(){
            $('#restrimonta').fadeIn(1000);
            number1 = $("#id_effectifR").val();
            number2 = $('#prix_uniR').val();
            qte = parseInt(number1);
            uni = parseInt(number2);
            mon = (qte * uni);
            mon = parseInt(mon);
            $('#id_montantR').value = mon;
            $('#id_montantR').attr('value', mon);
        });

        $('#restrictionform').on('submit', function(def){
            def.preventDefault();
            var garbage = $(this).serialize();
            url = $(this).attr('action');
            var id = info[0];
            var qte = $("#id_effectifR").val();
            if ((!qte) || (qte == "")){
                swal("Echéc", "Veuillez indiquer la quantité à insérer", {
                    icon : "error",
                    buttons: {        			
                        confirm: {
                            className : 'btn btn-danger'
                        }
                    },
                });
            }else{
                swal({
                    title: "Valider la restriction de "+qte+"?",
                    text: "Veiullez bien vérifier les informations avant de valider pour l'article n° "+id,
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
                            url: url,
                            type:'GET',
                            data: 'id='+id+'&&'+garbage,
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
                        })
                    } else {
                        swal.close();
                    }
                });
            }
        });
});