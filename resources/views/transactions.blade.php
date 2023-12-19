@extends('layouts.app')

@section('content')
    <h1>Transaction History</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->product_name }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>${{ $transaction->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
