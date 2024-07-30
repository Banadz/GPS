$(document).ready(function () {
    // ASSETS
    var reference = $('#ref_mat');
    $(reference).on('keyup', function (calme) {
        calme.preventDefault();
        var valref = $('#ref_mat').val();
        if ($('#ref_mat').val() == '') {
            $('#reference').fadeOut("slow");
            $('#add').prop('disabled', false);
            $('.add').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'valref='+valref,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var reference = result.refemat;
                        $.each(reference, function(i,v){
                            console.log(v['REF_MAT']);
                            if (v['REF_MAT']) {
                                $('#reference').fadeIn("slow");
                                $('#reference').text("Référence matériel "+ valref +" existe déjà!");
                                $('#reference').css('color', 'red');
                                $('#add').prop('disabled', true);
                                $('.add').css('cursor', 'not-allowed');
                            } else{
                                $('#reference').fadeIn("slow");
                                $('#reference').text("Référence vérifié!");
                                $('#reference').css('color', 'green');
                                $('#add').prop('disabled', false);
                                $('.add').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })


    // CATEGORIE
    var label = $('#label_cat');
    $(label).on('keyup', function (cat) {
        cat.preventDefault();
        var numcmpt = $('#id_cmpts').val();
        var valcat = $('#label_cat').val();
        if ($('#label_cat').val() == '') {
            $('#categorie').fadeOut("slow");
            $('#save_cat').prop('disabled', false);
            $('.save_cat').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'valcat='+valcat+'&cmpt='+numcmpt,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var categorie = result.labelcat;
                        $.each(categorie, function(i,v){
                            console.log(v['LABEL_CAT']);
                            if (v['LABEL_CAT']) {
                                $('#categorie').fadeIn("slow");
                                $('#categorie').text("Catégorie "+ valcat +" existe déjà!");
                                $('#categorie').css('color', 'red');
                                $('#save_cat').prop('disabled', true);
                                $('.save_cat').css('cursor', 'not-allowed');
                            } else{
                                $('#categorie').fadeIn("slow");
                                $('#categorie').text("Catégorie vérifiée!");
                                $('#categorie').css('color', 'green');
                                $('#save_cat').prop('disabled', false);
                                $('.save_cat').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })

    // COMPTE
    var des = $('#designation_cmpt');
    var compte = $('#num_cmpt');
    $(compte).on('keyup', function (ct) {
        ct.preventDefault();
        var valcompte = $('#num_cmpt').val();
        if ($('#num_cmpt').val() == '') {
            $('#comptes').fadeOut("slow");
            $('#save_cmpt').prop('disabled', false);
            $('.save_cmpt').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'compte='+valcompte,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var cmpt = result.numcmpt;
                        $.each(cmpt, function(i,v){
                            console.log(v['NUM_CMPT']);
                            if (v['NUM_CMPT']) {
                                $('#comptes').fadeIn("slow");
                                $('#comptes').text("Compte "+ valcompte +" existe déjà!");
                                $('#comptes').css('color', 'red');
                                $('#save_cmpt').prop('disabled', true);
                                $('.save_cmpt').css('cursor', 'not-allowed');
                            } else{
                                $('#comptes').fadeIn("slow");
                                $('#comptes').text("Compte vérifié!");
                                $('#comptes').css('color', 'green');
                                $('#save_cmpt').prop('disabled', false);
                                $('.save_cmpt').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })

    $(des).on('keyup', function (dt) {
        dt.preventDefault();
        var valdes = $('#designation_cmpt').val();
        if ($('#designation_cmpt').val() == '') {
            $('#designation').fadeOut("slow");
            $('#save_cmpt').prop('disabled', false);
            $('.save_cmpt').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'des='+valdes,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var design = result.descmpt;
                        $.each(design, function(i,v){
                            console.log(v['DESIGNATION_CMPT']);
                            if (v['DESIGNATION_CMPT']) {
                                $('#designation').fadeIn("slow");
                                $('#designation').text("Libellé "+ valdes +" existe déjà!");
                                $('#designation').css('color', 'red');
                                $('#save_cmpt').prop('disabled', true);
                                $('.save_cmpt').css('cursor', 'not-allowed');
                            } else{
                                $('#designation').fadeIn("slow");
                                $('#designation').text("Libellé vérifiée!");
                                $('#designation').css('color', 'green');
                                $('#save_cmpt').prop('disabled', false);
                                $('.save_cmpt').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })


    //NOMENCLATURE
    
    var numnomencl = $('#id_nom');
    $(numnomencl).on('keyup', function (nom) {
        nom.preventDefault();
        var valid = $('#id_nom').val();
        if ($('#id_nom').val() == '') {
            $('#nomenclnum').fadeOut("slow");
            $('#save_nomencl').prop('disabled', false);
            $('.save_nomencl').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'idnomencl='+valid,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var nomencl = result.numnomencl;
                        $.each(nomencl, function(i,v){
                            console.log(v['ID_NOM']);
                            if (v['ID_NOM']) {
                                $('#nomenclnum').fadeIn("slow");
                                $('#nomenclnum').text("Nomenclature N° "+ valid +" existe déjà!");
                                $('#nomenclnum').css('color', 'red');
                                $('#save_nomencl').prop('disabled', true);
                                $('.save_nomencl').css('cursor', 'not-allowed');
                            } else{
                                $('#nomenclnum').fadeIn("slow");
                                $('#nomenclnum').text("Nomenclature vérifié!");
                                $('#nomenclnum').css('color', 'green');
                                $('#save_nomencl').prop('disabled', false);
                                $('.save_nomencl').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })

    var detail = $('#detail_nom');
    $(detail).on('keyup', function (dt) {
        dt.preventDefault();
        var valdet = $('#detail_nom').val();
        if ($('#detail_nom').val() == '') {
            $('#item').fadeOut("slow");
            $('#save_nomencl').prop('disabled', false);
            $('.save_nomencl').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'det='+valdet,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var detnomencl = result.detnomencl;
                        $.each(detnomencl, function(i,v){
                            console.log(v['DETAIL_NOM']);
                            if (v['DETAIL_NOM']) {
                                $('#item').fadeIn("slow");
                                $('#item').text("Item "+ valdet +" existe déjà!");
                                $('#item').css('color', 'red');
                                $('#save_nomencl').prop('disabled', true);
                                $('.save_nomencl').css('cursor', 'not-allowed');
                            } else{
                                $('#item').fadeIn("slow");
                                $('#item').text("Libellé vérifiée!");
                                $('#item').css('color', 'green');
                                $('#save_nomencl').prop('disabled', false);
                                $('.save_nomencl').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })



    // DIVISION

    var codediv = $('#codediv');
    $(codediv).on('keyup', function (cd) {
        cd.preventDefault();
        var division = $('#codediv').val();
        var codeser = $('#codeser option:selected').val();
        if ($('#codediv').val() == '') {
            $('#divcode').fadeOut("slow");
            $('#save_div').prop('disabled', false);
            $('.save_div').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'codediv='+division,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var div = result.codediv;
                        $.each(div, function(i,v){
                            console.log(v['CODE_SER']);
                            if (v['CODE_SER'] == codeser) {
                                $('#divcode').fadeIn("slow");
                                $('#divcode').text("Code division "+ division +" existe déjà!");
                                $('#divcode').css('color', 'red');
                                $('#save_div').prop('disabled', true);
                                $('.save_div').css('cursor', 'not-allowed');
                            } else{
                                $('#divcode').fadeIn("slow");
                                $('#divcode').text("Code division vérifiée!");
                                $('#divcode').css('color', 'green');
                                $('#save_div').prop('disabled', false);
                                $('.save_div').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })

    // SERVICE

    var code_ser = $('#code_ser');
    $(code_ser).on('keyup', function (ser) {
        ser.preventDefault();
        var service = $('#code_ser').val();
        if ($('#code_ser').val() == '') {
            $('#sercode').fadeOut("slow");
            $('#save_ser').prop('disabled', false);
            $('.save_ser').css('cursor', 'default');
        } else {
            $.ajax({
                type:'GET',
                url: 'http://192.168.88.40/GPS/AjaxController/verification',
                data: 'codeser='+service,
                dataType:'json',
                success:function(result,status) {
                    if (result.success) {
                        var ser = result.codeser;
                        $.each(ser, function(i,v){
                            console.log(v['CODE_SER']);
                            if (v['CODE_SER']) {
                                $('#sercode').fadeIn("slow");
                                $('#sercode').text("Code service "+ service +" existe déjà!");
                                $('#sercode').css('color', 'red');
                                $('#save_ser').prop('disabled', true);
                                $('.save_ser').css('cursor', 'not-allowed');
                            } else{
                                $('#sercode').fadeIn("slow");
                                $('#sercode').text("Code service vérifié!");
                                $('#sercode').css('color', 'green');
                                $('#save_ser').prop('disabled', false);
                                $('.save_ser').css('cursor', 'default');
                            }
                        });
                    }
                }
            });
        }
    })
});