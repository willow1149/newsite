function changesrc() {
    setsrc(viewport().width >= 991 ? "src-1200px" : "src-768px");
}

function setsrc(e) {
    $.each($(".eme-rsImg"), function(t, n) {
        var i = $(this).data(e);
        $(this).attr("src", i)
    });
}

// swap logo according to width
function swapLogo() {

    var i = viewport().width >= 767 ? "src-1200px" : "src-768px";
    $('.swinger-logo').attr("src", $('.swinger-logo').data(i));
}

// SmartMenus init
$(function() {
  $('#main-menu').smartmenus({
    mainMenuSubOffsetX: -1,
    /*mainMenuSubOffsetY: 4,*/
    subMenusSubOffsetX: 6,
    subMenusSubOffsetY: -6
});
});

// SmartMenus CSS animated sub menus - toggle animation classes on sub menus show/hide
$(function() {
  $('#main-menu').bind({
    'show.smapi': function(e, menu) {
      $(menu).removeClass('hide-animation').addClass('show-animation');
  },
  'hide.smapi': function(e, menu) {
      $(menu).removeClass('show-animation').addClass('hide-animation');
  }
}).on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function(e) {
    $(this).removeClass('show-animation hide-animation');
    e.stopPropagation();
});
});

/* owls on required devices only */
function owlsonrequireddevicesonly(elem, breakpoint, args) {
    if ($(elem)[0]) {
        var s = $(elem);
        if (window.innerWidth < breakpoint) {
            s.owlCarousel(args)
        } else s.addClass("off");
        // destroy owl carousel on resize
        $(window).resize(function(e) {
            if (window.innerWidth < breakpoint) {
                if ($(elem).hasClass("off")) {
                    s.owlCarousel(args);
                    s.removeClass("off")
                }
            } else $(elem).hasClass("off") || (s.addClass("off").trigger("destroy.owl.carousel"), s.find(".owl-stage-outer").children(":eq(0)").unwrap())
        })
    }
}

/* activate hamburger navigation */
function hamburgerdrop(elemclick, target) {
    if (elemclick.length) {
        $(elemclick).click(function(e) {
            e.preventDefault();
            $(target).stop(true, true).animate({
                top: "toggle",
                opacity: "toggle"
            }, 200);
        });
    }
}


$(window).load(function(e){
    /* smart menu */
    if ($('#main-menu').length) {
        $("#main-menu").smartmenus().bind("click.smapi", function(e, t) {
            var n = $(this).data("smartmenus");
            if (n.isCollapsible()) {
                var i = $(t);
                o = i.dataSM("sub");
                if (o && !o.is(":visible")) return n.itemActivate(i, !0), !1
            }
    });
    }
    /* hamburger menu toggle */
    if ($('.menu-toggle').length) {
        $('.menu-toggle').click(function() {
            $(this).toggleClass('open');
            $('#logo').toggleClass('hide-logo')
        });
    }
});

function toggleshare(){
    if($('#shareicon').length){
        $('#shareicon').click(function(){
            $('#displayicons').toggleClass('show-icons')
        });
    }
}

$(document).ready(function(){
    /* main navigation */
    hamburgerdrop('.mainmenutoggle', '.main-menu-container');
    /* toggleshare */
    toggleshare();
 
    var breakpoint = 991;
    e = {
        loop: !0,
        responsive: {
            0: {
                items: 1,
                dots: !1,
            },
            767:{
                items: 2,
                dots: !1,
            }
        }
    }
    /** @param
    0 - elem id / elem class
    1 - breakpoint where you want carousel
    2 - carousel args
    */
    owlsonrequireddevicesonly("#main-slider", breakpoint, e); 
})