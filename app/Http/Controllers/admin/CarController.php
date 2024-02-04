<?php

namespace App\Http\Controllers\admin;
use App\Traits\Common;
use App\Models\Category;
use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::get();
        return view('admin.cars.carsList',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::select('id','categoryName')->get();

        return view('admin.cars.addCar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->submitbtn =="add")
        {
            $messages=['carTitle.required'=>'required',
            'content.required'=>'should be text',
        ];
        $data=$request->validate(
            ['category_id'=>'exists:categories,id',
            'carTitle'=>'required|string',
            'content'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg',
            'price'=>'required',
            'passengers'=>'required',
            'doors'=>'required',
            'luggages'=>'required',
        ],$messages);
        $data['active'] = isset($request['active']);
        $fileName=$this->uploadFile($request->image,'assets/images/cars');
       $data['image'] =$fileName;
       Car::create($data);
       return redirect('admin/cars/')->with('success','car is added successfully');
    }
    else{
        return redirect()->back()->with('cancel','cancel request');
    }
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car=Car::findOrFail($id);
        return view('showCar',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car=Car::findOrFail($id);
        $categories=Category::select('id','categoryName')->get();
       // $categories=Category::findOrFail([1,2],['id','categoryName']);
       return view('admin.cars.editCar',compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->submitbtn =="update"){
        $messages=['carTitle.required'=>'required',
        'content.required'=>'should be text',
        ];
         $data=$request->validate([
         'category_id'=>'exists:categories,id',
         'carTitle'=>'required|string',
         'content'=>'required|string',
         'image'=>'nullable|mimes:png,jpg,jpeg',
         'price'=>'required',
         'passengers'=>'required',
         'doors'=>'required',
         'luggages'=>'required',
        ],$messages);
        $data['active'] = isset($request['active']);

        //upload photo
        if(isset($request->image)){
          $data['image']=$request['image'];
          $fileName= $this->uploadFile($request->image,'assets/images/cars');
          $data['image'] =$fileName;
        }
        //delete old photo if exists

 $oldFileName=Car::findOrFail($id)->image;
$path='assets/images/cars/';
$this->deleteFile($oldFileName,$path);
//update car
  Car::where('id',$id)->update($data);
        return redirect('admin/cars')->with('success','car is updated successfully');}

        else{
            return redirect()->back()->with('cancel','update is canceled');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                // //delete old photo if exists
                $oldFileName=Car::findOrFail($id)->image;
                $path='assets/images/cars/';
                $this->deleteFile($oldFileName,$path);
                Car::where('id',$id)->delete();


       return redirect()->back()->with('success','car is deleted successfully');
    }
}
