@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="text-center p-4">
            <h1 class="d-inline">Inventory App</h1>
            <a class="btn btn-success d-inline" href="{{ route('items.index') }}"><i class="fa-solid fa-house"></i> Back to home</a>
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

        <h3 class="text-center">Edit: {{ $item->name; }}</h3>
        
        <form class="mt-4 form-edit" action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $item->name }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Enter description" value="{{ $item->description }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image" value="{{ $item->image }}">
            </div>
            <div class="form-group mt-3">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" name="quantity" placeholder="Enter quantity" value="{{ $item->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit <i class="fa-solid fa-angle-right"></i></button>    
        </form>
    </div>
@endsection