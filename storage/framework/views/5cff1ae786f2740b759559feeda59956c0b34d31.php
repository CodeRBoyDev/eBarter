<section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                    <?php if( Session::has('fail')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('fail')); ?></p>
      </div><br />
     <?php endif; ?>         
           
    <div class="profile clearfix">                            
        <div class="image">
            <img src="<?php echo e(asset($userss->coverphoto)); ?>" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="<?php echo e(asset($userss->profilephoto)); ?>" class="img-thumbnail img-profile">
            </div>                                
            <h2><?php echo e($userss->name); ?> <?php echo e($userss->lname); ?></h2>   
        <?php if($userId == true): ?>
        <?php echo Form::open(['route'=>['user.unfollow'],'enctype'=>'multipart/form-data']); ?>                             
            <div class="actions">
                <div class="btn-group">
                <!-- <?php echo e(csrf_field()); ?> -->
                <input type="hidden" id="custId" name="follow_id" value="<?php echo e($userss->id); ?>">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-check glyphicon glyphicon-white"></span> Following</button>
                    <?php echo Form::close(); ?>

                    <a href="<?php echo e(URL('chatify')); ?>"  class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</a>
                </div>
            </div>                                                                                                
        </div>  
        <?php elseif($userId == false): ?> 
            <?php echo Form::open(['route'=>['user.follow'],'enctype'=>'multipart/form-data']); ?>                             
            <div class="actions">
                <div class="btn-group">
                <!-- <?php echo e(csrf_field()); ?> -->
                <input type="hidden" id="custId" name="follow_id" value="<?php echo e($userss->id); ?>">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Follow</button>
                    <?php echo Form::close(); ?>

                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
                </div>
            </div>                                                                                                
        </div>
        <?php else: ?>  
        none

        <?php endif; ?>
           
                                
        <div class="info">
 
        <p><span class="glyphicon glyphicon-user"></span> <span class="title">User Rating:</span> <?php echo e($totalRatings); ?>/5</p>       
            <p><span class="glyphicon glyphicon-globe"></span> <span class="title"><?php echo e($userss->address); ?></span>, <?php echo e($userss->town); ?></p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> <?php echo e($userss->birth); ?></p>       
                                     
        </div>                              
    </div>


        <div class="container">
          <div class="row">
              <div class="col-sm-8">
                  <img src="<?php echo e(asset($item->imagePath)); ?>" class="img-responsive" alt="">
                </div>
                <div class="col-sm-4">
                    <div class="box">
                    Product: <?php echo e($item->title); ?>

                    Description: <?php echo e($item->description); ?>

                    </div>
                    <div class="box">
            <ul class="list-unstyled">
                <li><button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-handshake glyphicon glyphicon-white"><i class="fas fa-handshake"></i>BARTER</li></button>
                          <li><i class="fa fa-calendar"></i><?php echo e($item->created_at->toDateString()); ?></li>
                            <li><a href="#tab1" data-toggle="tab"><i class="fa fa-comment"></i><?php echo e($count); ?> Feedback</a></li>
                            <?php if($report == true): ?> 
                            <em><li><i class="fa fa-check-circle" style="color: #4BB543;"></i> Reported</li></em>
                            
                            <?php else: ?>  
                            <li><a onclick="openModal()" data-toggle="modal" data-target="#<?php echo e($item->id); ?>"><i class="fa fa-exclamation-circle"></i> Report</a></li>
                            
                            <?php endif; ?>
                    </div>
                </div>


                
                <style>
		.animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		.animated.faster {
			-webkit-animation-duration: 500ms;
			animation-duration: 500ms;
		}

		.fadeIn {
			-webkit-animation-name: fadeIn;
			animation-name: fadeIn;
		}

		.fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut;
		}

		@keyframes  fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes  fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}
	</style>


	<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
		style="background: rgba(0,0,0,.7);">
		<div
			class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
			<div class="modal-content py-4 text-left px-6">
				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Report</p>
					<div class="modal-close cursor-pointer z-50">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
							viewBox="0 0 18 18">
							<path
								d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
							</path>
						</svg>
					</div>
				</div>
                <?php echo Form::open(['route'=>['user.report'],'enctype'=>'multipart/form-data']); ?>   
