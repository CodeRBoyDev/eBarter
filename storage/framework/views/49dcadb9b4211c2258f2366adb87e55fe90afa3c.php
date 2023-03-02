
<?php $__env->startSection('body'); ?>

<div class="col-sm-8  left-col">
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <div class="card trending-item">
                                         <div class="trending-card">
                                       
                                             <img  class="display-dog" src="<?php echo e($product->items->imagePath); ?>"   >
                                                
                                        
                                                    <p class="title">Product Title:<?php echo e($product->items->title); ?></p>
                                                        <p>Category:<?php echo e($product->items->category); ?></p> 
                                                        <p>Description:<?php echo e($product->items->description); ?></p> 
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($product->items->location); ?></p> 
                                                        <div class="clearfix"> 
                                                     

                                                        <?php echo Form::open(['route'=>['cancel'],'enctype'=>'multipart/form-data']); ?>

                                                            <input type="hidden" id="item_id" name="item_id" value="<?php echo e($product->id); ?>">
                                                                                            <?php echo e(csrf_field()); ?>

                                                            <button type="submit" title="delete" style="border: none;">Cancel</i>
                                                            </button> 
                                                        <?php echo Form::close(); ?>


                                                                <a href="<?php echo e(route('item.show',$product->items->id)); ?>" class="btn btn-info pull-right" role="button"><i class="fas fa-info"></i>  Info </a>
                                                                
                                                        </div>
                                                   
                                        </div>
                                    </div>                   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\BarterSystem\resources\views/profile/barterlist.blade.php ENDPATH**/ ?>