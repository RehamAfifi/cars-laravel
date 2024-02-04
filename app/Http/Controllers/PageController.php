<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
        $lastThreeTestimonials = Testimonial::latest()->take(3)->get();
        $cars = Car::latest()->get();
        return view('index',compact('cars','lastThreeTestimonials'));

    }
    public function allCars(){
        $cars=Car::paginate(6)->withpath('');
        return view('blog',compact('cars'));
    }
    public function allTest(){
        $testimonials=Testimonials::get();
        return view('testimonials',compact('testimonials'));
    }
    public function single($id){
        $car=Car::findOrFail($id);
        return view('single',compact('car'));
    }
    public function store_sendMail(request $request){
        $messages=['firstName.required'=>'required',
        'lastName.required'=>'required',
        'email.required'=>'required',
        'message.required'=>'required'];
         $data = $request->validate([
            'firstName'=>'required|max:10|string',
            'lastName'=>'required|max:10|string',
            'email'=>'required|string|email',
            'message'=>'required|string|max:200',
            ],$messages);
             Message::create($data);
//send notification
          Mail::to('reham@example.com')->send(new SendMail($data));

      return redirect()->back()->with('success','your message has been sent successfully');}

    
    public function  CarsListing_testimonials(){
        $lastThreeTestimonials = Testimonial::latest()->take(3)->get();
        $cars=Car::paginate(6)->withpath('');
        return view('listing',compact('cars','lastThreeTestimonials'));
    }
    
    public function  allTestimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('testimonials',compact('testimonials'));
    }
}
