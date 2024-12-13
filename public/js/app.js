 // jQuery plugin to prevent double submission of forms
 $.fn.preventDoubleSubmission = function () {
            $(this).on('submit', function (e) {

                var $form = $(this);
  	        	$(this).find(':submit').attr('disabled','disabled');
  	        	$(this).find(':submit').attr('value','Please wait..');

                if ($form.data('submitted') === true) {
                    // Previously submitted - don't submit again
                    alert('The form has already been submitted. Please wait.');
		    		$(':submit', $form).prop('disabled',true)
                    e.preventDefault();
                } else {
                    // Mark it so that the next submit can be ignored
                    // ADDED requirement that form be valid
                    if($form.valid()) {
                        $form.data('submitted', true);
                    }
                }
            });

            // Keep chainability
            return this;
 };


$.fn.clear_address_values = function () {
	$("input[name=address1]").val("");
	$("input[name=address2]").val("");
	$("input[name=city]").val("");
	$("input[name=province_state]").val("");
	$("input[name=postal_code]").val("");
	console.log("clear select opts");
};
$.fn.clear_home_inst_values = function () {
	$("select[name=home_institution]").val("");
};
$.fn.clear_only_inst_values = function () {
	$("select[name=only_institution]").val("");
};
$.fn.clear_spouse_name_values = function () {
	$("input[name=spouse_name]").val("");
};
$.fn.clear_telephone_no_values = function () {
	$("input[name=telephone_no]").val("");
};
$.fn.clear_mcgill_id_values = function () {
	$("input[name=mcgill_id]").val("");
};
$.fn.clear_current_barcode_values = function () {
	$("input[name=current_barcode]").val("");
	$("input[name=department]").val("");
};

// Define the set_field_required function as a jQuery plugin
$.fn.set_field_required = function (name_of_field) {
	// Select the input field by its name attribute
	var $field = $("input[name='" + name_of_field + "']");

	// Check if the field exists
	if ($field.length === 0) {
		console.warn("No input field found with name:", name_of_field);
		return this;
	}

	// Set the field as required
	$field.attr('required', true);

	// Attempt to find the associated label
	// Assumes the label has a 'for' attribute matching the input's 'id'
	var fieldId = $field.attr('name');
	if (fieldId) {
		var $label = $("label[for='" + fieldId + "']");
		if ($label.length) {
			// Check if an asterisk already exists to avoid duplicates
			if ($label.find('.required-asterisk').length === 0) {
				// Append the asterisk with the desired styling
				$label.append(' <span class="required-asterisk required">*</span>');
			}
		} else {
			console.warn("No label found for input with id:", fieldId);
		}
	} else {
		console.warn("Input field", name_of_field, "does not have an id attribute.");
	}

	// Return 'this' to maintain jQuery chaining
	return this;
};



$.fn.update_fields_info = function ($value) {
	switch($value) {
		case 'value1':
			$('#spouseDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value2':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#AlumniValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#otherValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value3':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value4':
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#spouseDivCheck').remove('no-display').fadeIn('slow');
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value5':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#mcgillIdDivCheck').remove('no-display').fadeIn('slow');
			$.fn.set_field_required('mcgill_id');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value6':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#addressDivCheck').remove('no-display').fadeIn('slow');
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value7':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#addressDivCheck').remove('no-display').fadeIn('slow');
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_spouse_name_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value8':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#addressDivCheck').remove('no-display').fadeIn('slow');
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value9':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value10':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').remove('no-display').fadeIn('slow');
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value11':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').remove('no-display').fadeIn('slow');
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value12':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#mcgillIdDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_mcgill_id_values();
			$.fn.clear_only_inst_values();
			break;
		case 'value13':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#mcgillIdDivCheck').remove('no-display').fadeIn('slow');
			$.fn.set_field_required('mcgill_id');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_only_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_current_barcode_values();
			break;
		case 'value14':
			$('#spouseDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').remove('no-display').fadeIn('slow');
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_address_values();
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_mcgill_id_values();
			break;
		case 'value15':
			$('#spouseDivCheck').add('no-display').hide();
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#mcgillIdDivCheck').remove('no-display').fadeIn('slow');
			$.fn.set_field_required('mcgill_id');
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#otherValueEmail').remove('no-display').fadeIn('slow').find('input').prop('disabled', false);
			$('#AlumniValueEmail').add('no-display').hide().find('input').prop('disabled', true);
			$.fn.clear_home_inst_values();
			$.fn.clear_spouse_name_values();
			$.fn.clear_address_values();
			$.fn.clear_telephone_no_values();
			$.fn.clear_current_barcode_values();
			$.fn.clear_only_inst_values();
			break;
		default:
			$('#homeInstDivCheck').add('no-display').hide();
			$('#homeOnlyDivCheck').add('no-display').hide();
			$('#addressDivCheck').add('no-display').hide();
			$('#spouseDivCheck').add('no-display').hide();
			$('#telephoneDivCheck').add('no-display').hide();
			$('#currentBarcodeDivCheck').add('no-display').hide();
			$('#otherValueEmail').remove('no-display').show();

	}

};

$(document).ready(function () {

    // Get the curr val
    $curr_val = $('select[name="borrower_cat"]').val();
    $.fn.update_fields_info($curr_val);

    $('#store-form').preventDoubleSubmission();


    $('select[name="borrower_cat"]').change(function () {
	$selected_val = $(this).val();
        $.fn.update_fields_info($selected_val);
    });



});
