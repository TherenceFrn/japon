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
    

// EDITOR

$('.editor-titre-h2').on('click', function(){

   
   var texte = $('.editor-contenu-article').val();
   var texte = texte + '<h2>  </h2>';
   $('.editor-contenu-article').val(texte);
});

$('.editor-titre-h3').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<h3>  </h3>';
    $('.editor-contenu-article').val(texte);
});

$('.editor-paragraph').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<p>  </p>';
    $('.editor-contenu-article').val(texte);
});

$('.editor-bold').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<strong>  </strong>';
    $('.editor-contenu-article').val(texte);
});

$('.editor-underline').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<u>  </u>';
    $('.editor-contenu-article').val(texte);
});

$('.editor-image').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<img src="#" class="contenu-commentaire-image">';
    $('.editor-contenu-article').val(texte);
});

$('.editor-link').on('click', function () {


    var texte = $('.editor-contenu-article').val();
    var texte = texte + '<a href="#"></a>';
    $('.editor-contenu-article').val(texte);
});


window.onload=function(){
var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));
    if (mobile) {
        alert("Ce site est optimisé pour une navigation sur ordinateur");  
    } else {
        
    }
}
//document.cookie = 'cookie_mobile=valeur_cookie; expires=Thu, 2 Aug 2012 20:47:11 UTC; path=/'