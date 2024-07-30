$(document).ready(function(){
    let agent = ''
    $.ajax({
        url: 'http://192.168.88.40/GPS/HomeController/salutation',
        dataType:'json',
        success: function(reponse, status){
            if (reponse.success){
                agent = reponse.success
            }
            // console.log(agent)
            
            if ((agent['PASSWORD'] === "0000") || (agent['PASSWORD'] === 'default')){
                $('#salutation').modal('show')
                let formalit = 'Monsieur'
                if(agent['GENRE'] === 'F'){
                    formalit = 'Madame'
                }
                let i = 0     
                magimagie()

                $(document).on('mousedown',function(e){
                    mymodal = $('#salutation')
                    if (   !$(e.target).closest('.modal-content').length && mymodal.is(":visible")   ){
                        window.location.href='http://192.168.88.40/GPS/user/profil'
                    }
                })
                $('#oui').on('click', function() {
                    window.location.href = 'http://192.168.88.40/GPS/user/profil'
                })
                
                function magimagie(){
                    var place = $('#lettreSalut')
                    var message = `Bonjour `+formalit+` `+agent['NOM_UTIL_AG']+`, Bienvenu sur CAM-i, Une application de Comptabililté Administrative et des
                    Matières Informatisées. L'utilisation de cette application nécessite l'utilisation des comptes personneles. Prémièrement, pour relier 
                    l'application à votre situation dans le système de gestion physique. Deuxièmement, suivre vos activités au sein de l'application. Troisièmement
                    pour stocker, manipuler, imprimer les données ou information qui vous concerne. Votre comptes sera protégé par un système d'authentification 
                    qui est réquis au début de chaque session d'utilisation.
                    Comme votre compte est nouvellement créé avec un mot de passe par défaut, c'est pourquoi on vous propose de vérifier la 
                    conformité de vos informations personnels ainsi que de changer votre mot de passe dans le menu profil pour sécurisé votre compte.
                    Veuillez changez votre mot de passe pour bien sécuriser votre compte.`
                    
                    if (i < message.length){
                        $('#lettreSalut').append(message.charAt(i))
                        i++
                        setTimeout(magimagie, 20)
                    } 
                }

            }
        
            
        }
    });
})