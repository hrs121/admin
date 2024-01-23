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
                <th scope="col">Title</th>
                <th scope="col">Live link</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projects as $key => $data)

        @if($data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->title}}</td>
                        <td>{{$data->livelink}}</td>
                        <td>{{$data->description}}</td>
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
				<li><a href="#">project</a></li>
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

                @if(Session::has('msg'))
                    <p class="alert alert-success mt-3">{{Session::get('msg')}}</p>
                @endif

                <div class="col-md-12">
                    <h2 class="mt-5">Create Projects</h2>
                    <p>Please fill this form and submit to add record to the database.</p>

                    <form action="{{url('/create-project')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <!-- New section for email -->
                        <div class="form-group" id="emailSection">
                            <label>Live Link</label>
                            <div class="input-group mb-3">
                                <input type="text" name="livelink" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group mb-3">
                            <textarea id="description" name="description" rows="4" cols="50"></textarea>
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