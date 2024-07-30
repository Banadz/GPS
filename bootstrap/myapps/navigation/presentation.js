$(document).ready(function(){
    let i = 0
    $('body').on('click','.gps', function(prevent){
        prevent.preventDefault();
        $('#presentation').modal('show')
        magimagie("Bienvenu sur GPS");
    })
    function magimagie(titre){
        $('#presenttitre').html(titre);
        let formalit = 'Monsieur'
        var message = `GPS est une application de Gestion du Patrimoine et de Stock. 
        Ce dernier a été concu dans le but d'améliorer la qualité du système de gestion existante.`
        
        if (i < message.length){
            $('#lettrePresent').append(message.charAt(i))
            i++
            setTimeout(magimagie, 20)
        } 
    }
});