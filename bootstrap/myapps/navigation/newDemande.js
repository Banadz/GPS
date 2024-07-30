$(document).ready(function(){
    let tableDem = $('#add-rowDemandeList').DataTable({
        "pageLength": 5,
    });
    let tableCate = ''
    tableCate =$('#add-rowCategoriesie').DataTable();
    $('.selectCat').each(function(){
        $(this).on('click', function(){
            $('.zoneArticle').each(function(){
                $(this).attr('value', '');
                $(this).attr('id', '');
            })
            $('#selectCat').modal('show');
        })
        $('.titihieKategory').each(function(){
            $(this).on('click',function(){
                $tr = $(this).closest('tr');
                var benzema =  $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                $('#selectCat').modal('toggle');
                $('.zoneCategorie').each(function(){
                    $(this).attr('value', benzema[0]+' - ' + benzema[1])
                    $(this).attr('id', benzema[0])
                })
            })
        })
    })
    let articulation = ''
    $('.selectArt').each(function(){
        $(this).on('click', function(){
            let categorie = $('.zoneCategorie').attr('id');
            $.ajax({
                url:'http://192.168.88.40/GPS/article/getDesignation',
                type:'GET',
                data:'compte='+categorie,
                dataType:'json',
                success:function(resultat,status){
                    if(resultat.success){
                        console.log(resultat)
                        if (resultat.designation.length !== 0 ){
                            
                            tableCate =$('#add-rowCategoriesie').DataTable();
                            tableCate.rows().remove().draw();
                            $('#selectArt').modal('show');
                            let resu = resultat.designation;
                            let html = ``
                            let option= ``
                            
                            option = `<div class="form-button-action">
                                            <button type="button" title="choisir" class="btn btn-link btn-primary btn-lg chooseArticle" data-original-title="Choose">
                                                <i class="fas fa-location-arrow"></i>
                                            </button>
                                        </div>`
                            $.each(resu, function(i,v){
                                $('#add-rowCategoriesie').dataTable().fnAddData([
                                    v["FORMULE"],
                                    v["DESIGNATION_ART"],
                                    v["SPECIFICITE_ART"],
                                    v["UNITE_ART"],
                                    option
                                ]);
                            });
                            $('.chooseArticle').each(function(){
                                $(this).on('click',function(){
                                    $tr = $(this).closest('tr')
                                    articulation =  $tr.children("td").map(function(){
                                        return $(this).text()
                                    }).get();
                                    // let stock = resu[articulation[0]]["EFFECTIF_ART"]
                                    // console.log(resu[articulation[0]])
                                    $('#selectArt').modal('toggle');
                                    $('.zoneArticle').each(function(){
                                        $(this).attr('value', articulation[1]+' '+ articulation[2])
                                        $(this).attr('id', articulation[0])
                                    })
                                    $('.quantico').each(function(){
                                        $(this).html(articulation[3])
                                        $(this).attr('id', articulation[3])
                                    })
                                    // $('.zoneQuant').each(function(){
                                    //     // $(this).attr('id', stock)
                                    // })
                                })
                            })
                        }else{
                            $('.zoneArticle').each(function(){
                                $(this).attr('value','Aucun article correspondant')
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
    let action = `<td> 
                    <div class="form-button-action">
                        <button type="button" data-toggle="tooltip" title="Modifier" class="btn btn-link btn-primary btn-lg editing" data-original-title="Edit"> 
                            <i class="fa fa-edit"></i> 
                        </button> 
                        <button type="button" data-toggle="tooltip" title="Supprimer" class="btn btn-link btn-danger deleting" id="" data-original-title="Remove"> 
                            <i class="fa fa-times"></i> 
                        </button> 
                    </div> 
                </td>`;

    
    $('.addedd').each(function(){
        let formu = ''
        let quantit = ''
        let cata = ''
        let cataLib = ''
        let design = ''
        let specifi = ''
        let unit = ''
        let index = ''
        let content = ''
        let htmlQte =''
        $(this).click(function() {
            cata = $('.zoneCategorie').attr('id')
            cataLib = $('.zoneCategorie').attr('value')
            quantit= $('.zoneQuant').val()
            formu = $('.zoneArticle').attr('id')
            unit = $('.quantico').attr('id')
            if (quantit == 0 || quantit == "" || quantit == 0 || cata == "" || !cata || formu == "" || !formu || unit =="" || !unit){
                if ( cata == "" || !cata){
                    swal("Echéc", "Vous n'avez pas bien choisi la catégorie", {
                        icon : "error",
                        buttons: {        			
                            confirm: {
                                className : 'btn btn-danger'
                            }
                        },
                    });
                }else{
                    if (formu == "" || !formu){
                        swal("Echéc", "Vous n'avez pas bien choisi l'article", {
                            icon : "error",
                            buttons: {        			
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        });
                    }else{
                        if (quantit == 0 || quantit == ""){
                            swal("Echéc", "Vous devez indiquer le quantité", {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            });
                        }
                    }
                }
            }else{
                $.ajax({
                    url:'http://192.168.88.40/GPS/QteDemande/control',
                    method:'POST',
                    data:{formule:formu, qDem:quantit},
                    dataType:'json',
                    success:function(resultat,status){
                        if(resultat.success){
                            design = articulation[1]
                            specifi = articulation[2]
                            unit= articulation[3]
                            htmlQte = `<td class='editqu'>`+quantit+`</td>`
                            $('#add-rowDemandeList').dataTable().fnAddData([
                                formu,
                                cata,
                                design,
                                specifi,
                                quantit,
                                unit,
                                action
                            ]);
                            // $('.bodyAddingDEm').each(function(){
                            //         content += `<tr id=" `+formu+`">
                            //                             <td>`+formu+`</td>
                            //                             <td> `+cata+`</td>
                            //                             <td>`+design+`</td>
                            //                             <td> `+specifi+`</td>
                            //                             <td class='editqu'>`+quantit+`</td>
                            //                             <td> `+unit+`</td>
                            //                             <td> 
                            //                                 <div class="form-button-action">
                            //                                     <button type="button" data-toggle="tooltip" title="Modifier" 
                            //                                     class="btn btn-link btn-primary btn-lg editing" data-original-title="Edit"> 
                            //                                         <i class="fa fa-edit"></i> 
                            //                                     </button> 
                            //                                     <button type="button" data-toggle="tooltip" title="Supprimer" 
                            //                                     class="btn btn-link btn-danger deleting" id="" data-original-title="Remove"> 
                            //                                         <i class="fa fa-times"></i> 
                            //                                     </button> 
                            //                                 </div> 
                            //                             </td>
                            //                         </tr>`;
                            //         $(this).html(content);
                            // })
                            $('#adding').trigger('reset');
                            $('.editqu').each(function(){
                                $(this).on('click',function(){
                                    $(this).attr('contenteditable', true);
                                });
                                
                                $(this).on('blur',function(){
                                    $(this).removeAttr('contenteditable');
                                    // tableDem.draw(false);
                                })
                            })                
                            $('.deleting').each(function(){
                                $(this).on('click', function(){
                                    index = $(this).closest('tr').index()
                                    tableDem.row(index).remove().draw(false)
                                })
                            })  
                        }else{
                            swal("Echéc", resultat.rapport, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            })
                        }
                    }
                })
                  
            }
        })
    })

    $('body').on('click', '.editing', function(){
            var table = $('#add-rowDemandeList').DataTable();
            index = $(this).closest('tr').index()
            
            $tr = $(this).closest('tr')
            let laligne =  $tr.children("td").map(function(){
                return $(this).text();
            }).get()
            var row = table.row(index);

            $('#editDem').modal('show')
            $('.up_DemCat').each(function(){
                $(this).attr('value', cataLib)
            })
            $('.up_Demdesign').each(function(){
                $(this).attr('value', design)
            })
            $('.up_Demspecifi').each(function(){
                $(this).attr('value', specifi)
            })
            $('.up_DemQuant').each(function(){
                $(this).attr('value', laligne[4])
            })
            $('.up_quantico').each(function(){
                $(this).html(laligne[5])
            })
            $('.dem_articlce').each(function(){
                $(this).html(laligne[2]+' '+laligne[3])
            })
            $('#up_demande').on('submit',function(defender){
                defender.preventDefault()
                formu = laligne[0]
                quantit = $('#up_DemQuant').val()
                $.ajax({
                    url:'http://192.168.88.40/GPS/QteDemande/control',
                    method:'POST',
                    data:{formule:formu, qDem:quantit},
                    dataType:'json',
                    success:function(resultat,status){
                        if(resultat.success){
                                        
                            $('#editDem').modal('toggle')
                            swal({
                                title: 'Attention',
                                text: "Voulez vous enregistrez?",
                                type: 'warning',
                                icon:'warning',
                                buttons:{
                                    confirm: {
                                        text : 'Oui',
                                        className : 'btn btn-warning'
                                    },
                                    cancel: {
                                        visible: true,
                                        text:"Annuler",
                                        className: 'btn'
                                    }
                                }
                            }).then((Delete) => {
                                if (Delete) {
                                    table.row(index).data([
                                        row.data()[0],
                                        row.data()[1],
                                        row.data()[2],
                                        row.data()[3],
                                        $('#up_DemQuant').val(),
                                        row.data()[5],
                                        row.data()[6]
                                    ])
                                    table.draw(false);
                                    // $('#editDem').modal('toggle')
                                } else {
                                    swal.close()
                                    $('#editDem').modal('show')
                                }
                            })
                        }else{
                            swal("Echéc", resultat.rapport, {
                                icon : "error",
                                buttons: {        			
                                    confirm: {
                                        className : 'btn btn-danger'
                                    }
                                },
                            })
                        }
                    }
                })
            })
    })
    $('body').on('click', '#validDemande', function(){
        
        var Donnetable = $('#add-rowDemandeList').DataTable()
        let big_data = Donnetable.data().toArray()
        console.log(big_data)
        $.ajax({
            url:'http://192.168.88.40/GPS/demande/insertion',
            method:'POST',
            data:{big_data:big_data},
            dataType:'json',
            success:function(resultat,status){
                console.log(resultat)
                if(resultat.success){
                    swal("Réussie", resultat.success, {
                        icon : "success",
                        buttons: {
							confirm: {
								text : 'Ok',
								className : 'btn btn-success'
							}
                        },
                    }).then((willDelete) => {
						if (willDelete) {
                            var listNumSTring = "listNum="+encodeURIComponent(JSON.stringify(resultat.ListNum))
                            var queryString = "big_data="+ encodeURIComponent(JSON.stringify(big_data))
                            // // console.log(queryString)
                            window.location.href = "DemandeController/printDemande?"+queryString+"&&"+listNumSTring
						}
					});
                }else{
                    swal("Echéc", resultat.error, {
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