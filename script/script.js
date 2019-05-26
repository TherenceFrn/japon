$(function() {
  function bis() {
    $('.scroller').animate({top: '96%'}, 'slow')
               .animate({top: '92%'}, 'slow', bis);
  };
  bis();
});


$(document).on('click', ".back-to-top", function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("header").offset().top
    }, 2000);
});

$(document).on('click', ".scroller", function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".block-content-body").offset().top
    }, 1000);
});

$(document).ready(function () {

    $('.contenu-commentaire-image').on('click', function(){
        
        var varImage = $(this).attr('src');
        console.log(varImage);
        
        $('.modale-image img').attr('src', varImage);
        $('.modale-image').fadeIn();

        $('.modale-image').on('click', function(){
            $(this).fadeOut();
        })
    });
})
    