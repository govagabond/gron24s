$(function() {
    $(".list-bnr").hover(function () {
        $(this).find(".imgOver").stop(true).animate({opacity:0.6, filter: 'alpha(opacity=60)'}, 150);
        $(this).find(".overLink").stop(true).animate({opacity:0.9, filter: 'alpha(opacity=90)', top:0}, 250);
    },function () {
        $(this).find(".imgOver").stop(true).animate({opacity:0, filter: 'alpha(opacity=0)'}, 300);
        $(this).find(".overLink").stop(true).animate({top:30, opacity:0, filter: 'alpha(opacity=0)'}, 250);
    });
    
});

 