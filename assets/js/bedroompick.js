jQuery('.vm-studios-1').on('click', function(event){
	  	event.preventDefault(); 
    	var value = jQuery(this).attr('name');
  		jQuery("#vm-move-size1").val(value);
		jQuery("#vm-move-size1").closest('fieldset').find('button').click();
});
jQuery("#vm-move-size1").closest('fieldset').find('button').css('display', 'none');