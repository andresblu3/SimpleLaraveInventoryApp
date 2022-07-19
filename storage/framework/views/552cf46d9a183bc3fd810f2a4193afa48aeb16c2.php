
<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-md-12 text-center p-4">
        <h1 class="d-inline px-4"><i class="fa-solid fa-warehouse"></i> Inventory App</h1>
        <a class="btn btn-primary d-inline" href="<?php echo e(route('items.create')); ?>"><i class="fa-solid fa-plus"></i> Create new Item</a>
    </div>
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="m-0"><?php echo e($message); ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="col-md-8 offset-md-2 mb-4">
        <form method="GET">
            <div class="input-group">
                <input type="text" name="search" value="<?php echo e(request()->get('search')); ?>" class="form-control" placeholder="Search in the warehouse..." aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
        </form>
    </div>

    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col-md-4 my-2">
        <div class="card">
            <div class="card-body mx-auto">
                <div class="text-center mb-4">
                    <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="<?php echo e($item->name); ?>" class="img-thumbnail img-fluid">
                </div>
                <h5 class="card-title"><?php echo e($item->name); ?></h5>
                <p class="card-text"><?php echo e($item->description); ?></p>
                <p class="card-text">Quantity: <span class="badge rounded-pill text-bg-warning"><?php echo e($item->quantity); ?></span></p>
                <a href="<?php echo e(route('items.show', $item->id)); ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i> View</a>
                <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn btn-success"><i class="fa-solid fa-pencil"></i> Edit</a>
                <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display: inline;"  onsubmit="return validate(this);">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button style="display: inline;" type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script>
        function validate(form) {
            if (!valid) {
                alert('Please correct the errors in the form!');
                return false;
            } else {
                return confirm('Do you really want to delete this item?');
            }
        }
    </script>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\InventoryApp\inventory\resources\views/items/index.blade.php ENDPATH**/ ?>