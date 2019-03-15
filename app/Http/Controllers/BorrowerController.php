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

    public function createStep1()
    {
	$form = $this->form(BorrowerForm::class, [
		            'method' => 'POST',
		            'route' => 'borrower.store'
        ]);
        return view('borrower.create', compact('form'));

    }

     /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Borrower $request)
    {
        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }else{
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
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
        $product = $request->session()->get('product');
        return view('products.create-step2',compact('product', $product));
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
