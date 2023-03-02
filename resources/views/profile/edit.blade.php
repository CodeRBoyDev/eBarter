@extends('layouts.profile')
@section('content')

<section id="content" class="container">
    <!-- Begin .page-heading -->
    <div class="page-heading">
    <div class="container">
<div id="content" class="content p-0">
<div class="profile clearfix"> 

  {!!Form::model($user,['route' => ['user.postedit','files'=>true,$user->id],'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}

        <div class="image" >
            <img id="coverphoto" src="{{asset($user->coverphoto)}}" class="img-cover">
            <div class="overlay"> <input type="file" onchange="document.getElementById('coverphoto').src = window.URL.createObjectURL(this.files[0])" name="coverphoto">Edit cover photo</div>
        </div>               
                     
        <div class="user clearfix">
            <div class="avatar">
                <img id="profilephoto" src="{{asset($user->profilephoto)}}" class="img-thumbnail img-profile">
                <div type="text" class="overlay2"><input type="file" onchange="document.getElementById('profilephoto').src = window.URL.createObjectURL(this.files[0])" name="profilephoto">Edit profile photo</div>
                
            </div>                                
            <h2> <span class="title">First name:</span> 
            <input type="text" id="fname" name="fname" value="{{$user->fname}}"> 
            <span class="title">Last name:</span>
            <input type="text" id="lname" name="lname" value="{{$user->lname}}"></h2>                                
            <div class="actions">
                <div class="btn-group">
                  
                    <button type="submit" class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Recommend"><span class="glyphicon glyphicon-edit glyphicon glyphicon-white"></span> Update</button>

                  </div>
            </div>                                                                                                
        </div>    

        <div class="info">
            <p><span class="glyphicon glyphicon-globe">
            </span><span class="title">City:</span> <input type="text" id="fname" name="address" value="{{$user->address}}"> 
            <span class="title">Town:</span> <input type="text" id="fname" name="town" value=" {{$user->town}}"></p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> 
            <span class="title">Date of birth:</span> <input type="date" id="fname" name="birth" value="{{$user->birth}}"> </p>       
                                     
        </div>                              
    </div>
{!! Form::close() !!}
@endsection