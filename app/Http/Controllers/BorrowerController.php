<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use App\Forms\BorrowerForm;
use App\Mail\AccountCreated;
use App\Mail\LibraryEmail;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\Http\Requests\Borrower;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Yaml;
use Mail;


class BorrowerController extends BaseController {
    use FormBuilderTrait;
    use ValidatesRequests;
    private $form_session = 'register_form';

    public function createStep1(Request $request)
    {
	$borrower_categories = $this->get_borrower_categories();
        $home_institutions = $this->get_home_institutions();
	$borrower = $request->session()->get('borrower');

	// clear session data
	$request->session()->forget('borrower');
	
	$form = $this->form(BorrowerForm::class, [
		            'method' => 'POST',
		            'route' => 'borrower.create_step_2'
        ]);
	return view('borrower.create-step1')
		->with(compact('borrower_categories', $borrower_categories))
		->with(compact('home_institutions', $home_institutions))
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
        $home_institutions = $this->get_home_institutions();
        return view('borrower.create-step2')
          ->with(compact('borrower', $borrower))
          ->with(compact('home_institutions', $home_institutions))
        ;
    }
    public function success(Request $request)
    {
        $borrower = $request->session()->get('borrower');
	// clear session data
        $request->session()->flush();
        return view('borrower.success')
          ->with(compact('borrower', $borrower))
	  ;
    }
    public function error(Request $request)
    {
        $borrower = $request->session()->get('borrower');
	// clear session data
        $request->session()->flush();
        return view('borrower.error')
          ->with(compact('borrower', $borrower))
	  ;
    }



    public function store(Request $request)
    {

       $borrower = $request->session()->get('borrower');
       $library_email = "mutugi.gathuri@mcgill.ca";
       // Create the record
       if ($borrower->create()){
	
	// Send the email with the data
	Mail::to($borrower->email)->send(new AccountCreated($borrower));

        // Send an email to the desk
	Mail::to($library_email)->send(new LibraryEmail($borrower));
	
	// clear session data
        //$request->session()->flush();
        return redirect()->route('success')
	        ->with(['success' => 'Congratulations, your request has been received!']);

       }else {
	 // Error
	 $borrower->error_msg();
         return redirect()->route('create-step-1')
	        ->with(['error' => 'An Error has occured creating a record for you. Please email the following']);
       }
       
       // clear session data
       $request->session()->flush();




    }
    public function get_borrower_categories() {
      $borrowers = Yaml::parse(
		    file_get_contents(base_path().'/borrowing_categories.yml'));
      $keys = array_column($borrowers['categories'], 'label', 'key');
      return $keys;
    }

    public function get_home_institutions() {
      $borrowers = Yaml::parse(
		    file_get_contents(base_path().'/home_institutions.yml'));
      $keys = $borrowers['institutions'];
      return $keys;
    }

}
