@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="jumbotron">
	  		<h1>Thanks For Shopping With Us</h1>
	  		<p>A confirmation email was sent.</p>
	  		<p><a class="btn btn-primary btn-large" href="{{ route('index') }}">Back To Home »</a> <a class="btn btn-outline-primary btn-large" href="{{ route('products.index') }}">Continue Shopping »</a></p>
		</div>
	</div>
@endsection