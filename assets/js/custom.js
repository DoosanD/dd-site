//header
//********************************* Menu Mobile *********************************
jQuery(window).ready(function(){
		jQuery(window).on("load resize", function() {
		  if(jQuery(window).width() < 991){
			  var $addedDiv = jQuery(".menu-chevron");
			  if($addedDiv.length == 0){
				  jQuery('.site-header .menu .menu-item-has-children').addClass( "d-drop" );
				  jQuery('.site-header .menu .menu-item-has-children.d-drop').append('<span role="button" class="menu-chevron">&#8250;</span>');
				  jQuery('.site-header .menu .menu-item-has-children.d-drop > .menu-chevron').on('click',function(event){
						event.preventDefault()
						jQuery(this).parent().find('ul').first().toggle(300);
						jQuery(this).parent().siblings().find('ul').hide(200);
						//Hide menu when clicked outside
						jQuery(this).parent().find('ul').mouseleave(function(){  
						  var thisUI = jQuery(this);
						  jQuery('html').click(function(){
							thisUI.hide();
							jQuery('html').unbind('click');
						  });
						});
					  });
			  }	   
			};
			if(jQuery(window).width() > 991){
				jQuery('.d-drop').removeClass( "d-drop" );
				jQuery('.site-header .menu .menu-item-has-children .menu-chevron').remove();
				jQuery('.site-header .menu .sub-menu').removeAttr('style'); 
			};
	
		});	
  }); 







