$(document).ready(function(){

        // Updating article
        let identifiant = ''
        var upDate = $('.upDate');
        $(upDate).on('click',function(){
            $('#UpdateModal').modal('show');
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            identifiant = data[0];
            // alert(data);
            $('#up_designation').val(data[2]);
            $('#up_specificite').val(data[3]);
            $('#up_quantit').val(data[4]);
            $('#up_unite').val(data[5]);
            $('#labelQ').html('Quantité en ('+data[5]+')');

            var lunch = $('#up_form');
            $(lunch).on('submit', function(evt){
                evt.preventDefault();
                var garbage = $(this).serialize();
                url = $(this).attr('action');
                var id = data[0];
                swal({
                    title: "Modifier l'article?",
                    text: 'Voullez-vous enregistrer le(s) modification(s) sur article n° '+id+' !',
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
                                console.log(reponse.update);
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
                                    swal("Succés", reponse.update, {
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
            })
            
        });

       
});