window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("navigation").style.background = "white";
    } else {
        document.getElementById("navigation").style.background = "white";
    }
}
/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
    $('.primary-navigation').not('.mobile-menu-wrapper').find('.menu').clone().appendTo(
        '.mobile-menu-wrapper').hide();
    $('.toggle-mobile-menu').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('body').toggleClass('mobile-menu-active');
    });
    // prevent propagation of scroll event to parent
    $(document).on('DOMMouseScroll mousewheel', '.mobile-menu-wrapper', function(ev) {
        var $this = $(this),
            scrollTop = this.scrollTop,
            scrollHeight = this.scrollHeight,
            height = $this.height(),
            delta = (ev.type == 'DOMMouseScroll' ?
                ev.originalEvent.detail * -40 :
                ev.originalEvent.wheelDelta),
            up = delta > 0;
        var prevent = function() {
            ev.stopPropagation();
            ev.preventDefault();
            ev.returnValue = false;
            return false;
        }
        if ($('a#pull').css('display') !==
            'none') { // if toggle menu button is visible ( small screens )
            if (!up && -delta > scrollHeight - height - scrollTop) {
                // Scrolling down, but this will take us past the bottom.
                $this.scrollTop(scrollHeight);
                return prevent();
            } else if (up && delta > scrollTop) {
                // Scrolling up, but this will take us past the top.
                $this.scrollTop(0);
                return prevent();
            }
        }
    });
}).on('click', function(event) {
    var $target = jQuery(event.target);
    if (($target.hasClass("fa") && $target.parent().hasClass("toggle-caret")) || $target.hasClass(
            "toggle-caret")) { // allow clicking on menu toggles
        return;
    }
    jQuery('').removeClass('mobile-menu-active');
});