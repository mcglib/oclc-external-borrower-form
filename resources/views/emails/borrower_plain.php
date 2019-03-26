Email message sent to borrower:
---------
First name: {{$borrower->fname}}
Last name: {{$borrower->lname}}
Email address: {{$borrower->email}}
Barcode: {{$borrower->bar_code }}
Requested Borrowing Category: {{$borrower->getBorrowerCategoryName($borrower->borrower_cat)}}
@if (isset($borrower->spouse_name))
Spouse's name: {{$borrower->spouse_name}}
@endif
@if (isset($borrower->home_institution))
Home institution name: {{$borrower->home_institution}}
@endif
@if (isset($borrower->postal_code))
Address:
	{{$borrower->address1}}
	{{$borrower->address2}}
	{{$borrower->city}}
	{{$borrower->postal_code}}
Telephone: {{$borrower->telephone_no}}
@endif

