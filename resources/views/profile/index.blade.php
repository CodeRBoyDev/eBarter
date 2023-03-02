
@extends('layouts.profile')

@section('content')




    <div class="page-heading">
    <div class="container">
<div id="content" class="content p-0">
<div class="profile clearfix">                            
        <div class="image">
            <img src="{{($loggedIn_user->coverphoto)}}" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="{{($loggedIn_user->profilephoto)}}"  class="img-thumbnail img-profile">
            </div>                                
            <h2>{{$loggedIn_user->fname}} {{$loggedIn_user->lname}} </h2> <a href="{{Url('myverify')}}" class="fa fa-check" aria-hidden="true"></a>                               
            <div class="actions">
                <div class="btn-group">
                   
                    <a href="{{action('UserController@profileEdit', $loggedIn_user->id)}}">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-edit glyphicon glyphicon-white"></span> Edit Profile</button>
                  </a>              
                  <a href="{{Url('home')}}"> 
                  <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="fa fa-home glyphicon glyphicon-white"></span>Home</button>
</a>
                  </div>
            </div>                                                                                                
        </div>    

       
        
        
        <div class="info">
            <p><span class="glyphicon glyphicon-globe"></span> <span class="title">{{$loggedIn_user->address}}</span>, {{$loggedIn_user->town}}</p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> {{$loggedIn_user->birth}}</p>       
                                     
        </div>                              
    </div>

    <div class="row">
        <div class="col-md-4">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-star"></i>
              </span>
              <span class="panel-title">User Rating</span>
            </div>
            <div class="panel-body pn">
            
                <tbody>
                  <tr>
                    <td>
                    </td>
                    @if($totalRating >= 0 && $totalRating <= 0.9)
                    <td><span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><h1>{{$totalRating}}/5 F-</h1></td>
                    @elseif($totalRating >= 1 && $totalRating <= 1.4)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><br><h1>{{$totalRating}}/5 F+</h1></td>
                    @elseif($totalRating >= 1.5 && $totalRating <=1.9)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><br><h1>{{$totalRating}}/5 D-</h1></td>
                    @elseif($totalRating >= 2 && $totalRating <= 2.4)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><br><h1>{{$totalRating}}/5 D+</h1></td>
                    @elseif($totalRating >= 2.5 && $totalRating <= 2.9)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span><br><h1>{{$totalRating}}/5 C-</h1></td>
                    @elseif($totalRating >= 3 && $totalRating <= 3.4)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <br><h1>{{$totalRating}}/5 C+</h1></td>
                    @elseif($totalRating >= 3.5 && $totalRating <= 3.9)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <br><h1>{{$totalRating}}/5 B-</h1></td>
                    @elseif($totalRating >= 4 && $totalRating <= 4.4)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span><br><h1>{{$totalRating}}/5 B+</h1></td>
                    @elseif($totalRating >= 4.5 && $totalRating <= 4.9)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span><br><h1>{{$totalRating}}/5 A-</h1></td>
                    @elseif($totalRating == 5)
                    <td><span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span><br><h1>{{$totalRating}}/5 A+</h1></td>
                    @endif
                  </tr>
                  <tr>
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
                <a href="#tab2" data-toggle="tab">Feedback ({{$countComment}})</a>
              </li>
              <li>
                <a href="#tab3" data-toggle="tab">Followers ({{$countFollower}})</a>
              </li>
              <li>
                <a href="#tab4" data-toggle="tab">Barter Request ({{ $countRequest}})</a>
              </li>
            </ul>

            <div class="tab-content" id="nav-tabContent">
  <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="nav-home-tab">
    



              <div class="card">
          <div class="card-body">
            <div class="text-center px-xl-3">
              <button class="btn btn-primary btn-block"  type="button" data-toggle="modal" data-target="#form1">POST ITEM</button>
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
                  @foreach($item as $items)

                    <tr>
                      <td class="align-middle">
                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                          <input type="checkbox" class="custom-control-input" id="item-1">
                          <label class="custom-control-label" for="item-1"></label>
                        </div>
                      </td>
                      <td class="text-nowrap align-middle"><a href="">{{$items->title}}</td>
                      <td class="text-nowrap align-middle"><span>{{$items->category}}</span></td>
                      <td class="text-nowrap align-middle"><span>{{Illuminate\Support\Str::limit($items->description,20)}}</span></td>
                      <td class="align-middle text-center">
                      <img src="{{($items->imagePath)}}" class="brand-image img-square elevation-3" height = "50" width="60" >
                      </td>
                      <td class="text-center align-middle">
                        <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</button>
                            <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                      @endforeach
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
<!-- start request tab -->
  <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="nav-profile-tab">
 
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
                        <th>Request ID</th>
                        <th class="max-width">Customer</th>
                        <th class="sortable">Item ID</th> 
                        <th class="sortable">Item Title</th> 
                        <th class="sortable">Barter Mode</th> 
                        <th class="sortable">Meeting Place</th> 
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
               
                    @foreach($requests as $request)  
                        <tr>
                            <td class="align-middle">
                              <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                <input type="checkbox" class="custom-control-input" id="item-1">
                                <label class="custom-control-label" for="item-1"></label>
                              </div>
                            </td>
                            <td class="text-nowrap align-middle"><a href="">{{$request->id}}</td>
                            <td class="text-nowrap align-middle"><span>{{$request->user->fname}} {{$request->user->lname}}</span></td>
                            <td class="text-nowrap align-middle"><span>{{Illuminate\Support\Str::limit($request->item_id)}}</span></td>
                            <td class="text-nowrap align-middle"><span>{{Illuminate\Support\Str::limit($request->items->title)}}</span></td>

                            <td class="text-nowrap align-middle"><span>{{$request->barter_mode}}</span></td>  
                            <td class="text-nowrap align-middle"><span>{{$request->meeting_place}}</span></td>    
                             <td class="text-nowrap align-middle"><span>{{$request->status}}</span></td>  
                            <td class="text-center align-middle">
                              <div class="btn-group align-top">
                              {!!Form::model($request,['route' => ['barter.update',$request->id],'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }} 
                                                                    {{ csrf_field() }}
                                      <button type="submit" title="update" style="border: none;">Accept</i>
                                      </button> 
                                      {!! Form::close() !!}
                                
                                      {!!Form::open(['route'=>['cancel'],'enctype'=>'multipart/form-data'])!!}
                                      <input type="hidden" id="item_id" name="item_id" value="{{$request->id}}">
                                                                       {{ csrf_field() }}
                                      <button type="submit" title="delete" style="border: none;">Deny</i>
                                      </button> 
                                      {!! Form::close() !!}
                                 
                              </div>
                            </td>
                        </tr>  
                       
                     @endforeach
                    </tbody>
                  </table>
              </div>
        

  </div>
<!-- end request tab -->

  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-profile-tab">



@forelse ($comments as $comment)   
<section class="content-item" id="comments">

                <div class="media">
                    <a class="pull-left" href="#"><img class="media-object" src="{{asset($comment->user->profilephoto)}}" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">{{  $comment->user->fname }} {{  $comment->user->lname }}</h4> on Item <b>{{optional($comment->items)->title}}</b>
                        <p>"{{ $comment->status }}"</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>{{ $comment->created_at }}</li>
                        </ul>
                    </div>
               
</section>
@empty
<h3>None</h3>
@endforelse



  </div>
  <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-contact-tab">



        <div class="panel-body">
       
          <ul class="list-group list-group-dividered list-group-full">
@forelse ($followers as $follower) 
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatars avatar-online" href="javascript:void(0)">
                    <img src="{{asset($follower->user->profilephoto)}}" alt="">
                    <i></i>
                  </a>
                </div>
                <div class="media-body">
                
                @if($followerFollow->user_id == $loggedIn_user->id && $followerFollow->following_id == $follower->user->id)
                {!!Form::open(['route'=>['user.unfollow'],'enctype'=>'multipart/form-data'])!!}  
                {{ csrf_field() }}  
                <div class="pull-right">
                <input type="hidden" id="custId" name="follow_id" value="{{$follower->user->id}}">
                    <button name="btn_submit" type="submit" class="btn btn-success btn-default btn-sm waves-effect waves-light"><i class="icon md-check" aria-hidden="true"></i>Following</button>
                  </div>
                  {!! Form::close() !!}
                  @else
                  {!!Form::open(['route'=>['user.follow'],'enctype'=>'multipart/form-data'])!!}  
                  {{ csrf_field() }}  
                  <div class="pull-right">
                  <input type="hidden" id="custId" name="follow_id" value="{{$follower->user->id}}">
                    <button name="btn_submit" type="submit" class="btn btn-info btn-sm waves-effect waves-light">Follow</button>
                  </div>
                  {!! Form::close() !!}
                  @endif
                  <div><a class="name" href="javascript:void(0)">{{  $follower->user->fname }} {{  $follower->user->lname }}</a></div>
                  <small>✉ {{$follower->user->email}}</small>
                </div>
              </div>
            </li>
            

@empty
<h3>None</h3>
@endforelse
            
          </ul>
        </div>
      </div>
    </div>





  </div>
</div>
</div>










            <div class="tab-content p30" style="height: 730px;">
              <div id="tab1" class="tab-pane fade active">
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
                  @foreach($item as $items)

                    <tr>
                      <td class="align-middle">
                        <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                          <input type="checkbox" class="custom-control-input" id="item-1">
                          <label class="custom-control-label" for="item-1"></label>
                        </div>
                      </td>
                      <td class="text-nowrap align-middle"><a href="">{{$items->title}}</td>
                      <td class="text-nowrap align-middle"><span>{{$items->category}}</span></td>
                      <td class="text-nowrap align-middle"><span>{{Illuminate\Support\Str::limit($items->description,20)}}</span></td>
                      <td class="align-middle text-center">
                      <img src="{{($items->imagePath)}}" class="brand-image img-square elevation-3" height = "50" width="60" >
                      </td>
                      <td class="text-center align-middle">
                        <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge" type="button" data-toggle="modal" data-target="#user-form-modal">Edit</button>
                            <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                      @endforeach
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
                              {!!Form::open(['route'=>['item.store','files'=>true],'enctype'=>'multipart/form-data'])!!}
                {{ csrf_field() }}
                                <div class="card-body">
                                    <div  class="row">
                                        <div class="col-sm-4">
                                          <input type="hidden" id="user_id" name="user_id" value="{{$loggedIn_user->id}}">
                                            <div class="form-group">
                                                <label>Choose Profile <span style="color:red;">*</span></label>
                                                <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="imagePath" id="Profile">
                                                <img id="blah" src="{{ asset('image/shop.png') }}" alt="your image" width="300" height="200" />
                                            </div>
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fn">Title: <span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" class="form-control" id="fn" name="title" placeholder="title" size="40"  autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category: </label>
                                                <select name="category" class="form-control">
                                                  <option>Computers</option>
                                                  <option>Mobile phones</option>
                                                  <option>Entertainment equipment</option>
                                                  <option>Cameras</option>
                                                  <option>Household furniture</option>
                                                  <option>Clothing</option>
                                                  <option>Sports equipment</option>
                                                  <option>Kitchen utensils</option>
                                                  <option>Shoes</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="ln">Description: <span style="color:red;">*</span></label>
                                                <textarea type="text" class="form-control"  id="ln" name="description" placeholder="description" size="40" required>
</textarea>
                                              </div>
                                                <div class="form-group" style="margin-left:20%">
                                                    <button class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Cancel</button>
                                                    <button name="btn_submit" type="submit" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Post</button>
                                                </div>
                                                </div>
                                           
                                            <div class="row">
                                            <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fn">Location: <span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" class="form-control" id="fn" name="location" placeholder="title" size="40"  autofocus required>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                {!!Form::close()!!}
         
             
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
                                                defaultPreviewContent: '<img src="{{ asset('image/logo.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:220px; height:180px">',
                                                allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
                                            });
                                        </script>


@endsection
