 
 
<?php $__env->startSection('content-wan'); ?>

<div class ="custom-animal">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo e(asset('image/barter.png')); ?>" alt="Chania">
      <div class="carousel-caption ">
        <h3>Welcome, Kabarter!!!</h3> 
      </div>
    </div>

     
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 

   <?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                    <div class="caption">
                           <h3><?php echo e($product->title); ?> </h3>
                           <h4> <?php echo e($product->category); ?></h4>
                      <p><?php echo e($product->description); ?></p>
                     

                      <div class="clearfix">
                           <a href="#" class="btn btn-danger" role="button"><i class="fas fa-hands-helping"></i></a> 
                           <a href="<?php echo e(route('item.show',$product->id)); ?>" class="btn btn-info pull-right" role="button"><i class="btn btn-info fas fa-info"></i>More Info </a>
                           
                      </div>
             
                    </div>
                  </div>
                      </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\BarterSystem\resources\views/home/index.blade.php ENDPATH**/ ?>