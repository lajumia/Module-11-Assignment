@extends('layouts.app')

@section('content')
    <h1>Product List</h1>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - Quantity: {{ $product->quantity }} - Price: ${{ $product->price }}</li>
        @endforeach
    </ul>
@endsection
