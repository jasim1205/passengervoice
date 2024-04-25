
var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

	
	
// Sidebar
function init_sidebar() {
	// TODO: This is some kind of easy fix, maybe we can improve this
	var setContentHeight = function () {
		// reset height
		$RIGHT_COL.css('min-height', $(window).height());

		var bodyHeight = $BODY.outerHeight(),
			footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
			leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
			contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

		// normalize content
		contentHeight -= $NAV_MENU.height() + footerHeight;

		$RIGHT_COL.css('min-height', contentHeight);
	}
	
	
	
	var setHeight = function(sh){
		
		var height = $(window).height();
		var nav = 580;
		
		var nav_h = nav + 51;
		var nav_m = height - 51;
		
		if ( height < nav_h ) {	
			
			var all_li = $('.sidebar > li');
		
			var nav_height = all_li.length * 38.85;
			
			var click_height = nav_height + 16 + sh - 38.85;
			
			
			if ( nav_height < click_height ) {		
				$('.sidebar').css({"height" : nav_m+"px"});
				$('.sidebar').css({"overflow-y" : "scroll"});
			} else {
				$('.sidebar').css({"height" : nav_m+"px"});
				$('.sidebar').css({"overflow-y" : "scroll"});
			}
			
		} else {
			
			var all_li = $('.sidebar > li');
		
			var nav_height = all_li.length * 38.85;
			
			var click_height = nav_height + 16 + sh - 38.85;
			
			
			if ( nav_height < click_height ) {		
				$('.sidebar').css({"height" : "580px"});
				$('.sidebar').css({"overflow-y" : "scroll"});
			} else {
				$('.sidebar').css({"height" : "580px"});
				$('.sidebar').css({"overflow-y" : "hidden"});
			}
		}
		
	}
	

	$SIDEBAR_MENU.find('a').on('click', function(ev) {
		// console.log('clicked - sidebar_menu');		
		
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active');
            $('ul:first', $li).slideUp(function() {
				setContentHeight();
				setHeight($li.height());
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active ');
                $SIDEBAR_MENU.find('li ul').slideUp();
            } else
            {
				if ( $BODY.is( ".nav-sm" ) )
				{
					$SIDEBAR_MENU.find( "li" ).removeClass( "active " );
					$SIDEBAR_MENU.find( "li ul" ).slideUp();
				}
			}
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
				setContentHeight();
				setHeight($li.height());				
            });
        }
		
		
		
		
    });

	// check active menu
	$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

	$SIDEBAR_MENU.find('a').filter(function () {
		return this.href == CURRENT_URL;
	}).parent('li').addClass('current-page').parents('ul').slideDown(function() {
		setContentHeight();
	}).parent().addClass('active');	
};

	   
$(document).ready(function() {
	
	init_sidebar();	
	
	$(window).resize(function(){
		
		var height = $(window).height();
		var nav = 580;
		
		var nav_h = nav + 51;
		var nav_m = height - 51;
		
		if ( height < nav_h ) {		
			$('.sidebar').css({"height" : nav_m+"px"});
			$('.sidebar').css({"overflow-y" : "scroll"});
		} else {
			$('.sidebar').css({"height" : "580px"});
			$('.sidebar').css({"overflow-y" : "hidden"});
		}
		
	});

	var height = $(window).height();
	var nav = 580;
	
	var nav_h = nav + 51;
	
	var nav_m = height - 51;
	
	
	if ( height < nav_h ) {				
		$('.sidebar').css({"height" : nav_m+"px"});
		$('.sidebar').css({"overflow-y" : "scroll"});
	} else {
		$('.sidebar').css({"height" : "580px"});
		$('.sidebar').css({"overflow-y" : "hidden"});
	}

});	
