$(document).ready(function(){
    // inserting article
    // $('#id_nomenclature').change(function(){
    //     $('#listid').each(function(){
    //         $(this).remove()
    //     });
    //     var nom_selected = $("#id_nomenclature option:selected").val();
    //     // alert(nom_selected);
    //     $.ajax({
    //         url:'http://192.168.88.40/GPS/ArticleController/getCompte',
    //         type:'GET',
    //         data:'nomenclature='+nom_selected,
    //         dataType:'json',
    //         success:function(result,status){
    //             $('#listid').each(function(){
    //                 $(this).remove()
    //             });
    //             var res = result.compte;
    //             // console.log(res);
    //             $.each(res, function(i,v){
    //                 // console.log(v["DESIGNATION_CMPT"]);
    //                 $('#id_count').append('<option id="listid" value="'+v["ID_CMPT"]+'">'+v["NUM_CMPT"]+' - '+v["DESIGNATION_CMPT"]+'</option>');
    //                 // $('#unityid').attr('value', v["UNITE_ART"]);
    //             });
    //         }
    //     })
    // });
    
    $('#id_categorie').on('keypress', function(){
        var count_selected = $("#id_count option:selected").val();
        var cat = $('#id_categorie').val();
        
        $('#sel_cate').each(function(){
            $(this).remove()
        });
        $('#resultlab').each(function(){
            $(this).remove()
        });
        $('#list2id').each(function(){
            $(this).remove()
        });

        $.ajax({
            url:'http://192.168.88.40/GPS/ArticleController/seachCategorie',
            type:'GET',
            data:'compte='+count_selected+'&&categorie='+cat,
            dataType:'json',
            success:function(resultat,status){
                $('#sel_cate').each(function(){
                    $(this).remove()
                });
                $('#resultlab').each(function(){
                    $(this).remove()
                });
                $('#list2id').each(function(){
                    $(this).remove()
                });
                // alert("Batisay");
                $('#new_cat').append('<label for="" id="resultlab">Resultat</label><select name="categories" class="form-control" id="sel_cate"></select>');
                var res = resultat.categorie;
                // console.log(res);
                $.each(res, function(i,v){
                    // console.log(v["LABEL_CAT"]);
                    $('#sel_cate').append('<option id="list2id" value="'+v["ID_CAT"]+'">'+v["LABEL_CAT"]+'</option>');
                    // $('#unityid').attr('value', v["UNITE_ART"]);
                });
            }
        })
    });
    $('#add_form').on('submit', function(e){
        e.preventDefault();
        alert('ok');
        var data = $(this).serialize();
        url = $(this).attr('action');
        // $.ajax({
        //     url: url,
        //     type:'POST',
        //     data: data,
        //     dataType:'json',
        //     success:function(reponse,status){
        //         console.log(reponse.article);
                
        //         if(reponse.error){
        //             swal("Echéc", reponse.error, {
        //                 icon : "error",
        //                 buttons: {        			
        //                     confirm: {
        //                         className : 'btn btn-danger'
        //                     }
        //                 },
        //             });
        //             console.log(reponse.error);
        //         }
        //         if(reponse.success){
        //             swal("Succés", reponse.success, {
        //                 icon : "success",
        //                 buttons: {        			
        //                     confirm: {
        //                         className : 'btn btn-success',
                                
        //                     }
        //                 },
        //             }).then((Delete) => {
        //                 if (Delete) {     
        //                     // window.location.reload();
        //                 }

        //             });

        //         }
        //     }
        // })
    });
});