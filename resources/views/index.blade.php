@extends('template.template')

@section('title', 'Home')

@section('content')
<div class="container text-center mt-5">
  @if(Auth::check())
  <h3>Welcome, {{ Auth::user()->name }}!</h3>
  @else
  <h3>Welcome, guest!</h3>
  @endif
  @if($errors->any())
  <a href="{{ url('/') }}" style="text-decoration: none;"><div class="alert alert-danger">{{ $errors->all()[0] }} Click here to dismiss</div></a>
  @endif
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Price</th>
        <th scope="col">Product Stock</th>
        @if(Auth::user() != null)
        <th scope="col">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @if(count($items) != 0)
      @foreach($items as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $item->name }}</td>
        <td>Rp. {{ $item->price }}</td>
        <td>{{ $item->stock }}</td>
        @if(Auth::user() != null)
        <td>
          <a href="{{ url('/item/'.$item->id) }}" class="badge badge-secondary">Update</a>
          <a href="{{ url('/item/'.$item->id.'/delete') }}" class="badge badge-danger">Delete</a>
        </td>
        @endif
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
  @if(Auth::user() != null)
  <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#staticBackdrop">Insert new data</button>
  @endif
</div>

@include('addItem')

@endsection