$(document).ready(function(){

    // NAVIGARION ==========================================
    $('nav ul li').click(function() {
        $('nav ul li').removeClass('active');
        $(this).addClass('active');
        var page = $(this).find('a').attr('href');
        $('.page').removeClass('active');
        $(page).addClass('active');
    });
    $('nav ul li a').hover(function() {
        $(this).addClass('hover');
        }, function() {
        $(this).removeClass('hover');
    });

    $('.menuxxx').each(function(){
        $(this).on('click',function() {
            var page = $(this).find('a').attr('href');
            $('.mode').removeClass('afficher');
            $(page).addClass('afficher');
        });
    });
    // /NAVIGATION==========================================
});