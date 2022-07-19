
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
        <h1 class="p-4">Inventory App</h1>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="<?php echo e($item->name); ?>" class="img-thumbnail img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo e($item->name); ?></h3>
                        <p class="card-text"><?php echo e($item->description); ?></p>
                        <p class="card-text">Quantity: <span class="badge rounded-pill text-bg-warning"><?php echo e($item->quantity); ?></span></p>
                        <a href="<?php echo e(route('items.index')); ?>" class="btn btn-primary">Back to home</a>
                        <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-success">Edit</a>
                        <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\InventoryApp\inventory\resources\views/items/show.blade.php ENDPATH**/ ?>