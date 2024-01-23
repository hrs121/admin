@extends('admin.admin_master')

@section('section_content')

<div id="content" class="span10">

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Personal Information</a></li>
    </ul>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger m-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-12">
                    <h2 class="mt-5">Personal Information</h2>
                    <p>Please fill this form and submit to add record to the database.</p>

                    <form action="{{url('/updatePerson/'.$editPerson->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $editPerson->name }}">
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" value="{{ $editPerson->designation }}">
                        </div>

                        <!-- New section for email -->
                        <div class="form-group" id="emailSection">
                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" value="{{ $editPerson->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group mb-3">
                                <input type="number" name="phone" class="form-control" value="{{ $editPerson->phone }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Bio</label>
                            <div class="input-group mb-3">
                                <textarea id="bio" name="bio" rows="4" cols="50">{{ $editPerson->bio }}</textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group mb-3">
                            @if($editPerson->image)
                                    <!-- Display the current image -->
                                    <img src="data:image/jpeg;base64,{{ $editPerson->image }}" class="img-thumbnail" alt="Current Image">
                                @endif
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/span-->

@endsection
