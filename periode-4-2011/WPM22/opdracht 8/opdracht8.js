// JavaScript Document
    $("p").click(function () { 
      $(this).slideUp(); 
    });
    $("p").hover(function () {
      $(this).addClass("hilite");
    }, function () {
      $(this).removeClass("hilite");
    });
