
<?php $__env->startSection('body'); ?>

<div class="container">
<h1>Search</h1>

There are <?php echo e($searchResults->count()); ?> results.

<?php $__currentLoopData = $searchResults->groupByType(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $modelSearchResults): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <h2><?php echo e($type); ?></h2>
   
   <?php $__currentLoopData = $modelSearchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="card trending-item">
                                  <div class="trending-card"> 
                                          <p class="title"><?php echo e($searchResult->title); ?></p>
                                          <a href="<?php echo e($searchResult->url); ?>"> View Profile  </a> 
                                    </div>
                                </div>    
                                       
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\BarterSystem\resources\views/item/search.blade.php ENDPATH**/ ?>