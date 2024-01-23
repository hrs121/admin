@extends('admin.admin_master')

@section('section_content')
    @if(Session::has('msg'))
                <p class="alert alert-success mt-3">{{Session::get('msg')}}</p>
                @endif
    <table class="table ">
  <thead>
    <tr>
      <th scope="col-5">#</th>
      <th scope="col">Title</th>
      <th scope="col">Subtitle</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach($showData as $key => $data)
  @if($data)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $data->title }}</td>
        <td>{{ $data->subtitle }}</td>
        <td>{{ $data->description }}</td>
        <td>
            <a href="{{ url('/edit/'.$data->title) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('/delete/'.$data->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4">No data available</td>
    </tr>
@endif

@endforeach


@endsection