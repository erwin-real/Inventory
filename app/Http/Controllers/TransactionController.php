<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct() { $this->middleware('auth'); }

    public function index() {
        return view('pages.transactions.index')->with('transactions', Transaction::all());
    }

    public function create() {
        return view('pages.transactions.create')->with('products', Product::all());
    }

    public function store(Request $request) {
        //
    }

    public function show(Transaction $transaction) {
        //
    }

    public function edit(Transaction $transaction) {
        //
    }

    public function update(Request $request, Transaction $transaction) {
        //
    }

    public function destroy(Transaction $transaction) {
        //
    }
}
