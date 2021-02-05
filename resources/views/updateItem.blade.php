@extends('template.template')

@section('title', 'Update: '.e($item->name))

@section('content')
<div class="container mt-4">
  <h3 class="text-center">Update Item</h3>
  <div class="container mt-3 col-8">
    <div class="card">
      <div class="card-body">
        @if($errors->any())
        <div class="container mt-2">
          @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
        </div>
        @endif
        <div class="container mt-2">
          <form action="{{ url('/item/'.$item->id.'/update') }}" method="post" class="form-group">
            @csrf
            <div class="form-inline mb-3">
              <label for="name" class="col-3">Product Name: </label>
              <input type="text" name="name" id="name" placeholder="Name" class="form-control col-6" value="{{ $item->name }}">
            </div>
            <div class="form-inline mb-3">
              <label for="price" class="col-3">Product Price: </label>
              <input type="number" name="price" id="price" placeholder="Price" class="form-control col-6" value="{{ $item->price }}">
            </div>
            <div class="form-inline mb-3">
              <label for="name" class="col-3">Product Stocks: </label>
              <input type="number" name="stock" id="stock" placeholder="Stocks" class="form-control col-6" value="{{ $item->stock }}">
            </div>
            <div class="d-flex justify-content-center">
              <input type="submit" value="Update" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection