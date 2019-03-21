<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yaml;

class Borrower extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	    'fname' => 'required|max:255',
	    'lname' => 'required|max:255',
	    'email' => 'required|email',
	    'borrower_cat' => 'required',
	    'telephone_no' => 'required|numeric',
	    'spouse_name' => 'required_if:borrower_cat,value4',
	    'address1' => 'required_if:borrower_cat,value2,value3, value4, value5, value6,value8,value10',
	    'city' => 'required_if:borrower_cat,value2,value3, value4, value5, value6,value8,value10',
	    'postal_code' => 'required_if:borrower_cat,value2,value3, value4, value5, value6,value8,value10',
	    'home_institution' => 'required_if:borrower_cat,value1',
        ];
    }
    /**
	    *  * Get the error messages for the defined validation rules.
	    *   *
	    *    * @return array
	    *     */
    public function messages()
    {
	// Load the variables
	$yamlContents = Yaml::parse(file_get_contents(base_path().'/borrowing_categories.yml'));
        return [
	        'fname.required' => 'Your first name  is required',
	        'lname.required' => 'Your last name  is required',
	        'email.required' => 'Your email  is required',
	        'borrower_cat.required' => 'Please select  a borrowing category',
	        'telephone_no.required' => 'Please enter a phone number we can reach you at',
	    	'spouse_name.required_if' => 'Please enter the name of your spouse',
	    	'address1.required_if' => 'Please fill in your address',
	    	'postal_code.required_if' => 'Please enter your postal code',
	    	'city.required_if' => 'Please enter your city',
	    	'home_institution.required_if' => 'Please enter the name of your home institution',
        ];
    }
}
