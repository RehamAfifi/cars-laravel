@if(session()->has('success'))
<div class="alert alert-success text-center ">
  {{session()->get('success')}}
</div>
@endif
<form action="{{route('contact.sendMail')}}" method="post" >
    @csrf
    <div class="form-group row">
      <div class="col-md-6 mb-4 mb-lg-0">
        <input type="text" class="form-control"  name="firstName" value="{{old('firstName')}}" placeholder="First Name">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control"  value="{{old('lastName')}}" name="lastName" placeholder="Last Name">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12">
        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email address">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-12"> 
        <textarea  id="" class="form-control"  name="message" placeholder="Write your message." cols="30" rows="10">{{old('message')}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6 mr-auto">
        <input type="submit" name="submitbtn" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
      </div>
    </div>
  </form>
