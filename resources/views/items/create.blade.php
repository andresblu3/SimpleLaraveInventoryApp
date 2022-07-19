@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 p-4">
        <div class="text-center">
        <h1 class="d-inline">Inventory App</h1>
        <a class="btn btn-primary d-inline" href="{{ route('items.index') }}">Back to home</a>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-md-8 offset-md-2 mt-4 form-add">
        <div class="text-center">
            <h2>Create new Item</h2>
        </div>
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Enter description" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" name="quantity" placeholder="Enter quantity" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit <i class="fa-solid fa-angle-right"></i></button>
        </form>
    </div>
</div>
@endsection