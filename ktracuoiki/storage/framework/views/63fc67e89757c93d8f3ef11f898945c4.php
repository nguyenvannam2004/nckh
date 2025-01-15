

<?php $__env->startSection('title','Truong dai hoc thuy loi'); ?>;
    
<?php $__env->startSection('main'); ?>
<h3 class="text-center" style="margin-top:40px">LIST TOUR</h3>



<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<a href="<?php echo e(route('tour.create')); ?>" class="btn btn-success">ADD</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">NAME TOUR</th>
        <th scope="col">START_DATE</th>
        <th scope="col">END_DATE</th>
        <th scope="col">PRICE</th>
        <th scope="col">NAME DESTINATION</th>
        <th scope="col" colspan=3 class="text-center">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"><?php echo e($tours->name); ?></th>
        <td><?php echo e($tours->start_date); ?></td>
        <td><?php echo e($tours->end_date); ?></td>
        <td><?php echo e($tours->price); ?></td>
        <td></td>
        <td>
          <a href="<?php echo e(route('tour.edit',$tours->id)); ?>"><i class="bi bi-pencil-square"></i></a>
        </td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo e($tours->id); ?>">
            <i class="bi bi-trash3-fill"></i>
          </button>

          <div class="modal fade" id="<?php echo e($tours->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="<?php echo e($tours->tourid); ?>">DELETE TOUR</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ARE YOU SURE YOU WANT TO DELETE THIS TOUR ? 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                  <form action="<?php echo e(route('tour.destroy',$tours->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-primary">DELETE</button>
                </form>
                </div>
              </div>
            </div>
          </div>

      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <?php echo e($tour->links('pagination::bootstrap-4')); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Nam's computer\ktracuoiki\resources\views/tour/index.blade.php ENDPATH**/ ?>