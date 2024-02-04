@extends('admin.layouts.dashboard')
@section('pageTitle','Edit Testimonials')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Testimonials</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Testimonial</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" id="demo-form2"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" value="{{$testimonial->name}}"
                                        required="required" class="form-control ">
                                </div>
                            </div>
                            @error('name')
                            <div class="alert alert-danger col-6 mx-auto">{{$message}}</div>
                            @enderror
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Position <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="position" name="position" value="{{$testimonial->position}}"
                                        required="required" class="form-control ">
                                </div>
                            </div>
                            @error('position')
                            <div class="alert alert-danger col-6 mx-auto">{{$message}}</div>
                            @enderror
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea id="content" name="content" required="required"
                                        class="form-control">{{$testimonial->content}}</textarea>
                                </div>
                            </div>
                            @error('content')
                            <div class="alert alert-danger col-6 mx-auto">{{$message}}</div>
                            @enderror


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="published" @checked($testimonial->published)
                                        class="flat">
                                    </label>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="image" class="form-control">
                                    <img src="{{asset('assets/images/testimonials/'. $testimonial->image)}}"
                                        alt="{{$testimonial->name}}" style="width: 300px;">
                                </div>
                            </div>
                            @error('image')
                            <div class="alert alert-danger col-6 mx-auto">{{$message}}</div>
                            @enderror
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="submit" name="submitbtn"
                                        value="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="submitbtn"
                                        value="update">Update</button>
                                </div>
                            </div>
                            <div class="col-12">
                                @if(session()->has('cancel'))
                                <div class="alert alert-warning">
                                    {{session()->get('cancel')}}
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- /page content -->