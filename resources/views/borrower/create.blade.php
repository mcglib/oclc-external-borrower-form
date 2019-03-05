@extends('layouts.mainlayout')

@section('content')
 <div class="col-md-8 offset-md-2">
	    <div class="card card-outline-secondary">
		<div class="card-header">
		    <h3 class="mb-0">Create an account</h3>
		</div>
		<div class="card-body">
		    {!! Form::open(['route' => 'borrower.store']) !!}
		    <!-- hidden field -->
			{{ Form::hidden('record_to_update','1') }}
			<div class="form-group">
			    {!! Form::label('first_name', 'First name',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
			    <div class="col-lg-9">
    			    	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
			    {!! Form::label('last_name', 'Last name',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
			    <div class="col-lg-9">
    			    	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
			    </div>
			</div>
			<div class="form-group">
			    {!! Form::label('email', 'Email',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
			    <div class="col-lg-9">
    			    	{!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
			    </div>
			</div>

			<div class="form-group"> <!-- Street 1 -->
				<label for="street1_id" class="control-label">Street Address 1</label>
				<input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
			</div>					
							
			<div class="form-group"> <!-- Street 2 -->
				<label for="street2_id" class="control-label">Street Address 2</label>
				<input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
			</div>	

			<div class="form-group"> <!-- City-->
				<label for="city_id" class="control-label">City</label>
				<input type="text" class="form-control" id="city_id" name="city" placeholder="Montreal">
			</div>						
			<div class="form-group"> <!-- Zip Code-->
				<label for="zip_id" class="control-label">Postal Code</label>
				<input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
			</div>		






			<div class="form-group row">
			    {!! Form::label('phone_no', 'Phone no',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
			    <div class="col-lg-9">
    			    	{!! Form::number('phone_no', null, ['class' => 'form-control']) !!}
			    </div>
			</div>

			<div class="form-group">
                            <span class="col-lg-1 col-lg-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
			    {!! Form::label('phone_no', 'Phone no',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
                            <div class="col-lg-9">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>



			<div class="form-group row">
			    {!! Form::label('borrower_category', 'Requested Borrowing Category',['class' => 'form-control-label col-lg-3 col-form-label']) !!}
			    <div class="col-lg-9">
				{!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}
			    </div>
			</div>
			<div class="form-group row">
			    <label class="col-lg-3 col-form-label form-control-label">If applying for faculty spouse borrowing card, please enter the name of your spouse</label>
			    <div class="col-lg-9">
				<input class="form-control" type="password" value="11111122333">
			    </div>
			</div>
			<div class="form-group row">
			    <label class="col-lg-3 col-form-label form-control-label"></label>
			    <div class="col-lg-9">
				{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
				{!! Form::button('Cancel', ['class' => 'btn btn-secondary']) !!}
			    </div>
			</div>
		</div>
	    </div>
	    <!-- /form user info -->
@endsection

