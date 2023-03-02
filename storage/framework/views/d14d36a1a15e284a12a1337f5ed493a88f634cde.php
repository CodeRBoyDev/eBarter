
<?php $__env->startSection('content'); ?>

<section id="content" class="container">
    <!-- Begin .page-heading -->
    <div class="page-heading">
    <div class="container">
<div id="content" class="content p-0">
<div class="profile clearfix"> 

  <?php echo Form::model($user,['route' => ['user.postedit','files'=>true,$user->id],'method'=>'PATCH','enctype'=>'multipart/form-data']); ?>

                <?php echo e(csrf_field()); ?>


        <div class="image" >
            <img id="coverphoto" src="<?php echo e(asset($user->coverphoto)); ?>" class="img-cover">
            <div class="overlay"> <input type="file" onchange="document.getElementById('coverphoto').src = window.URL.createObjectURL(this.files[0])" name="coverphoto">Edit cover photo</div>
        </div>               
                     
        <div class="user clearfix">
            <div class="avatar">
                <img id="profilephoto" src="<?php echo e(asset($user->profilephoto)); ?>" class="img-thumbnail img-profile">
                <div type="text" class="overlay2"><input type="file" onchange="document.getElementById('profilephoto').src = window.URL.createObjectURL(this.files[0])" name="profilephoto">Edit profile photo</div>
                
            </div>                                
            <h2> <span class="title">First name:</span> 
            <input type="text" id="fname" name="fname" value="<?php echo e($user->fname); ?>"> 
            <span class="title">Last name:</span>
            <input type="text" id="lname" name="lname" value="<?php echo e($user->lname); ?>"></h2>                                
            <div class="actions">
                <div class="btn-group">
                  
                    <button type="submit" class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-edit glyphicon glyphicon-white"></span> Update</button>

                  </div>
            </div>                                                                                                
        </div>    

        <div class="info">
            <p><span class="glyphicon glyphicon-globe">
            </span><span class="title">City:</span> <input type="text" id="fname" name="address" value="<?php echo e($user->address); ?>"> 
            <span class="title">Town:</span> <input type="text" id="fname" name="town" value=" <?php echo e($user->town); ?>"></p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> 
            <span class="title">Date of birth:</span> <input type="date" id="fname" name="birth" value="<?php echo e($user->birth); ?>"> </p>       
                                     
        </div>                              
    </div>
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BarterSystem\resources\views/profile/edit.blade.php ENDPATH**/ ?>