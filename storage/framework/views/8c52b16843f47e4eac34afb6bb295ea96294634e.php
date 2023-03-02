<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">e-Barter Mo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li>
                  <form class="navbar-form navbar-left" method="POST" role="search" action="#">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                          <input type="text" name="search" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                      </form></li>
                      
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Barter List
                        <span class="badge">#</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(Auth::check()): ?>
                          <li><a href="<?php echo e(route('user.profile')); ?>">User Profile</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="<?php echo e(route('user.logout')); ?>">Logout</a></li>
                        <?php else: ?>
                          <li><a href="<?php echo e(route('user.signup')); ?>">Signup</a></li>
                          <li><a href="<?php echo e(route('user.signin')); ?>">Signin</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><?php /**PATH D:\BarterSystem\resources\views/partials/header.blade.php ENDPATH**/ ?>