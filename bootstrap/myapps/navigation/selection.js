$(document).ready(function(){
    let tableCategorie = ''
    tableCategorie = $('#add-rowCategorie').DataTable()
    $('.selectCompte').each(function(){
        $(this).on('click', function(){
            $('#selectCompte').modal('show');
        })
        $('.chooseCmpt').each(function(){
            $(this).on('click',function(){
                $tr = $(this).closest('tr');
                var info =  $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                $('#selectCompte').modal('toggle');
                $('.areaCompte').each(function(){
                    $(this).attr('value', info[0]+' - ' + info[1])
                    $(this).attr('id', info[0])
                })
            })
        })
    })
    $('.selectCategorie').each(function(){
        $(this).on('click', function(){
            tableCategorie =$('#add-rowCategorie').DataTable();
            tableCategorie.rows().remove().draw();
            compte = $('.areaCompte').attr('id');
            $.ajax({
                url:'http://192.168.88.40/GPS/ArticleController/seachCategorie',
                type:'GET',
                data:'compte='+compte,
                dataType:'json',
                success:function(resultat,status){
                    console.log(resultat);
                    if(resultat.success){
                        tableCategorie =$('#add-rowCategorie').DataTable();
                        tableCategorie.rows().remove().draw();
                        console.log(resultat.categorie)
                        if (resultat.categorie[0].length !== 1 ){
                            $('#selectCategorie').modal('show');
                            var resu = resultat.categorie;
                            let html = ``
                            let option =`<td>
                                            <div class="form-button-action">
                                                <button type="button" title="choisir" class="btn btn-link btn-primary btn-lg chooseCatego" data-original-title="Choose">
                                                    <i class="fas fa-location-arrow"></i>
                                                </button>
                                            </div>
                                        </td>`
                            $.each(resu, function(i,v){
                                                            
                                $('#add-rowCategorie').dataTable().fnAddData([
                                    v["ID_CAT"],
                                    v["LABEL_CAT"],
                                    option,
                                ]);
                            });
                            $('.chooseCatego').each(function(){
                                $(this).on('click',function(){
                                    $tr = $(this).closest('tr');
                                    var cati =  $tr.children("td").map(function(){
                                        return $(this).text();
                                    }).get();
                                    $('#selectCategorie').modal('toggle');
                                    $('.areaCategorie').each(function(){
                                        $(this).attr('value', cati[1])
                                        $(this).attr('id', cati[0])
                                    })
                                })
                            })
                            $('#add_form2').on('submit', function(e){
                                e.preventDefault();
                                // alert('ok');
                                // var data = $(this).serialize();
                                //RECUP
                                let id_compte = "";     
                                $('.areaCompte').each(function(){
                                    id_compte = $(this).attr('id');
                                })
                                let id_catego = "";
                                $('.areaCategorie').each(function(){
                                    id_catego = $(this).attr('id');
                                })
                                let designation = $('#id_designation2').val();
                                let specification = $('#specification2').val();
                                let united = $('#manchester option:selected').val();
                                url = $(this).attr('action');
                                $.ajax({
                                    url: url,
                                    type:'GET',
                                    data: 'count='+id_compte+'&&categories='+id_catego+'&&specificite='+specification+'&&unite_art='+united+'&&designation='+designation,
                                    dataType:'json',
                                    success:function(reponse,status){
                                        console.log(reponse.article);
                                        
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
                            });
                        }else{
                            $('.areaCategorie').each(function(){
                                $(this).attr('value',resultat.categorie)
                            });
                        }   
                    }else{
                        swal("Echéc", "Une erreur s'est produit lors du chargement", {
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
})