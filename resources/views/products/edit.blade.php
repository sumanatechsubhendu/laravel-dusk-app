@extends('layouts.app')

@section('content')
<div>
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $product->name }}" required>
        
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ $product->price }}" required>
        
        <label for="description">Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
        
        <button type="submit">Update</button>
    </form>
</div>
@endsection
