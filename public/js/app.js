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
	 $("#address1").val("");
	 $("#address2").val("");
	 $("#city").val("");
	 $("#postal_code").val("");
	console.log("clear select opts");

};
$.fn.clear_home_inst_values = function () {
	 $("#home_institution").val("");

};
$.fn.clear_spouse_name_values = function () {
	 $("#spouse_name").val("");

};

$.fn.update_fields_info = function ($value) {
	switch($value) {
	 case 'value1':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#addressDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_address_values();
	    $.fn.clear_spouse_name_values();
	    break;
	 case 'value2':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    $.fn.clear_spouse_name_values();
	    break;
	 case 'value3':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    $.fn.clear_spouse_name_values();
    	break;
	 case 'value4':
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#spouseDivCheck').remove('no-display').fadeIn('slow');
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    break;
	 case 'value5':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    $.fn.clear_spouse_name_values();
    	break;
	 case 'value6':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    $.fn.clear_spouse_name_values();
    	break;
	 case 'value7':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
		$('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_spouse_name_values();
	    $.fn.clear_home_inst_values();
	    break;
	 case 'value8':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').remove('no-display').fadeIn('slow');
	    $.fn.clear_home_inst_values();
	    $.fn.clear_spouse_name_values();
    	break;
	 case 'value9':
		$('#spouseDivCheck').add('no-display').hide();
		$('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').add('no-display').hide();
	    $.fn.clear_address_values();
		$.fn.clear_spouse_name_values();
		$.fn.clear_home_inst_values();
	    break;
	 case 'value10':
	    $('#spouseDivCheck').add('no-display').hide();
	    $('#homeInstDivCheck').add('no-display').hide();
		$('#addressDivCheck').add('no-display').hide();
	    $.fn.clear_home_inst_values();
		$.fn.clear_spouse_name_values();
		$.fn.clear_address_values();
    	break;
	case 'value11':
		$('#spouseDivCheck').add('no-display').hide();
		$('#homeInstDivCheck').add('no-display').hide();
		$('#addressDivCheck').add('no-display').hide();
		$.fn.clear_home_inst_values();
		$.fn.clear_spouse_name_values();
		$.fn.clear_address_values();
		break;
	default:
	    $('#homeInstDivCheck').add('no-display').hide();
	    $('#addressDivCheck').add('no-display').hide();
	    $('#spouseDivCheck').add('no-display').hide();
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
