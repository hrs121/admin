@extends('admin.admin_master')

@section('section_content')

<div id="content" class="span10">
    @if(Session::has('msg'))
        <p class="alert alert-success mt-3">{{Session::get('msg')}}</p>
    @endif
    <table class="table ">
        <thead>
            <tr>
                <th scope="col-5">#</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Bio</th>
            </tr>
        </thead>
        <tbody>
        @foreach($showInfo as $key => $data)
        @if($data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->designation}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->bio}}</td>
                        <td>
                            <a href="{{ url('/edit') }}" class="btn btn-success">Edit</a>
                            <a href="{{ url('/delete') }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
          @else
                    <tr>
                        <td colspan="4">No data available</td>
                    </tr>

                    @endif

@endforeach
        </tbody>
    </table>

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

                    <form action="{{url('/personal-info')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>

                        <!-- New section for email -->
                        <div class="form-group" id="emailSection">
                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <div class="input-group mb-3">
                                <input type="number" name="phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <div class="input-group mb-3">
                                <input type="text" name="location" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Bio</label>
                            <div class="input-group mb-3">
                                <textarea id="bio" name="bio" rows="4" cols="50"></textarea>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group mb-3">
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
