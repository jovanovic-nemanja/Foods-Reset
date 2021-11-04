$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > 100){
            $('.header_area').addClass('show');
        } else {
            $('.header_area').removeClass('show');
        }
    })
})