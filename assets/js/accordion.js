$(document).ready(function () {
     $('.menu ul li a').click(function () {
				
        var checkElement = $(this).next();

				if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            checkElement.slideUp('normal');
        }

        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            checkElement.slideDown('normal');
        }

    		return true;
    });
				
    var checkElement = $('.active').parent().parent();

    if ((checkElement.is('li')) && (checkElement.is(':visible'))) {
				checkElement.removeClass('closed');
				checkElement.addClass('open');
     }
});
