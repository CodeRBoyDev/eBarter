@extends('layouts.base')
@section('body')

<div class="col-sm-8  left-col">
                    @foreach($requests as $product) 
                                    <div class="card trending-item">
                                         <div class="trending-card">
                                       
                                             <img  class="display-dog" src="{{$product->items->imagePath}}"   >
                                                
                                        
                                                    <p class="title">Product Title:{{ $product->items->title }}</p>
                                                        <p>Category:{{$product->items->category }}</p> 
                                                        <p>Description:{{ $product->items->description }}</p> 
                                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $product->items->location }}</p> 
                                                        <div class="clearfix"> 
                                                     

                                                        {!!Form::open(['route'=>['cancel'],'enctype'=>'multipart/form-data'])!!}
                                                            <input type="hidden" id="item_id" name="item_id" value="{{$product->id}}">
                                                                                            {{ csrf_field() }}
                                                            <button type="submit" title="delete" style="border: none;">Cancel</i>
                                                            </button> 
                                                        {!! Form::close() !!}

                                                                <a href="{{route('item.show',$product->items->id)}}" class="btn btn-info pull-right" role="button"><i class="fas fa-info"></i>  Info </a>
                                                                
                                                        </div>
                                                   
                                        </div>
                                    </div>                   
                        @endforeach      
</div> 
@endsection