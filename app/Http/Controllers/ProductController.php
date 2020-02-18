<?php

namespace App\Http\Controllers;

use App\Product;
use App\SingleProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct() { $this->middleware('auth'); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.products.index')
            ->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() { return view('pages.products.create'); }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'warning_quantity' => 'required',
            'expired_at' => 'required'
        ]);

        if (!Product::all()->where('name', $validatedData['name'])->where('type', $validatedData['type'])->first()) {
            $product = new Product(array(
                'name' => $validatedData['name'],
                'type' => $validatedData['type'],
                'price' => $validatedData['price'],
                'warning_quantity' => $validatedData['warning_quantity']
            ));
            $product->save();

            $singleProduct = new singleProduct(array(
                'product_id' => $product->id,
                'slug' => uniqid(),
                'quantity' => $validatedData['quantity'],
                'expired_at' => ($validatedData['expired_at'] == null ? null : $validatedData['expired_at'])
            ));
            $singleProduct->save();

            return redirect('/products')->with('success', 'Product Added Successfully!');
        }

        return redirect('/products')->with('error', 'Product Is Already In Database!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('pages.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Request $request) {
        $singleProduct = SingleProduct::find($request->input('single_id'));
        $singleProduct->delete();
        return $request;
    }

    public function createSingle($id) {
        return view('pages.products.create_single')->with('product', Product::find($id));
    }

    public function storeSingle(Request $request, $id) {
        $validatedData = $request->validate([
            'quantity' => 'required',
            'expired_at' => 'required'
        ]);

        $singleProduct = new singleProduct(array(
            'product_id' => $id,
            'slug' => uniqid(),
            'quantity' => $validatedData['quantity'],
            'expired_at' => ($validatedData['expired_at'] == null ? null : $validatedData['expired_at'])
        ));
        $singleProduct->save();

        return redirect('/products/'.$id)->with('success', 'Product Added Successfully!');
    }
}
