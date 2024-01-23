@extends('admin.admin_master')

@section('section_content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">form</a></li>
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
                    <h2 class="mt-5">update Record</h2>
                    <p>Please fill this form and submit to add record to the database.</p>

                    <form action="{{url('/update/.$editData->title')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $editData->title }}">
                        </div>

                        <!-- New section for email -->
                        <div class="form-group" id="emailSection">
                            <label>Sub-Title</label>
                            <div class="input-group mb-3">
                                <input type="text" name="subtitle" class="form-control" value="{{ $editData->subtitle }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group mb-3">
                            <textarea id="description" name="description" rows="4" cols="50" >{{ $editData->description }}</textarea>
                            <span class="invalid-feedback"></span>
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