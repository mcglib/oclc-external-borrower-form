@extends('layouts.mainlayout')

@section('content')
    <h1>Library Application Form - Review</h1>
    <hr>
    <h3>Review Your Details</h3>
    <form action="/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>First name:</td>
                <td><strong>{{$borrower->familyName}}</strong></td>
            </tr>
            <tr>
                <td>Last name:</td>
                <td><strong>{{$borrower->givenName}}</strong></td>
            </tr>
            <tr>
                <td>Email address:</td>
                <td><strong>{{$borrower->email}}</strong></td>
            </tr>
	    @if (isset($borrower->data['telephone_no']))
            <tr>
                <td>Telephone:</td>
		<td><strong>{{$borrower->data['telephone_no']}}</strong></td>
	    </tr>
	    @endif
            <tr>
                <td>Requested Borrowing Category:</td>
                <td><strong>{{$borrower->getBorrowerCategoryName($borrower->data['borrower_cat'])}}</strong></td>
	    </tr>
	    @if ($borrower->data['borrower_cat'] == 'value5')
		    <tr>
			<td>Spouse's name:</td>
			<td><strong>{{$borrower->data['spouse_name']}}</strong></td>
		    </tr>
	    @endif
	    @if ($borrower->data['borrower_cat'] == 'value7')
		    <tr>
			<td>Home institution name:</td>
			<td><strong>{{$borrower->data['home_institution']}}</strong></td>
		    </tr>
	    @endif
        </table>
        <a type="button" href="/create-step1" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Submit data</button>
    </form>
@endsection
