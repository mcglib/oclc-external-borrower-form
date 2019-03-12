@extends('layouts.mainlayout')

@section('content')
 <div class="col-md-8 offset-md-2">
	    <div class="card card-outline-secondary">
		<div class="card-header">
		    <h3 class="mb-0">External Borrower's form</h3>
		</div>
		<div class="card-body">
		    <div class="">
		     </div>
    	 	    {!! form_start($form) !!}
    	    	    {!! form_row($form->fname) !!}
    	    	    {!! form_row($form->lname) !!}
    	    	    {!! form_row($form->email) !!}
    	    	    {!! form_row($form->address1) !!}
    	    	    {!! form_row($form->address2) !!}
    	    	    {!! form_row($form->city) !!}
    	    	    {!! form_row($form->postal_code) !!}
    	    	    {!! form_row($form->telephone_no) !!}
    	    	    {!! form_row($form->borrower_cat) !!}
		    <div id="admDivCheck" class="no-display">
    	    	    	{!! form_row($form->spouse_name) !!}
		     </div>
		    <div class="form-group row">
		    	<label class="col-lg-3 col-form-label form-control-label"></label>
		    	<div class="col-lg-9">
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
				{!! Form::button('Cancel', ['class' => 'btn btn-secondary']) !!}
		    	</div>
		    </div>
    	    	    {!! form_end($form) !!}
		</div>
	    </div>
	    <!-- /form user info -->
@endsection

