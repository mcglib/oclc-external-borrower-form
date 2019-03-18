<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Forms\BorrowerForm;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Http\Requests\Borrower;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Yaml;


class BorrowerController extends BaseController {
    use FormBuilderTrait;
    use ValidatesRequests;
    private $form_session = 'register_form';

    public function createStep1(Request $request)
    {
	$borrower_categories = $this->get_borrower_categories();
	$borrower = $request->session()->get('borrower');

	// clear session data
	$request->session()->forget('borrower');
	
	$form = $this->form(BorrowerForm::class, [
		            'method' => 'POST',
		            'route' => 'borrower.create_step_2'
        ]);
	return view('borrower.create-step1')
		->with(compact('borrower_categories', $borrower_categories))
		->with(compact('borrower', $borrower))
	;

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
	    
	    $borrower = new \App\Oclc\Borrower($validatedData);
            $request->session()->put('borrower', $borrower);
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

       // Create the record
       $borrower->create();

	// clear session data
	$request->session()->flush();

       return redirect()->route('/')
	       ->with(['success' => 'Congratulations, your request has been received!']);

    }
    public function get_borrower_categories() {
      $borrowers = Yaml::parse(
		    file_get_contents(base_path().'/borrowing_categories.yml'));
      $keys = array_column($borrowers['categories'], 'label', 'key');
      return $keys;
    }
}
