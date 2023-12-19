@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="card">
        <h2>Today's Sales</h2>
        <p>Total Sales: ${{ $todaySales }}</p>
    </div>

    <div class="card">
        <h2>Yesterday's Sales</h2>
        <p>Total Sales: ${{ $yesterdaySales }}</p>
    </div>

    <div class="card">
        <h2>This Month's Sales</h2>
        <p>Total Sales: ${{ $thisMonthSales }}</p>
    </div>

    <div class="card">
        <h2>Last Month's Sales</h2>
        <p>Total Sales: ${{ $lastMonthSales }}</p>
    </div>
@endsection
