<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Forms\BorrowerForm;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Http\Requests\Borrower;
use Illuminate\Foundation\Validation\ValidatesRequests;


class BorrowerController extends BaseController {
    use FormBuilderTrait;
    use ValidatesRequests;

    public function create()
    {
	$form = $this->form(BorrowerForm::class, [
		            'method' => 'POST',
		            'route' => 'borrower.store'
        ]);
        return view('borrower.create', compact('form'));

    }

    public function store(Borrower $request)
    {
       $form = $this->form(BorrowerForm::class);
       $validated = $request->validated();


        $request = $form->getFieldValues();
	$borrower = new \App\Oclc\Borrower($validated);

	// Create the record
	$borrower->create();

	// Get the OCLC configurations
	//$borrower->connect();
	

        return redirect()->route('home')->with(['success' => 'Congratulations, your request has been received!']);

    }
}
