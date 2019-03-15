<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Forms\BorrowerForm;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Http\Requests\Borrower;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


class BorrowerController extends BaseController {
    use FormBuilderTrait;
    use ValidatesRequests;

    public function createStep1(Request $request)
    {
        $borrower = $request->session()->get('borrower');
	$form = $this->form(BorrowerForm::class, [
		            'method' => 'POST',
		            'route' => 'borrower.store'
        ]);
        return view('borrower.create-step1', compact('form', $borrower));

    }

     /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Borrower $request)
    {
        $validatedData = $request->validated();
        if(empty($request->session()->get('borrower'))){
	    $borrower = new \App\Oclc\Borrower($validatedData);
            $request->session()->put('borrower', $borrower);
        }else{
            $borrower = $request->session()->get('borrower');
            $request->session()->put('borrower', $borrower);
        }
        return redirect('/create-step2');
    }

    /**
     * Show the step 2 Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep2(Request $request)
    {
        $borrower = $request->session()->get('borrower');
        return view('borrower.create-step2',compact('borrower', $borrower));
    }

    public function store(Borrower $request)
    {
       $validated = $request->validated();
       $borrower = new \App\Oclc\Borrower($validated);

       dd($validated);

       // Create the record
       $borrower->create();

       return redirect()->route('/')
	       ->with(['success' => 'Congratulations, your request has been received!']);

    }
}
