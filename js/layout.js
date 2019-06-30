jQuery(document).ready(function() {
    if (document.URL=='http://html.m11.coreserver.jp/htmls/C2919889/service.html?id=2') {
    	$('html, body').animate({
	        scrollTop: 1400
	    }, 1000);	
    }   

    
    $(document).find('.nav-active').removeClass('nav-active');

    $('.header-navigation ul li').eq(page-1).find('a div').addClass('nav-active');
});