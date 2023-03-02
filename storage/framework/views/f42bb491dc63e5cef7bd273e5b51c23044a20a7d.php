
<?php $__env->startSection('body'); ?>

 
<div class ="custom-animal">
 
<div id="mycarousel" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner" role="listbox">


            <div class="item">

                    <img  class="slider-img img-circle " , src="<?php echo e(asset('image/barter.png')); ?>">
                    
                    <div class="carousel-caption slide-text">
                        <h3>Welcome, Kabarter!!!</h3>
                    
                    </div>
                    
            </div> 
 

            <div class="item">

                    <img  class="slider-img img-circle " , src="<?php echo e(asset('image/barter.jpg')); ?>">
                    
                    <div class="carousel-caption slide-text">
                        <h3>E-Barter</h3>
                    
                    </div>
                    
            </div> 

    </div>


    <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">

        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

        <span class="sr-only">Previous</span>

    </a>
    <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">

        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

        <span class="sr-only">Next</span>

    </a>
</div>
         <div class ="container trending-wrapper ">
           <div class="row">
                    <div class="col-sm-8  left-col">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <div class="card trending-item">
                                         <div class="trending-card">
                                       
                                             <img  class="display-dog" src="<?php echo e($product->imagePath); ?>"   >
                                                
                                        
                                                    <p class="title">Product Title:<?php echo e($product->title); ?></p>
                                                        <p>Category:<?php echo e($product->category); ?></p> 
                                                        <p>Description:<?php echo e($product->description); ?></p> 
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($product->location); ?></p> 
                                                        <div class="clearfix">  
                                                                <button style="border: none; background-color:red; " class="btn btn-info fas fa-hands-helping  pull-left" data-toggle="modal" data-target="#<?php echo e($product->id); ?>">
                                    
                                                                </button> 
                                                            <!-- User Form Modal -->
                                                            <div class="modal fade" role="dialog" tabindex="-1" id="<?php echo e($product->id); ?>">
                                                                <div class="modal-dialog " role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <h4 class="modal-title" style="margin-left:37%"><i>Requesting Barter Mode</i></h4>
                                                                                    <?php echo e(Form::Open(['route' => 'barter.request'])); ?>

                                                                                    <div class="row">
                                                                                    <div class="column">
                                                                                        
                                                                                    <input type="hidden" id="item_id" name="item_id" value="<?php echo e($product->id); ?>">
                                                                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo e($product->user_id); ?>">

                                                                                    <?php echo e(Form::label('mode' , 'Barter Mode')); ?>

                                                                                    <?php echo e(Form::select('mode', ['delivery' =>'Delivery', 'meetup' =>'MeetUp'], null, ['class' => ' register-text form-control' , "placeholder" => "Select mode..."])); ?>                                                           
                                                                                    
                                                                                    </div>
                                                                                    <div class="column">
                                                                                    <?php echo e(Form::label('meetup' , 'Meeting Place')); ?>

                                                                                    <?php echo e(Form::text('meetup' ,'' , ['class' => 'form-control register-text' , "placeholder" => "Enter your prefer Meeting Place"] )); ?>

                                                                                    <span style ="color:red"><?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>

                                                                                    <?php echo e(Form::submit('Submit' ,['class' => 'btn btn-warning btn-submit register-text' ] )); ?>

                                                                                    </div> 
                                                                                    </div>       
                                                                                
                                                                                    <?php echo Form::close(); ?>

                                                                                    </div> 
                                                                                </div>
                                                                </div>
                                                            </div>
                                                                <a href="<?php echo e(route('item.show',$product->id)); ?>" class="btn btn-info pull-right" role="button"><i class="fas fa-info"></i>  Info </a>
                                                                
                                                        </div>
                                                   
                                        </div>
                                    </div>                   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                   </div> 
                    <div class="col-sm-3 right-col">
                        <div class="sidevar-back"> 
                               
                        
                         
                        </div>

                        <div class="row social-icon">
                                    <div class="column"> <a href="#"><i class="fa fa-dribbble"></i></a></div>
                                    <div class="column"><a href="#"><i class="fa fa-twitter"></i></a></div>
                                    <div class="column"><a href="#"><i class="fa fa-facebook"></i></a></div>
                                    <div class="column">  <a href="#"><i class="fa fa-linkedin"></i></a></div>
                     </div>
                     <div>
                     <a class="btn btn-primary " href="">Message Us!!   <i class=" far fa-envelope-open"></i></a> 
                     </div>
            </div>
         
       </div>

            <?php if(Session::has('success')): ?>
            <script>
                    swal("Successfully!" , "<?php echo Session::get('success'); ?>" ,"success",{Button:"ok"}); 
            </script>
            <?php endif; ?>

            
            <?php if(Session::has('error')): ?>
            <script>
            swal({
                title: "Permission Denied",
                text: "<?php echo Session::get('error'); ?>",
                icon: "warning",
                button: "Ok",
             });
            </script>
            <?php endif; ?>

                   

  
</div>
<script>
        document.querySelector('.carousel-inner > div:first-child').classList.add('active');
</script>
<style>
    .postbarter
    {
     
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\BarterSystem\resources\views/home/home.blade.php ENDPATH**/ ?>