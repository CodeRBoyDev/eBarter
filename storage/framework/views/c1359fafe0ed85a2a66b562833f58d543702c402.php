<form action="<?php echo e(route('admin.update',$id)); ?>" method="post">
    <?php echo e(method_field('PUT')); ?>

    <?php echo e(csrf_field()); ?>

    <button type="submit" title="active" style="border: none; background-color:transparent;">
                  <i class="fas fa-user-lock fa-lg text-primary"></i>
    </button> 
    <a href="<?php echo e(route('admin.show',$id)); ?>" class='fas fa-eye'> </a>
</form><?php /**PATH C:\BarterSystem\resources\views/admin/action.blade.php ENDPATH**/ ?>