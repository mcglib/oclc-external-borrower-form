@extends('layouts.mainlayout')

@section('content')
    <hr>
    <h3 class="mb-0">McGill Library Borrowing Card Application Form - Error</h3>
    <div class="container py-5">  
        <div class="alert alert-danger">  
            <strong>Error!</strong> A problem has occured while submitting your data. Please contact <a href="#" class="alert-link">occurred</a>.
        </div>  
    </div>  
    <div class="form-group row">
 	   	<label class="col-lg-3 col-form-label form-control-label"></label>
		<div class="col-lg-9">
			<a role="button" href="create-step1" class="btn btn-primary">Back to form</a>
		</div>
     </div>
     @include('layouts.partials.footer')
@endsection
