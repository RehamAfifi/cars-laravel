<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get();
        return view('admin.categories.categoriesList',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->submitbtn =="add"){
            $messages=['categoryName.required'=>'required',

        ];
            $data=$request->validate([
                'categoryName'=>'required|max:30'],$messages);
                Category::create($data);
                return redirect('admin/categories/')->with('success','category is added successfully');
    }
    else{
        return redirect()->back()->with('cancel',' add category operation is canceled');
    }
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
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
       return view('admin.categories.editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->submitbtn =="update"){
            $data=$request->validate([
                'categoryName'=>'required',
               ],);
               Category::where('id',$id)->update($data);
               return redirect('admin/categories')->with('success','category name is updated successfully');
    }
    else {
        return redirect()->back()->with('cancel','update is canceled');
    }
}

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $cars = Car::where('category_id', $id)->get()->toArray();

        if(count($cars)<=0){


            Category::where('id',$id)->delete();
            return redirect('admin/categories')->with('success','category is deleted successfully');
    } else{
        return redirect()->back()->with('cancel','delete is not available');




}
    }}
