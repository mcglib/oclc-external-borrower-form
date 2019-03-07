<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BorrowerForm extends Form
{
   protected $formOptions = [
       'method' => 'GET',
        'url' => '/search'
   ];

    public function buildForm()
    {
        $borrower_categories = $this->get_borrower_categories();
        $this
            ->add('fname', 'text', [
                'label' => 'First name',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'fname.required' => 'The first name  field is mandatory.'
                ]
            ])
            ->add('lname', 'text', [
                'label' => 'Last name',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'lname.required' => 'The last name  field is mandatory.'
                ]
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'email.required' => 'Please fill out your email address.'
                ]
            ])
            ->add('address1', 'text', [
                'label' => 'Street Address 1',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'address1.required' => 'The last name  field is mandatory.'
                ]
            ])
            ->add('address2', 'text', [
                'label' => 'Street Address 2',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'address2.required' => 'The last name  field is mandatory.'
                ]
            ])
            ->add('city', 'text', [
                'label' => 'City',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'city.required' => 'The last name  field is mandatory.'
                ]
            ])
            ->add('postal_code', 'text', [
                'label' => 'Postal code',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'postal_code.required' => 'The last name  field is mandatory.'
                ]
            ])
	    ->add('telephone_no', 'number', [
		 'attr' => ['class' => 'form-control field-input'],
		 'label' => 'Telephone number',
                 'rules' => 'min:5',
                 'error_messages' => [
                    'telephone_no.required' => 'Please enter a proper telephone number.'
                 ]
	    ])
	    ->add('borrower_cat', 'select', [
	        'choices' => $borrower_categories,
		'attr' => ['onchange' => 'admSelectCheck(this);'],
	        'selected' => 'value3',
	        'empty_value' => 'Please select the appropriate borrowing category',
                'label' => 'Borrower Category',
                'rules' => 'required',
                'error_messages' => [
                   'borrower_cat.required' => 'The last name  field is mandatory.'
                ]
	    ])
	    ->add('spouse_name', 'text', [
		 'attr' => ['class' => 'form-control field-input no-display'],
		 'label' => 'If applying for faculty spouse borrowing card, please enter the name of your spouse',
                 'rules' => 'min:5',
                 'error_messages' => [
                    'telephone_no.required' => 'Please enter a proper telephone number.'
                 ]
	   ]);
    }
    public function get_borrower_categories() {
        return array(
	    "value2" => "Faculty member or graduate student at a Canadian University",
	    "value3" =>   "McGill alumnus or alumna",
	    "value4" =>   "McGill Community for Lifelong Learning student",
	    "value5" =>   "McGill staff spouse",
	    "value6" =>   "McGill PhD extension",
	    "value7" =>   "Member of the public ($100 for 6 months)",
	    "value8" =>   "Montreal School of Theology faculty member or graduate student",
	    "value9" =>   "Osler/RareBooks reader - consultation only card",
	    "value10" =>   "Undergraduate student at a Quebec University",
	    "value11" =>   "Visiting scholar (with letter of invitation)",
	);
    }
}
