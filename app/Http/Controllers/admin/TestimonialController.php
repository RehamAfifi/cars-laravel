<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Common;


class TestimonialController extends Controller
{
    use common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial:: get(); 
        return view('admin.testimonials.testimonialsList', compact ('testimonials')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->submitbtn =="add"){
            $messages=['name.required'=>' name is required ',
            'position.required'=>' position is required ',
            'content.required'=>' content is required ',
           
        ];
        $data = $request->validate([
            'name'=>'required|string|min:5',
            'position'=>'required|string|max:70|min:5',
            'content'=>'required|string|max:200|min:20',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        ],$messages);
        $data['published'] = isset($request['published']);
          $fileName = $this->uploadFile( $request->image,'assets/images/testimonials');
           $data['image']=$fileName;
   
             Testimonial::create($data);
             
        return redirect('admin/testimonials')->with('success','testimonial is added sccessfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial=Testimonial::findOrFail($id);
        return view('admin.testimonials.editTestimonials',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->submitbtn =="update"){
            $messages=['name.required'=>' name is required',
            'position.required'=>' position is required ',
            'content.required'=>' content is required ',
           
        ];
            $data = $request->validate([
                'name'=>'required|string|min:5',
                'position'=>'required|string|max:70|min:5',
                'content'=>'required|string|max:200|min:5',
                'image'=>'nullable|mimes:png,jpg,jpeg|max:2048',
            ],$messages);
            $data['published'] = isset($request['published']);
            if ($request ->hasFile('image')){
                $data['image']=$request['image'];
               $fileName = $this->uploadFile( $request->image,'assets/images/testimonials');
               $data['image']=$fileName;}

                 //delete old photo if exists
                  $oldFileName=Testimonial::findOrFail($id)->image;
                  $path='assets/images/testimonials/';
                  $this->deleteFile($oldFileName,$path);

                    Testimonial::where('id',$id)->update($data);
            return redirect('admin/testimonials')->with('success','testimonial is updated successfully');
        }
        else{
            return redirect()->back()->with('cancel','cancel request');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                        // //delete old photo if exists
                        $oldFileName=Testimonial::findOrFail($id)->image;
                        $path='assets/images/testimonials/';
                        $this->deleteFile($oldFileName,$path);
                        Testimonial::where('id',$id)->delete();
                        
        
               return redirect()->back()->with('success','Testimonial is deleted successfully');
    }
}