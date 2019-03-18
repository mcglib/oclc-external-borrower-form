@extends('layouts.mainlayout')

@section('content')
 <div class="col-md-8 offset-md-2">
	    <div class="card card-outline-secondary">
		<div class="card-header">
		    <h3 class="mb-0">Library Application form</h3>
		</div>
		<div class="card-body">
		     @if (count($errors) > 0)
			     <div class="alert alert-danger">
				 <ul>
				 @foreach ($errors->all() as $error)
				  <li>{{ $error }}</li>
				 @endforeach
				 </ul>
			     </div>
			     @endif
		   <h1>Add New Product - Step 1</h1>
		   <hr>
		   <form action="/create-step1" method="post">
		    {{ csrf_field() }}
			    <div class="form-group">
				    <label for="fname" class="control-label required">First name</label>
				    <input class="form-control" value="{{ $borrower->givenName ?? ''}}"  required="required" minlength="5" name="fname" type="text" id="fname" style="">
        		    </div>
    
			    <div class="form-group">
    
			       <label for="lname" class="control-label required">Last name</label>
	    		       <input class="form-control" value="{{ $borrower->familyName ?? ''}}" required="required" minlength="5" name="lname" type="text" id="lname">
        		    </div>
    
			    <div class="form-group">
    
				    <label for="email" class="control-label required">Email Address</label>
				    <input class="form-control" required="required" minlength="5" name="email" type="email" id="email">
        		    </div>
    
			    <div class="form-group">
				    <label for="telephone_no" class="control-label">Telephone</label>
				    <input class="form-control field-input" min="5" name="telephone_no" type="number" id="telephone_no">
        		    </div>
    
			    <div class="form-group">
    
				    <label for="borrower_cat" class="control-label required">Requested Borrowing Category</label>
				    <select></select>
        		    </div>
    
			    <div id="spouseDivCheck" class="no-display">
				<div class="form-group">
    
				    <label for="spouse_name" class="control-label">If applying for faculty spouse borrowing card, please enter the name of your spouse</label>
				    <input class="form-control field-input no-display" name="spouse_name" type="text" id="spouse_name">
        		        </div>
			    </div>
			    <div id="homeInstDivCheck">
				<div class="form-group">
				    <label for="home_institution" class="control-label">Please enter the name of your home institution</label>
				    <input class="form-control field-input no-display" name="home_institution" type="text" id="home_institution">
        		        </div>
    
			    </div>
			    <div id="addressDivCheck">
				   <fieldset class="form-group" id="borrower_address">
				    <legend>Borrower Address</legend>
				    <div class="form-group">
					    <label for="address1" class="control-label">Street Address 1</label>
					    <input class="form-control" name="address1" type="text" id="address1">
				    </div>
				   <div class="form-group">
					<label for="address2" class="control-label">Street Address 2</label>
					<input class="form-control" name="address2" type="text" id="address2">
	    
				   </div>

				    <div class="form-group">
					<label for="city" class="control-label">City</label>
					<input class="form-control" name="city" type="text" id="city">
				    </div>
				    <div class="form-group">
					<label for="postal_code" class="control-label">Postal Code</label>
					<input class="form-control" name="postal_code" type="text" id="postal_code">
				    </div>
				    </fieldset>
			    </div>
			    <div class="form-group row">
				<label class="col-lg-3 col-form-label form-control-label"></label>
				<div class="col-lg-9">
					<input class="btn btn-primary" type="submit" value="Next">
					<button class="btn btn-secondary" type="button">Cancel</button>
				</div>
			    </div>
    	    	    </form>
		</div>
	    </div>
	    <!-- /form user info -->
@endsection

