 
<?php $__env->startSection('main'); ?> 
    <div class="container"> 
        <h1>Sửa Thông Tin</h1> 
        <form action="<?php echo e(route('tour.update', $tour->id)); ?>" method="POST"> 
            <?php echo csrf_field(); ?> 
            <?php echo method_field('PUT'); ?> 
            
            <div class="form-group"> 
                <label for="roomnuber">Ten tour:</label> 
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($tour->name); ?>" required> 
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 

            <div class="form-group"> 
                <label for="description">Ngay bat dau:</label> 
                <input type="text" class="form-control" id="description" name="description" value="<?php echo e($tour->description); ?>" required> 
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 

            <div class="form-group"> 
                <label for="price">Ngay ket thuc:</label> 
                <input type="text" class="form-control" id="price" name="price" value="<?php echo e($tour->price); ?>" required> 
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 

            <div class="form-group"> 
                <label for="store_name">gia:</label> 
                <input type="text" class="form-control" id="store_name" name="store_name" value="" required> 
                <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 

            <div class="form-group"> 
                <label for="store_name">ten dia diem du lich:</label> 
                <input type="text" class="form-control" id="store_name" name="store_name" value="" required> 
                <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 

        

            <button type="submit" class="btn btn-primary">Lưu</button> 
        </form> 
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.parents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Nam's computer\ktracuoiki\resources\views/tour/edit.blade.php ENDPATH**/ ?>