<?php echo e(csrf_field()); ?>

				<div class="my-5">
                <input type="hidden" id="custId" name="owner_id" value="<?php echo e($userss->id); ?>">
                <input type="hidden" id="custId" name="item_id" value="<?php echo e($item->id); ?>">
                <label for="report_description">Select a report: </label>
                                                <select name="report_description" class="form-control">
                                                  <option>Inaccurate Description</option>
                                                  <option>Promoting a business</option>
                                                  <option>Abusive or Harmful Content</option>
                                                  <option>No Itent to Barter</option>
                                                  <option>Weapon or Drugs Barter</option>
                                                  <option>Sexualized Content</option>
                                                  <option>Scam</option>
                                                </select>
				</div>
                <footer class="flex justify-center p-2">
            <button
              class="bg-red-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
              
            >
              Report
            </button>
          </footer>
			</div>
		</div>
	</div>
    <?php echo Form::close(); ?>


	<script>
		const modal = document.querySelector('.main-modal');
		const closeButton = document.querySelectorAll('.modal-close');

		const modalClose = () => {
			modal.classList.remove('fadeIn');
			modal.classList.add('fadeOut');
			setTimeout(() => {
				modal.style.display = 'none';
			}, 500);
		}

		const openModal = () => {
			modal.classList.remove('fadeOut');
			modal.classList.add('fadeIn');
			modal.style.display = 'flex';
		}

		for (let i = 0; i < closeButton.length; i++) {

			const elements = closeButton[i];

			elements.onclick = (e) => modalClose();

			modal.style.display = 'none';

			window.onclick = function (event) {
				if (event.target == modal) modalClose();
			}
		}
	</script>


 

                
                
            </div>
            




        









        </div>
        

        <div>
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        <?php if(auth()->guard()->check()): ?>
                         <?php if( Session::has('fails')): ?>
      <div class="alert alert-success">
        <p><?php echo e(Session::get('fails')); ?></p>
      </div><br />
     <?php endif; ?>   
                            <div id="tab1" class="w-full space-y-5">
                                <p class="font-medium text-blue-500 uppercase">
                                    Rate this product
                                </p>
                            </div>
                            <?php if(session()->has('message')): ?>
                                <p class="text-xl text-gray-600 md:pr-16">
                                    <?php echo e(session('message')); ?>

                                </p>
                            <?php endif; ?>
                            <?php if($hideForm != true): ?>
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 1 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 2 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 3 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 4 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 <?php if($rating >= 5 ): ?> text-indigo-500 <?php else: ?> text-grey <?php endif; ?> " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="mt-1 text-red-500"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php if($currentId): ?>
                                                <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete(<?php echo e($currentId); ?>)" class="text-sm cursor-pointer">Delete</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            <?php endif; ?>
                        <?php else: ?>
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate the product!
                                </div>
                                <a href="/signin"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100" 
                                >Login</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
    
            </div>
        </div>
    </section>


     <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                       

    
    <section class="relative overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Product Ratings
                    </h2>
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        <?php echo e($totalRating); ?>/5⭐
                    </h2>
                </div>
            </div>
            
            <div class="box-border flex grid ">
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="container">
<div class="row bootstrap snippets bootdeys">
    <div class="col-md-8 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">

                
                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="<?php echo e(asset($comment->user->profilephoto)); ?>" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo e($comment->created_at); ?></small>
                                </span>
                                @<strong class="text-success"><?php echo e($comment->user->name); ?> <?php echo e($comment->user->lname); ?></strong>
                                <p>"<?php echo e($comment->comment); ?>"</p>
                                <p>
                                Rating: <strong><?php echo e($comment->rating); ?></strong> ⭐
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->id == $comment->user_id || auth()->user()->role == 'customer' ): ?>)
                                        - <a wire:click.prevent="delete(<?php echo e($comment->id); ?>)" class="text-sm cursor-pointer">Delete</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
    </section>
    
</div>
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




<?php /**PATH C:\BarterSystem\resources\views/livewire/product-ratings.blade.php ENDPATH**/ ?>