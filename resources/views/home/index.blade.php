 @extends('layouts.home_master')
 
@section('content-wan')

<div class ="custom-animal">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="{{ asset('image/barter.png') }}" alt="Chania">
      <div class="carousel-caption ">
        <h3>Welcome, Kabarter!!!</h3> 
      </div>
    </div>

     
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
@endsection
@section('content')
 

   @foreach ($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach ($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="{{$product->imagePath}}" alt="..." class="img-responsive">
                    <div class="caption">
                           <h3>{{ $product->title }} </h3>
                           <h4> {{ $product->category }}</h4>
                      <p>{{ $product->description }}</p>
                     

                      <div class="clearfix">
                           <a href="#" class="btn btn-danger" role="button"><i class="fas fa-hands-helping"></i></a> 
                           <a href="{{route('item.show',$product->id)}}" class="btn btn-info pull-right" role="button"><i class="btn btn-info fas fa-info"></i>More Info </a>
                           
                      </div>
             
                    </div>
                  </div>
                      </div>

            @endforeach
        </div>
    @endforeach  
@endsection

