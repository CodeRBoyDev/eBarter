

<?php $__env->startSection('content'); ?>



<section id="content" class="container">
    <!-- Begin .page-heading -->
    <div class="page-heading">
    <div class="container">
<div id="content" class="content p-0">
<div class="profile clearfix">                            
        <div class="image">
            <img src="<?php echo e(($loggedIn_user->coverphoto)); ?>" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="<?php echo e(($loggedIn_user->profilephoto)); ?>"  class="img-thumbnail img-profile">
            </div>                                
            <h2><?php echo e($loggedIn_user->fname); ?> <?php echo e($loggedIn_user->lname); ?> </h2>                                
            <div class="actions">
                <div class="btn-group">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Follow</button>
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>

                    <a href="<?php echo e(action('UserController@profileEdit', $loggedIn_user->id)); ?>">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-edit glyphicon glyphicon-white"></span> Edit Profile</button>
</a>
                  </div>
            </div>                                                                                                
        </div>    

        
        
        
        <div class="info">
            <p><span class="glyphicon glyphicon-globe"></span> <span class="title"><?php echo e($loggedIn_user->address); ?></span>, <?php echo e($loggedIn_user->town); ?></p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> <?php echo e($loggedIn_user->birth); ?></p>       
                                     
        </div>                              
    </div>

    <div class="row">
        <div class="col-md-4">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-star"></i>
              </span>
              <span class="panel-title"> User Popularity</span>
            </div>
            <div class="panel-body pn">
              <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                <thead>
                  <tr class="hidden">
                    <th class="mw30">#</th>
                    <th>First Name</th>
                    <th>Revenue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <span class="fa fa-desktop text-warning"></span>
                    </td>
                    <td>none</td>
                    <td>
                      <i class="fa fa-caret-up text-info pr10"></i>$none</td>
                  </tr>
                  <tr>
                    <td>
                      <span class="fa fa-microphone text-primary"></span>
                    </td>
                    <td>none</td>
                    <td>
                      <i class="fa fa-caret-down text-danger pr10"></i>$none</td>
                  </tr>
                  <tr>
                    <td>
                      <span class="fa fa-newspaper-o text-info"></span>
                    </td>
                    <td>none</td>
                    <td>
                      <i class="fa fa-caret-up text-info pr10"></i>$none</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-trophy"></i>
              </span>
              <span class="panel-title"> BARTER</span>
            </div>
            <div class="panel-body pb5">
              <!-- <span class="label label-warning mr5 mb10 ib lh15">Default</span>
              <span class="label label-primary mr5 mb10 ib lh15">Primary</span>
              <span class="label label-info mr5 mb10 ib lh15">Success</span>
              <span class="label label-success mr5 mb10 ib lh15">Info</span>
              <span class="label label-alert mr5 mb10 ib lh15">Warning</span>
              <span class="label label-system mr5 mb10 ib lh15">Danger</span>
              <span class="label label-info mr5 mb10 ib lh15">Success</span>
              <span class="label label-success mr5 mb10 ib lh15">Ui Design</span>
              <span class="label label-primary mr5 mb10 ib lh15">Primary</span> -->

            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
              <span class="panel-title">HISTORY</span>
            </div>
            <div class="panel-body pb5">

              <!-- <h6>Experience</h6>

              <h4>Facebook Internship</h4>
              <p class="text-muted"> University of Missouri, Columbia
                <br> Student Health Center, June 2010 - 2012
              </p>

              <hr class="short br-lighter">

              <h6>Education</h6>

              <h4>Bachelor of Science, PhD</h4>
              <p class="text-muted"> University of Missouri, Columbia
                <br> Student Health Center, June 2010 through Aug 2011
              </p>

              <hr class="short br-lighter">

              <h6>Accomplishments</h6>

              <h4>Successful Business</h4>
              <p class="text-muted pb10"> University of Missouri, Columbia
                <br> Student Health Center, June 2010 through Aug 2011
              </p> -->

            </div>
          </div>
        </div>



        <!-- ITEM -->
        <div class="col-md-8">

          <div class="tab-block">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab1" data-toggle="tab">Posted Item</a>
              </li>
              <li>
                <a href="#tab2" data-toggle="tab">Feedback</a>
              </li>
              <li>
                <a href="#tab1" data-toggle="tab">Rate</a>
              </li>
            </ul>
            <div class="tab-content p30" style="height: 730px;">
              <div id="tab1" class="tab-pane active">
              <div class="card">
          <div class="card-body">
            <div class="text-center px-xl-3">
              <button class="btn btn-primary btn-block"  type="button" data-toggle="modal" data-target="#form1">POST ITEM</button>
            </div>
            </div>
            </div>
                <div class="media">
                <div class="e-table">
              <div class="table-responsive table-lg mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="align-top">
                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                          <input type="checkbox" class="custom-control-input" id="all-items">
                          <label class="custom-control-label" for="all-items"></label>
                        </div>
                      </th>
                      <th>Title</th>
                      <th class="max-width">Category</th>
                      <th class="sortable">Description</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td class="align-middle">
                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                          <input type="checkbox" class="custom-control-input" id="item-1">
                          <label class="custom-control-label" for="item-1"></label>
                        </div>
                      </td>
                      <td class="text-nowrap align-middle"><a href=""><?php echo e($items->title); ?></td>
                      <td class="text-nowrap align-middle"><span><?php echo e($items->category); ?></span></td>
                      <td class="text-nowrap align-middle"><span><?php echo e(Illuminate\Support\Str::limit($items->description,20)); ?></span></td>
                      <td class="align-middle text-center">
                      <img src="<?php echo e(($items->imagePath)); ?>" class="brand-image img-square elevation-3" height = "50" width="60" >
                      </td>
                      <td class="text-center align-middle">
                        <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</button>
                            <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      

    <!-- User Form Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="form1">
      <div class="modal-dialog modal-lg" role="document">
                       <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" style="margin-left:37%"><i class="fa fa-plus"> POST ITEM</i></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <!-- form start -->
                              <?php echo Form::open(['route'=>['item.store','files'=>true],'enctype'=>'multipart/form-data']); ?>

                <?php echo e(csrf_field()); ?>

                                <div class="card-body">
                                    <div  class="row">
                                        <div class="col-sm-4">
                                          <input type="hidden" id="user_id" name="user_id" value="<?php echo e($loggedIn_user->id); ?>">
                                            <div class="form-group">
                                                <label>Choose Profile <span style="color:red;">*</span></label>
                                                <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="imagePath" id="Profile">
                                                <img id="blah" src="<?php echo e(asset('image/shop.png')); ?>" alt="your image" width="300" height="200" />
                                            </div>
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fn">Title: <span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" class="form-control" id="fn" name="title" placeholder="title" size="40"  autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label for="mn">Category: <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" value="" name="category" id="mn" placeholder="category" size="40" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ln">Description: <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control"  id="ln" name="description" placeholder="description" size="40" required>
                                            </div>
                                                <div class="form-group" style="margin-left:20%">
                                                    <button class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Cancel</button>
                                                    <button name="btn_submit" type="submit" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Post</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

              <div id="tab2" class="tab-pane"></div>
              <div id="tab4" class="tab-pane"></div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <script type="text/javascript">
                                        $("#Profile").fileinput({
                                                showCancel: false,
                                                showUpload: false,
                                                showRemove: false,
                                                browseClass: "btn btn-default",
                                                defaultPreviewContent: '<img src="<?php echo e(asset('image/logo.png')); ?>" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:220px; height:180px">',
                                                allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
                                            });
                                        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BarterSystem\resources\views/profile/index.blade.php ENDPATH**/ ?>