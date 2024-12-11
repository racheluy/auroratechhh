var tombolMenu = $(".tombol-menu");
var menu = $("nav .menu ul");

function klikMenu() {
  tombolMenu.click(function() {
    menu.toggle();
  });
  menu.off('click').click(function(e) {
    e.stopPropagation();
  });
}

$(document).ready(function() {
  var width = $(window).width();
  if (width < 990) {
    klikMenu();
  }
});

// Cek lebar
$(window).resize(function() {
  var width = $(window).width();
  if (width > 990) {
    menu.css("display", "block");
  } else {
    menu.css("display", "none");
  }
  tombolMenu.off();
  klikMenu();
});

//efek scroll
$(document).ready(function() {
   var scroll_pos = 0;
   $(document).scroll(function(){
    scroll_pos=$(this).scrollTop();
    if(scroll_pos > 0){
        $("nav").addClass("white");
        $("nav img.black").show();
        $("nav img.white").hide();
    }else{
        $("nav").removeClass("white");
        $("nav img.black").hide();
        $("nav img.white").show();
    }
   })
  });