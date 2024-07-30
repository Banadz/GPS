$(document).ready(function(){
    
        // deleting article
    var deleteArt = $('.deleteArt');
        $(deleteArt).each(function(){
            $(this).on('click',function(evt){
                evt.preventDefault();
                id = $(this).closest('tr').attr('id');
                swal({
                    title: "Supprimer l'article?",
                    text: 'Voullez vous supprimer article n° '+id+' !',
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
                            url: 'http://192.168.88.40/GPS/ArticleController/suppression',
                            type:'GET',
                            data: 'formule='+id,
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
        });
});