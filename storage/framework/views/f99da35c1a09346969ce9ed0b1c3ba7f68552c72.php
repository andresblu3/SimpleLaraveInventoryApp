
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="text-center p-4">
            <h1 class="d-inline">Inventory App</h1>
            <a class="btn btn-success d-inline" href="<?php echo e(route('items.index')); ?>"><i class="fa-solid fa-house"></i> Back to home</a>
        </div>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <h3 class="text-center">Edit: <?php echo e($item->name); ?></h3>
        
        <form class="mt-4 form-edit" action="<?php echo e(route('items.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo e($item->name); ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Enter description" value="<?php echo e($item->description); ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image" value="<?php echo e($item->image); ?>">
            </div>
            <div class="form-group mt-3">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" name="quantity" placeholder="Enter quantity" value="<?php echo e($item->quantity); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit <i class="fa-solid fa-angle-right"></i></button>    
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\InventoryApp\inventory\resources\views/items/edit.blade.php ENDPATH**/ ?>