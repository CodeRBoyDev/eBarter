<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ URL::to('css/login.css') }}">
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome, Ka-Barter!</h3>
                        <p>"e-Barter , Your Barter Buddy"</p>
                     <a href="{{URL('signin')}}"><b>Login</b></a>            
                    </div>
                    <div class="col-md-9 register-right">
                    {!!Form::open(['route'=>['user.postSignup'],'enctype'=>'multipart/form-data'])!!}  
                    {{ csrf_field() }}
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">SIGNUP AS KA-BARTER</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    @if($errors->has('fname'))
              <small style="color:red;" >{{$errors->first('fname')}}</small>
              @endif
                                        <div class="form-group">
                                            <input type="text" name="fname" value="{{old('fname')}}"  class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                       
              @if($errors->has('lname'))
              <small style="color:red;" >{{$errors->first('lname')}}</small>
              @endif
                                        <div class="form-group">
                                            <input type="text" name="lname" value="{{old('lname')}}"  class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        
              @if($errors->has('gender'))
              <small style="color:red;" >{{$errors->first('gender')}}</small>
              @endif
                                        <div class="form-group">
                                        {!! Form::radio('gender','Male') !!} Male {!! Form::radio('gender','Female') !!} Female
                                        </div>
                                      
              @if($errors->has('birth'))
              <small style="color:red;" >{{$errors->first('birth')}}</small>
              @endif
                                        <div class="form-group">
                                           <label>Birth Date:</label>
                                            <input type="date" name="birth" value="{{old('birth')}}" class="form-control" placeholder="Birth Date *" value="" />
                                        </div>
                                        
              @if($errors->has('password'))
              <small style="color:red;" >{{$errors->first('password')}}</small>
              @endif
                                        <div class="form-group">
                                            <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                     
            
                                        
                                    </div>
                                    <div class="col-md-6">
                                    @if($errors->has('email'))
              <small style="color:red;" >{{$errors->first('email')}}</small>
              @endif
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Your Email *" value="" />
                                        </div>
                             
              @if($errors->has('phone'))
              <small style="color:red;" >{{$errors->first('phone')}}</small>
              @endif
                                        <div class="form-group">
                                            <input type="text" minlength="10" name="phone" value="{{old('phone')}}" maxlength="12"  class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        
              @if($errors->has('address'))
              <small style="color:red;" >{{$errors->first('address')}}</small>
              @endif

                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" value="{{old('address')}}"  placeholder="Your Address *" value="" />
                                        </div>
                                   
              @if($errors->has('town'))
              <small style="color:red;" >{{$errors->first('town')}}</small>
              @endif

                                        <div class="form-group">
                                            <input type="text" name="town" class="form-control" value="{{old('town')}}" placeholder="Your Town *" value="" />
                                        </div>

                                        
              @if($errors->has('zipcode'))
              <small style="color:red;" >{{$errors->first('zipcode')}}</small>
              @endif

                                        <div class="form-group">
                                            <input type="text" minlength="10" name="zipcode" maxlength="10" value="{{old('zipcode')}}"  class="form-control" placeholder="Zipcode *" value="" />
                                        </div>
                                       


                                        <input type="hidden" id="role" name="role" value="customer">

                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                           
                        </div>
                    </div>
                </div>

            </div>
            