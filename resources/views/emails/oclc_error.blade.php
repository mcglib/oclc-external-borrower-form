<!DOCTYPE html>
<html>
<head>
 <title>Borrower information </title>
</head>
<body>
Hi,
<p> An error has occured when a user submitted the following form on {{$url}} @ {{ $timestamp }}</p>

<h3>Error details</h3>
<dl class="row">
  <dt class="col-sm-3">Date occured</dt>
  <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

  <dt class="col-sm-3">Euismod</dt>
  <dd class="col-sm-9">
    <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</p>
    <p>Donec id elit non mi porta gravida at eget metus.</p>
  </dd>

  <dt class="col-sm-3">Malesuada porta</dt>
  <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

  <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
  <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>

  <dt class="col-sm-3">Nesting</dt>
  <dd class="col-sm-9">
    <dl class="row">
      <dt class="col-sm-4">Nested definition list</dt>
      <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
    </dl>
  </dd>
</dl>


<h3>Submission details</h3>
<hr />
<table class="table">
    <tr>
	<td>First name:</td>
	<td><strong>{{$borrower->fname}}</strong></td>
    </tr>
    <tr>
	<td>Last name:</td>
	<td><strong>{{$borrower->lname}}</strong></td>
    </tr>
    <tr>
	<td>Email address:</td>
	<td><strong>{{$borrower->email}}</strong></td>
    </tr>
    @if (isset($borrower->telephone_no))
    <tr>
	<td>Telephone:</td>
	<td><strong>{{$borrower->telephone_no}}</strong></td>
    </tr>
    @endif
    <tr>
	<td>Requested Borrowing Category:</td>
	<td><strong>{{$borrower->getBorrowerCategoryName($borrower->borrower_cat)}}</strong></td>
    </tr>
    @if (isset($borrower->spouse_name))
	    <tr>
		<td>Spouse's name:</td>
		<td><strong>{{$borrower->spouse_name}}</strong></td>
	    </tr>
    @endif
    @if (isset($borrower->home_institution))
	    <tr>
		<td>Home institution name:</td>
		<td><strong>{{$borrower->home_institution}}</strong></td>
	    </tr>
    @endif
    @if (isset($borrower->postal_code))
    <tr>
	<td>Address:</td>
	<td><strong>
		<address>
		{{$borrower->address1}}
		{{$borrower->address2}}<br />
		{{$borrower->city}}<br />
		{{$borrower->postal_code}}<br/>
		</address>
	    </strong>
	</td>
    </tr>
    <tr>
	<td>Telephone no:</td>
	<td>{{$borrower->telephone_no}}</td>
    </tr>
    @endif
</table>
