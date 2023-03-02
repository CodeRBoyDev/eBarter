@extends('layouts.base')
@section('body')

<div class="container">
<h1>Search</h1>

There are {{ $searchResults->count() }} results.

@foreach($searchResults->groupByType() as $type => $modelSearchResults)
   <h2>{{ $type }}</h2>
   
   @foreach($modelSearchResults as $searchResult)
                              <div class="card trending-item">
                                  <div class="trending-card"> 
                                          <p class="title">{{ $searchResult->title }}</p>
                                          <a href="{{ $searchResult->url }}"> View Profile  </a> 
                                    </div>
                                </div>    
                                       
   @endforeach
@endforeach

</div>    
@endsection

