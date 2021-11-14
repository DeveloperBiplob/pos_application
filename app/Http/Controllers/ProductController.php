<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $products = Product::with('category')->get();
        return view()->exists('product.index') ? view('product.index', compact('products')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view()->exists('product.create') ? view('product.create', compact('categories')) : abort(404);
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
            'category_id' => 'required',
            'title' => 'required',
            'cost_price' => 'required',
            'price' => 'required',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'cost_price' => $request->cost_price,
            'price' => $request->price,
        ];

        $result = Product::create($data);

        if($result){
            $this->setNotification('Data Save Successfully!', 'success');
            return redirect()->route('product.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view()->exists('product.show') ? view('product.show', compact('product')) : abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view()->exists('product.edit') ? view('product.edit', compact(['product', 'categories'])) : abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'cost_price' => $request->cost_price,
            'price' => $request->price,
        ];

        $result = $product->update($data);
        if($result){
            $this->setNotification('Data Update Successfully!', 'success');
            return redirect()->route('product.index');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        if($result){
            $this->setNotification('Data Delete Successfully!', 'success');
            return redirect()->route('product.index');
        }else{
            return back();
        }
    }
}
