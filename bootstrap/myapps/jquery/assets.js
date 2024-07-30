$(document).ready(function () {
    //Recherche detenteur partie 1
    $('#detenteur').hide();
    $('#rechdet').on('keyup',function (rech) {
        rech.preventDefault();
        if ($(this).val() == '') {
            $('#detenteur').empty();
            $('#detenteur').hide();
            $('#rechres').fadeOut('slow');

            $('#division').each(function(){
                $(this).remove()
            });
            $('#resultlab').each(function(){
                $(this).remove()
            });
            $('#codediv').each(function(){
                $(this).remove()
            });

        } else {
            var val = $(this).val().toLowerCase();
            $.ajax({
                url:'http://localhost/GPS/AjaxController/detenteur',
                type:'POST',
                data: {val: val},
                dataType:'json',
                success:function (response) {
                    if (response.success) {
                        if (response.agent.length !== 0) {
                            console.log(response.agent.length);
                            $('#detenteur').empty();
                            $('#detenteur').show();
                            $('#detenteur').attr('size', response.agent.length);
                            $('#rechres').fadeOut('slow');
                            var agents = response.agent;
                            $.each(agents, function (f,n) {
                                $('#detenteur').append("<option value='"+ n['MATRICULE'] +"'>"+ n['MATRICULE'] +"-"+ n['NOM_AG'] +" "+ n['PRENOM_AG'] +"</option>");
                                if (response.agent.length == 1) {
                                    $('#detenteur').blur(function () {
                                        var selecval = $('#detenteur option:selected').val();
                                        $.ajax({
                                            url:'http://localhost/GPS/AjaxController/getdet',
                                            type:'POST',
                                            data: {matr:selecval},
                                            dataType:'json',
                                            success:function (valiny) {
                                                if (valiny.success) {
                                                    var unagent = valiny.agent;
                                                    $.each(unagent, function (n,f) {
                                                        $('#rechdet').val(f['MATRICULE'] +"-"+ f['NOM_AG'] +" "+ f['PRENOM_AG']);
                                                    })
                                                }
                                            }
                                        });
                                        $(this).hide();
                                    })
                                } else if (response.agent.length > 1) {
                                    $('#detenteur').change(function () {
                                        var selecval = $('#detenteur option:selected').val();
                                        $.ajax({
                                            url:'http://localhost/GPS/AjaxController/getdet',
                                            type:'POST',
                                            data: {matr:selecval},
                                            dataType:'json',
                                            success:function (valiny) {
                                                if (valiny.success) {
                                                    var unagent = valiny.agent;
                                                    $.each(unagent, function (n,f) {
                                                        $('#rechdet').val(f['MATRICULE'] +"-"+ f['NOM_AG'] +" "+ f['PRENOM_AG']);
                                                    })
                                                }
                                            }
                                        });
                                        $(this).hide();
                                    })
                                }

                            });

    
                        } else {
                            $('#rechres').fadeIn('slow');
                            $('.rechres').css('color', 'red');
                            $('#detenteur').hide();
                        }
                    }
                }    
            });
        }
    })



    //Recherche detenteur partie 2

    $('#det').hide();
    $('#rechdet2').on('keyup',function (rech) {
        rech.preventDefault();
        if ($(this).val() == '') {
            $('#det').empty();
            $('#det').hide();
            $('#rechres2').fadeOut('slow');


            $('#divrow').each(function(){
                $(this).remove()
            });
            $('#resultlabel').each(function(){
                $(this).remove()
            });
            $('#codedivision').each(function(){
                $(this).remove()
            });

        } else {
            var val = $(this).val().toLowerCase();
            $.ajax({
                url:'http://192.168.88.40/GPS/AjaxController/detenteur',
                type:'POST',
                data: {val: val},
                dataType:'json',
                success:function (response) {
                    if (response.success) {
                        if (response.agent.length !== 0) {
                            console.log(response.agent.length);
                            $('#det').empty();
                            $('#det').show();
                            $('#det').attr('size', response.agent.length);
                            $('#rechres2').fadeOut('slow');
                            var agents = response.agent;
                            $.each(agents, function (f,n) {
                                $('#det').append("<option value='"+ n['MATRICULE'] +"'>"+ n['MATRICULE'] +"-"+ n['NOM_AG'] +" "+ n['PRENOM_AG'] +"</option>");
                                if (response.agent.length == 1) {
                                    $('#det').blur(function () {
                                        var selecval = $('#det option:selected').val();
                                        $.ajax({
                                            url:'http://192.168.88.40/GPS/AjaxController/getdet',
                                            type:'POST',
                                            data: {matr:selecval},
                                            dataType:'json',
                                            success:function (valiny) {
                                                if (valiny.success) {
                                                    var unagent = valiny.agent;
                                                    $.each(unagent, function (n,f) {
                                                        $('#rechdet2').val(f['MATRICULE'] +"-"+ f['NOM_AG'] +" "+ f['PRENOM_AG']);
                                                    })
                                                }
                                            }
                                        });
                                        $(this).hide();
                                    })
                                } else if (response.agent.length > 1) {
                                    $('#det').change(function () {
                                        var selecval = $('#det option:selected').val();
                                        $.ajax({
                                            url:'http://192.168.88.40/GPS/AjaxController/getdet',
                                            type:'POST',
                                            data: {matr:selecval},
                                            dataType:'json',
                                            success:function (valiny) {
                                                if (valiny.success) {
                                                    var unagent = valiny.agent;
                                                    $.each(unagent, function (n,f) {
                                                        $('#rechdet2').val(f['MATRICULE'] +"-"+ f['NOM_AG'] +" "+ f['PRENOM_AG']);
                                                    })
                                                }
                                            }
                                        });
                                        $(this).hide();
                                    })
                                }

                            });

    
                        } else {
                            $('#rechres2').fadeIn('slow');
                            $('.rechres2').css('color', 'red');
                            $('#det').hide();
                        }
                    }
                }    
            });
        }
    })


    var nomencltable = $('.nomencltable'), insertnomencl = $('.insertnomencl');
    $(nomencltable).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            $('#nomencltable').modal('show');
            $(insertnomencl).each(function () {
                $(this).on('click', function (params) {
                    params.preventDefault();
                    $tr = $(this).closest('tr');

                    var nomencldata = $tr.children('td').map(function (){
                        return $(this).text();
                    }).get();
        
                    var idnomencl = nomencldata[0];
                    var item = nomencldata[1];
                    
                    $('#nomencltable').modal('toggle');

                    $('.nomenclature').each(function () {
                        $(this).attr('value', idnomencl+' - '+item);
                    })
                    $('.nomenclaturehide').each(function () {
                        $(this).attr('value', idnomencl);
                    })
                })
            })
        })
    })

    var comptetable = $('.comptetable'), insertcompte = $('.insertcompte');
    $(comptetable).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            $('#comptetable').modal('show');
            $(insertcompte).each(function () {
                $(this).on('click', function (params) {
                    params.preventDefault();
                    $tr = $(this).closest('tr');

                    var comptedata = $tr.children('td').map(function (){
                        return $(this).text();
                    }).get();
        
                    var compte = comptedata[0];
                    var libelle = comptedata[1];
                    
                    $('#comptetable').modal('toggle');

                    $('.compte').each(function () {
                        $(this).attr('value', compte+' - '+libelle);
                        $(this).attr('id', comptedata[1]);
                    })
                    $('.comptehide').each(function () {
                        $(this).attr('value', compte);
                    })
                })
            })
        })
    })

    var categorietable = $('.categorietable');
    $(categorietable).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            var insertcompte = $('.insertcompte'), compteselec = $('.comptehide').attr('value');
            $.ajax({
                url:'http://192.168.88.40/GPS/GetController/Categorie',
                type:'GET',
                data:'compte='+compteselec,
                dataType:'json',
                success:function(resultat,status){
                    if (resultat.success) {
                        if (resultat.categorie.length !== 0) {
                            
                            tableCate =$('#tablecat').DataTable();
                            tableCate.rows().remove().draw();
                            $('#categorietable').modal('show');
                            let resu = resultat.categorie;
                            
                            let option = `<button id="" class="btn btn-link btn-primary btn-lg insertCat" title="Modifier"><i class="fas fa-location-arrow"></i></button>`
                            $.each(resu, function(i,v){
                                $('#tablecat').dataTable().fnAddData([
                                    v["ID_CAT"],
                                    v["DESIGNATION_CMPT"],
                                    v["LABEL_CAT"],
                                    option
                                ]);
                            });
                            var insertCat = $('.insertCat');
                            $(insertCat).each(function () {
                                $(this).on('click', function (params) {
                                    params.preventDefault();
                                    $tr = $(this).closest('tr');
                
                                    var catdata = $tr.children('td').map(function (){
                                        return $(this).text();
                                    }).get();
                        
                                    var idcat = catdata[0];
                                    var categorie = catdata[2];
                                    
                                    $('#categorietable').modal('toggle');
                
                                    $('.categorie').each(function () {
                                        $(this).attr('value', categorie);
                                    })
                                    $('.categoriehide').each(function () {
                                        $(this).attr('value', idcat);
                                    })
                                })
                            })


                        } else{
                            $('.categorie').each(function () {
                                $(this).attr('value', 'Aucune catégorie correspondante');
                            })
                        }
                    }
                }
            })
        })
    })

    var sortirbout2 = $('.sortirbout2');
    $(sortirbout2).each(function () {
        $(this).on('click', function (param) {
            param.preventDefault();
            
            $('#sortmatentres').modal('show');

            $tr = $(this).closest('tr');
            var sortmatentres = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var matref1 = sortmatentres[1];
            var specmat1 = sortmatentres[3];

            $('#lohahevitra1').remove();
            $('#headmatentres').append('<h2 class="modal-title" id="lohahevitra1">Matériel : '+ matref1 +' - '+ specmat1 +'</h2>');
            $('#refsort1').append('<input type="hidden" name="refmatentres" id="refmatentres" class="form-control" value="'+matref1+'">');

            var formcondmatentres = $('#formcondmatentres');
            $(formcondmatentres).on('submit', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                // alert(data +' - '+url);
                swal({
                    icon:'warning',
                    title: 'Attention',
                    text:'Etes-vous sûr à la condamnation?',
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Condamner',
                            className : 'btn btn-warning'
                        },
                        cancel: {
                            text:'Annuler',
                            visible: true,
                            className: 'btn'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $.ajax({
                            type:'POST',
                            data:data,
                            url:url,
                            dataType:'json',
                            success:function(reponse,status){
                                if (reponse.success) {
                                    swal({
                                        title: "oK!",
                                        text: 'Matériel '+ matref1 +'condamné!',
                                        buttons:false,
                                        icon: "success",
                                    });
                                    setTimeout(function(){
                                        swal.close();
                                        window.location.reload();
                                    }, 3000);
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
                
            });

        })
    })

    var modifboutmat = $('.modifboutmat');

    $(modifboutmat).each(function () {
        $(this).on('click', function (param) {
            param.preventDefault();
            
            $('#matmodifmodal').modal('show');

            $tr = $(this).closest('tr');
            var matdata = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var refmat = matdata[1];

            $('#title').remove();
            $('#header').append('<h2 class="modal-title" id="title">Modification matériel : '+ refmat +'</h2>');

            $.ajax({
                url:'http://192.168.88.40/GPS/AjaxController/materielmodifie',
                type:'GET',
                data:'referencemate='+refmat,
                dataType:'json',
                success:function (results, status) {
                    if (results.success) {
                        var materiel = results.materiel;
                        $.each(materiel, function(i,v){
                            $('.reference').attr('value', v["REF_MAT"]);
                            $('.designation').attr('value', v["DESIGN_MAT"]);
                            $('.specificite').attr('value', v["SPEC_MAT"]);
                            let html = '';
                            if (v["ETAT_MAT"] === 'Bon') {
                                html += `
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Mauvais">Mauvais</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat').html(html);
                            } else if (v["ETAT_MAT"] === 'Moyen') {
                                html += `
                                <option value="Moyen">Moyen</option>
                                <option value="Bon">Bon</option>
                                <option value="Mauvais">Mauvais</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat').html(html);
                            } else if(v["ETAT_MAT"] === 'Mauvais') {
                                html += `
                                <option value="Mauvais">Mauvais</option>
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat').html(html);
                            } else if (v["ETAT_MAT"] === 'Hors d\'usage') {
                                html += `
                                <option value="Hors d'usage">Hors d'usage</option>
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Mauvais">Mauvais</option>
                                `;
                                $('.nouvetat').html(html);
                            }
                        });

                        var formmodfmateriel = $('#formmodfmateriel');
                        $(formmodfmateriel).on('submit', function(e){
                            e.preventDefault();
                            var data = $(this).serialize();
                            var url = $(this).attr('action');
                            // alert(data +' - '+url);
                            $.ajax({
                                type:'POST',
                                data:data,
                                url:url,
                                dataType:'json',
                                success:function(reponse,status){
                                    if (results.success) {
                                        swal({
                                            title: "Succès!",
                                            text: 'Matériel '+ refmat +' modifié!',
                                            buttons:false,
                                            icon: "success",
                                        });
                                        setTimeout(function(){
                                            swal.close();
                                            window.location.reload();
                                        }, 3000);
                                    }
                                }
                            });
                        });
                    }
                }
            });

        })
    })


    var editbout = $('.editbout');

    $(editbout).each(function () {
        $(this).on('click', function (param) {
            param.preventDefault();
            
            $('#Modalmodification').modal('show');

            $tr = $(this).closest('tr');
            var matdatas = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var refmats = matdatas[0];

            $('#title1').remove();
            $('#header1').append('<h2 class="modal-title" id="title1">Modification matériel : '+ refmats +'</h2>');

            $.ajax({
                url:'http://192.168.88.40/GPS/AjaxController/materielmodifie',
                type:'GET',
                data:'referencemate='+refmats,
                dataType:'json',
                success:function (results, status) {
                    if (results.success) {
                        var materiel = results.materiel;
                        $.each(materiel, function(i,v){
                            $('.reference1').attr('value', v["REF_MAT"]);
                            $('.designation1').attr('value', v["DESIGN_MAT"]);
                            $('.specificite1').attr('value', v["SPEC_MAT"]);
                            $('.date_deb').attr('value', v["DATYDEB"]);
                            let html = '';
                            if (v["ETAT_MAT"] === 'Bon') {
                                html += `
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Mauvais">Mauvais</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat1').html(html);
                            } else if (v["ETAT_MAT"] === 'Moyen') {
                                html += `
                                <option value="Moyen">Moyen</option>
                                <option value="Bon">Bon</option>
                                <option value="Mauvais">Mauvais</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat1').html(html);
                            } else if(v["ETAT_MAT"] === 'Mauvais') {
                                html += `
                                <option value="Mauvais">Mauvais</option>
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvetat1').html(html);
                            } else if (v["ETAT_MAT"] === 'Hors d\'usage') {
                                html += `
                                <option value="Hors d'usage">Hors d'usage</option>
                                <option value="Bon">Bon</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Mauvais">Mauvais</option>
                                `;
                                $('.nouvetat1').html(html);
                            }
                        });

                        var formmodfmateriels = $('#formmodfmateriels');
                        $(formmodfmateriels).on('submit', function(e){
                            e.preventDefault();
                            var data = $(this).serialize();
                            var url = $(this).attr('action');
                            // alert(data +' - '+url);
                            $.ajax({
                                type:'POST',
                                data:data,
                                url:url,
                                dataType:'json',
                                success:function(reponse,status){
                                    if (results.success) {
                                        swal({
                                            title: "Succès!",
                                            text: 'Matériel '+ refmats +' modifié!',
                                            buttons:false,
                                            icon: "success",
                                        });
                                        setTimeout(function(){
                                            swal.close();
                                            window.location.reload();
                                        }, 3000);
                                    }
                                }
                            });
                        });
                    }
                }
            });

        })
    })


    var sortirbout = $('.sortirbout');
    $(sortirbout).each(function () {
        $(this).on('click', function (param) {
            param.preventDefault();
            
            $('#Modalsortir').modal('show');

            $tr = $(this).closest('tr');
            var sortdata = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var matref = sortdata[0];
            var specmat = sortdata[2];
            var codediv = sortdata[4];

            $('#lohahevitra').remove();
            $('#head').append('<h2 class="modal-title" id="lohahevitra">Matériel : '+ matref+' - '+ specmat +'('+ codediv +')</h2>');
            $('#refsort').append('<input type="hidden" name="refmatsort" id="refmatsort" class="form-control" value="'+matref+'">');

            var formsortir = $('#formsortir');
            $(formsortir).on('submit', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                // alert(data +' - '+url);
                swal({
                    icon:'warning',
                    title: 'Attention',
                    text:'Etes-vous sûr à la condamnation?',
                    type: 'warning',
                    buttons:{
                        confirm: {
                            text : 'Condamner',
                            className : 'btn btn-warning'
                        },
                        cancel: {
                            text:'Annuler',
                            visible: true,
                            className: 'btn'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $.ajax({
                            type:'POST',
                            data:data,
                            url:url,
                            dataType:'json',
                            success:function(reponse,status){
                                if (reponse.success) {
                                    swal({
                                        title: "oK!",
                                        text: 'Matériel '+ matref +' condamné!',
                                        buttons:false,
                                        icon: "success",
                                    });
                                    setTimeout(function(){
                                        swal.close();
                                        window.location.reload();
                                    }, 3000);
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
                
            });

        })
    })

    var detbouton = $('.detboutton');
    $(detbouton).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            $('#detmatmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var ref = data[1];
            var spec = data[3];
            $('#titre').remove();
            $('#modalheader').append('<h2 class="modal-title" id="titre">Matériel : '+ ref +' ('+ spec +') </h2>');
            $('#detenteur').on('blur',function () {

                var matricule = $('#detenteur option:selected').val();
                
                $('#division').each(function(){
                    $(this).remove()
                });
                $('#resultlab').each(function(){
                    $(this).remove()
                });
                $('#codediv').each(function(){
                    $(this).remove()
                });

                $.ajax({
                    url:'http://192.168.88.40/GPS/AjaxController/getdivision',
                    type:'GET',
                    data:'matricule='+matricule,
                    dataType:'json',
                    success:function (results, status) {
                        $('#division').each(function(){
                            $(this).remove()
                        });
                        $('#resultlab').each(function(){
                            $(this).remove()
                        });
                        $('#codediv').each(function(){
                            $(this).remove()
                        });

                        var div = results.division;
                        // console.log(res);
                        $.each(div, function(i,v){
                            console.log(v["LABEL_DIVISION"]);
                            $('#rowdiv').append('<div class="form-group col-3" id="division"><label for="" id="resultlab">Division</label><input type="text" style="text-align: center;" class="form-control" value="'+ v["CODE_DIVISION"]+'" name="codediv" id="codediv"><input type="hidden" class="form-control" value="'+ ref +'" name="referencemat" id="referencemat"></div>');
                            // $('#unityid').attr('value', v["UNITE_ART"]);
                        });
                    }
                });
                
                
            });
            $('#date_debut').change(function () {
                if ($('#detenteur').val() == 0 || $('#codediv').val == '' || $('#date_debut').val == '') {
                    $('#save').prop('disabled', true);
                    $('.save').css('cursor', 'not-allowed');
                } else {
                    $('#save').prop('disabled', false);
                    $('.save').css('cursor', 'default');
                }
            });
        });
    });


    var changebout = $('.changebout');
    $(changebout).each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            $('#changedetmodal').modal('show');
            $tr = $(this).closest('tr');
            var donnee = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var reference = donnee[1];
            var specificite = donnee[3];
            var det = donnee[4];
            var etat = donnee[6];

            $('#title').remove();
            $('#modalhead').append('<h2 class="modal-title" id="title">Matériel : '+ reference +' ('+ specificite +') '+ etat +' etat - Détenteur : '+ det +'</h2>');
            $('.refmat').attr('value', reference);
            $("#det").on('blur',function () {
                if($(this).val() != 0){
                    var agmatr = $('#det option:selected').val();
            
                    $('#divrow').each(function(){
                        $(this).remove()
                    });
                    $('#resultlabel').each(function(){
                        $(this).remove()
                    });
                    $('#codedivision').each(function(){
                        $(this).remove()
                    });

                    $.ajax({
                        url:'http://192.168.88.40/GPS/AjaxController/getdivision',
                        type:'GET',
                        data:'matricule='+agmatr,
                        dataType:'json',
                        success:function (reponses, status) {
                            $('#divrow').each(function(){
                                $(this).remove()
                            });
                            $('#resultlabel').each(function(){
                                $(this).remove()
                            });
                            $('#codedivision').each(function(){
                                $(this).remove()
                            });

                            var zay = reponses.division;
                            // console.log(res);
                            $.each(zay, function(i,v){
                                console.log(v["LABEL_DIVISION"]);
                                $('#ambony').append('<div class="form-group col-3" id="divrow"><label for="" class="resultlabel">Division</label><input type="text" id="codedivision" value="'+ v['CODE_DIVISION'] +'" class="form-control"></div>');
                                // $('#unityid').attr('value', v["UNITE_ART"]);
                            });
                        }
                    });
                } else{
                    $('#divrow').each(function(){
                        $(this).remove()
                    });
                    $('#resultlabel').each(function(){
                        $(this).remove()
                    });
                    $('#codedivision').each(function(){
                        $(this).remove()
                    });
                }
            });
            $('#date_deb').change(function () {
                if ($('#etat').val() == 0 || $('#det').val() == 0 || $('#codediv').val == '' || $('#date_deb').val == '') {
                    $('#enregistrer').prop('disabled', true);
                    $('.enregistrer').css('cursor', 'not-allowed');
                } else {
                    $('#enregistrer').prop('disabled', false);
                    $('.enregistrer').css('cursor', 'default');
                }
            });
        });
    });


    var infos = $('.infos');
    $(infos).each(function () {
        $(this).on('click', function (eo) {
            eo.preventDefault();
            $('#modinfosort').modal('show');

            $tr = $(this).closest('tr');
            var datasortinfo = $tr.children('td').map(function (){
                return $(this).text();
            }).get();
            var matrefinfo = datasortinfo[0];
            var specmatinfo = datasortinfo[2];

            $('#matinfotitle').remove();
            $('#headmatinfo').append('<h2 class="modal-title" id="matinfotitle">Matériel : '+ matrefinfo+' - '+ specmatinfo +'</h2>');
            
            $.ajax({
                url:'http://192.168.88.40/GPS/AjaxController/sortaseho',
                type:'GET',
                data:'refmat='+matrefinfo,
                dataType:'json',
                success:function (results, statut) {
                    if (results.success) {
                        var sortie = results.sortie;
                        $.each(sortie, function(i,v){
                            let html = '';
                            if (v["STATUT"] === 'perdu') {
                                html += `
                                <option value="perdu">Perte</option>
                                <option value="hors d'usage">Hors d'usage</option>
                                `;
                                $('.nouvstatut').html(html);
                            } else if (v["STATUT"] === 'hors d\'usage') {
                                html += `
                                <option value="hors d'usage">Hors d'usage</option>
                                <option value="perdu">Perte</option>
                                `;
                                $('.nouvstatut').html(html);
                            }
                            $('.id_sort').attr('value', v["ID_SORTIE"]);
                            $('.date_sort').attr('value', v["DATY"]);
                            $('.ref_sort').attr('value', v["REF_SORT"]);
                            $('.observation').text(v['MOTIF_SORT']);
                        });

                        var formsortmodif = $('#formsortmodif');
                        $(formsortmodif).on('submit', function(e){
                            e.preventDefault();
                            var data = $(this).serialize();
                            var url = $(this).attr('action');
                            // alert(data +' - '+url);
                            $.ajax({
                                type:'POST',
                                data:data,
                                url:url,
                                dataType:'json',
                                success:function(reponse,status){
                                    if (results.success) {
                                        swal({
                                            title: "Succès!",
                                            text: "Informations du matériel "+ matrefinfo +" modifiée!",
                                            buttons:false,
                                            icon: "success",
                                        });
                                        setTimeout(function(){
                                            swal.close();
                                            window.location.reload();
                                        }, 3000);
                                    }
                                }
                            });
                        });
                    }
                }
            })
        })
    })



    var deconnecter = $('#deconnecter')
    $(deconnecter).on('click', function () {
        swal({
            icon:'warning',
            title:'Se deconnecter?',
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Oui',
                    className : 'btn btn-warning'
                },
                cancel: {
                    text: 'Non',
                    visible: true,
                    className: 'btn'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                window.location.href = "http://192.168.88.40/GPS/HomeController/disconnect";
            } else {
                swal.close();
            }
        });
    })
})