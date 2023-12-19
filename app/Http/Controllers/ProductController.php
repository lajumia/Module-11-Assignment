<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Transaction;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        // Update transaction history
        Transaction::create([
            'product_name' => $product->name,
            'quantity' => $product->quantity,
            'amount' => $product->quantity * $product->price,
        ]);

        return redirect('/products')->with('success', 'Product added successfully');
    }

    public function dashboard()
    {
        $todaySales = Transaction::whereDate('created_at', today())->sum('amount');
        $yesterdaySales = Transaction::whereDate('created_at', today()->subDay())->sum('amount');
        $thisMonthSales = Transaction::whereMonth('created_at', today()->month)->sum('amount');
        $lastMonthSales = Transaction::whereMonth('created_at', today()->subMonth())->sum('amount');

        return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    public function transactions()
    {
        $transactions = Transaction::all();

        return view('transactions', compact('transactions'));
    }
}
