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
	    'address1' => 'required_if:borrower_cat,value7',
	    'postal_code' => 'required_if:borrower_cat,value7',
	    'city' => 'required_if:borrower_cat,value7',
	    'home_institution' => 'required_if:borrower_cat,value9, value1',
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
	dd($yamlContents);
        return [
	        'fname.required' => 'Your first name  is required',
	        'lname.required' => 'Your last name  is required',
	        'email.required' => 'Your email  is required',
	        'borrower_cat.required' => 'Please select  a borrowing category',
	        'telephone_no.required' => 'Please enter a phone number we can reach you at',
	    	'spouse_name.required_if' => 'Please enter the name of your spouse',
        ];
    }
}
