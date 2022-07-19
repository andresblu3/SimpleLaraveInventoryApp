@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
        <h1 class="p-4">Inventory App</h1>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->name }}</h3>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Quantity: <span class="badge rounded-pill text-bg-warning">{{ $item->quantity }}</span></p>
                        <a href="{{ route('items.index') }}" class="btn btn-primary">Back to home</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button style="display: inline;" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                        //make delete confirmation alert
                        <script>
                            $(document).ready(function(){
                                $('button[type="submit"]').click(function(e){
                                    e.preventDefault();
                                    var form = $(this).closest('form');
                                    swal({
                                        title: "Are you sure?",
                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            form.submit();
                                        }
                                    });
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>

    </div>
</div>
@endsection