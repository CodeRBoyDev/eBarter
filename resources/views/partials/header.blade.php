  
<?php
use App\Http\Controllers\TransactionController;
$total = 0;
if(Auth::check())
{
  $total = TransactionController::totalrequest();
 
}
?>



<nav class="navbar navbar-default headedcolor">
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
            <a class="navbar-brand" href="{{ route('home') }}">e-Barter</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li>
                <form action="{{route('item.search')}}" class="navbar-form navbar-left">
                    <div class="form-group">
                    <input type="text" name= "search" class="form-control seacrh-box" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                      
                <li>
                    <a href="{{route('barterlist')}}"> 
                        <i class="fas fa-hands-helping" aria-hidden="true"></i> Barter List
                        <span class="totalcolor ">({{$total}})</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                          <li><a href="{{ route('user.profile') }}">User Profile</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="{{ route('user.logout') }}">Logout</a></li>
                        @else
                          <li><a href="{{ route('user.signup') }}">Signup</a></li>
                          <li><a href="{{ route('user.signin') }}">Signin</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->

    <style>
        .headedcolor
{
    background:#242939 !important;
    min-height:70px;
    padding-top:5px;

}.totalcolor
{
    color:white;
}
    </style>
</nav>