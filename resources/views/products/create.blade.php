@extends('layouts.app')

@section('content')
<div>
    <h2>Create Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="price">Price:</label>
        <input type="text" name="price" required>
        
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        
        <button type="submit">Save</button>
    </form>
</div>
@endsection
