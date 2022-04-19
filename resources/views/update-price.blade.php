@extends('layouts.app', ['pageSlug' => 'dashboard', 'page' => 'Dashboard', 'section' => ''])
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

@section('content')
<form action="{{url('update/class/'.$class->id)}}" method="post">
    @csrf
    @method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Class Name</label>
    <input type="text" class="form-control" name="class_name" value={{$class->class_name}} required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" name="price" class="form-control" value={{$class->price}} required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection