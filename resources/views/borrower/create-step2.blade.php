@extends('layouts.mainlayout')

@section('content')
    <h1>Library Application Form - Review</h1>
    <hr>
    <h3>Review Your Details</h3>
    <form action="/borrower/store" method="post" >
        {{ csrf_field() }}
        <table class="table">
            <tr>
                <td>Product Name:</td>
                <td><strong>{{$product->name}}</strong></td>
            </tr>
            <tr>
                <td>Product Amount:</td>
                <td><strong>{{$product->amount}}</strong></td>
            </tr>
            <tr>
                <td>Product Company:</td>
                <td><strong>{{$product->company}}</strong></td>
            </tr>
            <tr>
                <td>Product Available:</td>
                <td><strong>{{$product->available ? 'Yes' : 'No'}}</strong></td>
            </tr>
            <tr>
                <td>Product Description:</td>
                <td><strong>{{$product->description}}</strong></td>
            </tr>
            <tr>
                <td>Product Image:</td>
            </tr>
        </table>
        <a type="button" href="/borrower/create-step1" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
@endsection
