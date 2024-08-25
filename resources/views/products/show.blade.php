@extends('layouts.app')

@section('content')
<div>
    <h2>Product Details</h2>
    <p>Name: {{ $product->name }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <a href="{{ route('products.index') }}">Back to List</a>
</div>
@endsection
