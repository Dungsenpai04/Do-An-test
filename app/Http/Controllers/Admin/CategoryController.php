<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::OrderBy('created_at', 'DESC')->get();
        return view('admin.modules.category.index', [
            'categories' => $categories 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories= Category::select('id','name','parent_id')->get();
        return view('admin.modules.category.create',[
            'categories'=>$categories   
        ]);   

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $category = new Category();
 
        $category->name = $request->name;
        $category->status = $request->status;
 
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'create category fully');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $category = Category::find($id);

        $categories= Category::select('id','name','parent_id')->get();

        return view('admin.modules.category.edit', [
            'id' =>$id,
            'category'=>$category,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $category = Category::find($id);

        if ($category == null) {
            abort(404);
        }
 
        $category->name = $request->name;
        $category->status = $request->status;
 
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'update category fully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         
        $category = Category::find($id);
        if ($category == null) {
            abort(404);
        }
        
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Delete category');
    }
}