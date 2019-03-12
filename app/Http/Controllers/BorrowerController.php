<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Foundation\Validation\ValidatesRequests;


class BorrowerController extends BaseController {

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\BorrowerForm::class, [
            'method' => 'POST',
            'url' => route('borrower.store')
        ]);

        return view('borrower.create', compact('form'));
    }

    public function store(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\BorrowerForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Do saving and other things...a
 	// Or automatically redirect on error. This will throw an HttpResponseException with redirect
	//$form->redirectIfNotValid();

        $request = $form->getFieldValues();
	$borrower = new \App\Oclc\Borrower($request);
        $borrower->create();

	// Get the OCLC configurations
	//$borrower->connect();
	

        return redirect()->route('home')->with(['success' => 'Congratulations!']);

    }
}
