<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo e(URL::to('css/login.css')); ?>">
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome, Ka-Barter!</h3>
                        <p>"e-Barter , Your Barter Buddy"</p>
                     <a href="<?php echo e(URL('signin')); ?>"><b>Login</b></a>            
                    </div>
                    <div class="col-md-9 register-right">
                    <?php echo Form::open(['route'=>['user.postSignup'],'enctype'=>'multipart/form-data']); ?>  
                    <?php echo e(csrf_field()); ?>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">SIGNUP AS KA-BARTER</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <?php if($errors->has('fname')): ?>
              <small style="color:red;" ><?php echo e($errors->first('fname')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                            <input type="text" name="fname" value="<?php echo e(old('fname')); ?>"  class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                       
              <?php if($errors->has('lname')): ?>
              <small style="color:red;" ><?php echo e($errors->first('lname')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                            <input type="text" name="lname" value="<?php echo e(old('lname')); ?>"  class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        
              <?php if($errors->has('gender')): ?>
              <small style="color:red;" ><?php echo e($errors->first('gender')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                        <?php echo Form::radio('gender','Male'); ?> Male <?php echo Form::radio('gender','Female'); ?> Female
                                        </div>
                                      
              <?php if($errors->has('birth')): ?>
              <small style="color:red;" ><?php echo e($errors->first('birth')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                           <label>Birth Date:</label>
                                            <input type="date" name="birth" value="<?php echo e(old('birth')); ?>" class="form-control" placeholder="Birth Date *" value="" />
                                        </div>
                                        
              <?php if($errors->has('password')): ?>
              <small style="color:red;" ><?php echo e($errors->first('password')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                     
            
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <?php if($errors->has('email')): ?>
              <small style="color:red;" ><?php echo e($errors->first('email')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Your Email *" value="" />
                                        </div>
                             
              <?php if($errors->has('phone')): ?>
              <small style="color:red;" ><?php echo e($errors->first('phone')); ?></small>
              <?php endif; ?>
                                        <div class="form-group">
                                            <input type="text" minlength="10" name="phone" value="<?php echo e(old('phone')); ?>" maxlength="12"  class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        
              <?php if($errors->has('address')): ?>
              <small style="color:red;" ><?php echo e($errors->first('address')); ?></small>
              <?php endif; ?>

                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>"  placeholder="Your Address *" value="" />
                                        </div>
                                   
              <?php if($errors->has('town')): ?>
              <small style="color:red;" ><?php echo e($errors->first('town')); ?></small>
              <?php endif; ?>

                                        <div class="form-group">
                                            <input type="text" name="town" class="form-control" value="<?php echo e(old('town')); ?>" placeholder="Your Town *" value="" />
                                        </div>

                                        
              <?php if($errors->has('zipcode')): ?>
              <small style="color:red;" ><?php echo e($errors->first('zipcode')); ?></small>
              <?php endif; ?>

                                        <div class="form-group">
                                            <input type="text" minlength="10" name="zipcode" maxlength="10" value="<?php echo e(old('zipcode')); ?>"  class="form-control" placeholder="Zipcode *" value="" />
                                        </div>
                                       


                                        <input type="hidden" id="role" name="role" value="customer">

                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                           
                        </div>
                    </div>
                </div>

            </div>
            <?php /**PATH C:\BarterSystem\resources\views/profile/signup.blade.php ENDPATH**/ ?>