@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

@section('content')
<div class="table-full-width table-responsive">
    <h3>
        Price List
    </h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Class</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($classes as $class)
      <tr>
      <td>{{ $class->class_name}}</td>
      <td>{{$class->price}}</td>
      <td>
      
        <form class="btn-group" action="{{url('update/price/'.$class->id)}}" method="post">
            @csrf
            @method('get')
            <button type="submit" class="btn btn-success btn-xs">Edit</button>
        </form>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
@endsection


