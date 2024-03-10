////********************************* Remove autocomplete from dates*********************************
jQuery(".datepicker").attr("autocomplete", "off");
////********************************* Disable Double submit*********************************
jQuery("input[type='submit']").click(function(e){
	if( jQuery('.ajax-loader').hasClass('is-active') ) {
		e.preventDefault();
		return false;
	}
});
///********************************* Google Autocomplete  *********************************
function initializeAutocomplete() {
	var inputs = jQuery('.address-wrapper input');
	if (inputs) {
		for (let i = 0; i < inputs.length; i++) {
			let autocomplete= new google.maps.places.Autocomplete((inputs[i]), {types: ['geocode']});
			autocomplete.inputId = inputs[i].id;
			autocomplete.addListener('place_changed', fillInAddress);
			autocomplete.setComponentRestrictions(
				{ 'country': 'us' });
		}
	}
}
function fillInAddress() {
	var placeSearch, autocomplete;
	var componentForm = {
		street_number: 'short_name',
		route: 'long_name',
		locality: 'long_name',
		administrative_area_level_1: 'short_name',
		country: 'long_name',
		postal_code: 'short_name'
	};
	// Get the place details from the autocomplete object.
	var place = this.getPlace();
	var theID = '#' + this.inputId;
	var parentAddress = jQuery(theID).closest('.address-wrapper');
	const classListaddress = parentAddress.attr('class').split(" ");;
	const matches = classListaddress.filter(s => s.includes('parseaddress'));
	var addressID = matches[0].replace(/[^0-9]/g,'');
	var allInnerAddressParts = '.' + 'address-inner-' + addressID;
	for (var component in componentForm) {
		jQuery(allInnerAddressParts + ' input').val(" ");
	}
	
	// Get each component of the address from the place details and fill the corresponding field on the form.
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		if (componentForm[addressType]) {
			var val = place.address_components[i][componentForm[addressType]];
			var addressComponent = allInnerAddressParts + '.' + addressType + ' ' + 'input';
			jQuery(addressComponent).val(" ");
			jQuery(addressComponent).val(val);
		}
	}
}
google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
//********************************* Disable past dates *********************************
jQuery(document).ready(function(){
	gform.addFilter( 'gform_datepicker_options_pre_init', function( optionsObj, formId, fieldId ) {
		// do stuff
		optionsObj['minDate'] = 0;
		return optionsObj;
	} );
});

jQuery(document).on('gform_post_render', function(event, form_id, current_page){
	initializeAutocomplete();
});