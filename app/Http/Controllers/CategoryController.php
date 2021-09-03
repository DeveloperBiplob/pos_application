<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view()->exists('category.index') ? view('category.index', compact('categories')) : abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view()->exists('category.create') ? view('category.create') : abort(404); 
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
            'title' => 'required'
        ]);

        $data = [
            'title' => $request->title
        ];

        $result = Category::create($data);

        if($result){
            $this->setNotification('Data Save Successfully!', 'success');
            return redirect()->route('category.index');
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
    public function show(Category $category)
    {
        return view()->exists('category.show') ? view('category.show', compact('category')) : abort(404); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view()->exists('category.edit') ? view('category.edit', compact('category')) : abort(404); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = [
            'title' => $request->title
        ];

        $result = $category->update($data);
        if($result){
            $this->setNotification('Data Update Successfully!', 'success');
            return redirect()->route('category.index');
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
    public function destroy(Category $category)
    {
        $result = $category->delete($category);
        if($result){
            $this->setNotification('Data Delete Successfully!', 'success');
            return redirect()->route('category.index');
        }else{
            return back();
        }
    }
}
