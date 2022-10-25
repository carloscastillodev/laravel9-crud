<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => ['required'],
            'description'       => ['required'],
            'quantity_per_unit' => ['required'],
            'unit_price'        => ['required'],
            'units_in_stock'    => ['required']
        ]);
        
        $product = new Product([
            'name'              => $request->name,
            'description'       => $request->description,
            'quantity_per_unit' => $request->quantity_per_unit,
            'unit_price'        => $request->unit_price,
            'units_in_stock'    => $request->units_in_stock
        ]);

        $product->save();
        
        return back()->with('created', 'true');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Model binding
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => ['required'],
            'description'       => ['required'],
            'quantity_per_unit' => ['required'],
            'unit_price'        => ['required'],
            'units_in_stock'    => ['required']
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->quantity_per_unit = $request->get('quantity_per_unit');
        $product->unit_price = $request->get('unit_price');
        $product->units_in_stock = $request->get('units_in_stock');
        $product->save();
        return redirect('/product')->with('updated', 'true');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('deleted', 'true');
    }
}
