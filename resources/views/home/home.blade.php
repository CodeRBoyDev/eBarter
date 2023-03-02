@extends('layouts.base')
@section('body')

 
<div class ="custom-animal">
 
<div id="mycarousel" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner" role="listbox">


            <div class="item">

                    <img  class="slider-img img-circle " , src="{{ asset('image/barter.png') }}">
                    
                    <div class="carousel-caption slide-text">
                        <h3>Welcome, Kabarter!!!</h3>
                    
                    </div>
                    
            </div> 
 

            <div class="item">

                    <img  class="slider-img img-circle " , src="{{ asset('image/barter.jpg') }}">
                    
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
                    @foreach($products as $product) 
                                    <div class="card trending-item">
                                         <div class="trending-card">
                                       
                                             <img  class="display-dog" src="{{$product->imagePath}}"   >
                                                
                                        
                                                    <p class="title">Product Title:{{ $product->title }}</p>
                                                        <p>Category:{{$product->category }}</p> 
                                                        <p>Description:{{ $product->description }}</p> 
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $product->location }}</p> 
                                                        <div class="clearfix">  
                                                                <button style="border: none; background-color:red; " class="btn btn-info fas fa-hands-helping  pull-left" data-toggle="modal" data-target="#{{$product->id}}">
                                    
                                                                </button> 
                                                            <!-- User Form Modal -->
                                                            <div class="modal fade" role="dialog" tabindex="-1" id="{{$product->id}}">
                                                                <div class="modal-dialog " role="document">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <h4 class="modal-title" style="margin-left:37%"><i>Requesting Barter Mode</i></h4>
                                                                                    {{ Form::Open(['route' => 'barter.request']) }}
                                                                                    <div class="row">
                                                                                    <div class="column">
                                                                                        
                                                                                    <input type="hidden" id="item_id" name="item_id" value="{{$product->id}}">
                                                                                    <input type="hidden" id="user_id" name="user_id" value="{{$product->user_id}}">

                                                                                    {{ Form::label('mode' , 'Barter Mode')}}
                                                                                    {{Form::select('mode', ['delivery' =>'Delivery', 'meetup' =>'MeetUp'], null, ['class' => ' register-text form-control' , "placeholder" => "Select mode..."])}}                                                           
                                                                                    
                                                                                    </div>
                                                                                    <div class="column">
                                                                                    {{ Form::label('meetup' , 'Meeting Place')}}
                                                                                    {{ Form::text('meetup' ,'' , ['class' => 'form-control register-text' , "placeholder" => "Enter your prefer Meeting Place"] ) }}
                                                                                    <span style ="color:red">@error('zipcode'){{$message}}@enderror</span>

                                                                                    {{ Form::submit('Submit' ,['class' => 'btn btn-warning btn-submit register-text' ] )}}
                                                                                    </div> 
                                                                                    </div>       
                                                                                
                                                                                    {!!Form::close()!!}
                                                                                    </div> 
                                                                                </div>
                                                                </div>
                                                            </div>
                                                                <a href="{{route('item.show',$product->id)}}" class="btn btn-info pull-right" role="button"><i class="fas fa-info"></i>  Info </a>
                                                                
                                                        </div>
                                                   
                                        </div>
                                    </div>                   
                        @endforeach      
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

            @if(Session::has('success'))
            <script>
                    swal("Successfully!" , "{!! Session::get('success')!!}" ,"success",{Button:"ok"}); 
            </script>
            @endif

            
            @if(Session::has('error'))
            <script>
            swal({
                title: "Permission Denied",
                text: "{!! Session::get('error')!!}",
                icon: "warning",
                button: "Ok",
             });
            </script>
            @endif

                   

  
</div>
<script>
        document.querySelector('.carousel-inner > div:first-child').classList.add('active');
</script>
<style>
    .postbarter
    {
     
    }
</style>
@endsection