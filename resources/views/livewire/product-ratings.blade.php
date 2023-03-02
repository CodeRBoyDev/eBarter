<section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                    @if ( Session::has('fail'))
      <div class="alert alert-success">
        <p>{{ Session::get('fail') }}</p>
      </div><br />
     @endif         
           
    <div class="profile clearfix">                            
        <div class="image">
            <img src="{{asset($userss->coverphoto)}}" class="img-cover">
        </div>                            
        <div class="user clearfix">
            <div class="avatar">
                <img src="{{asset($userss->profilephoto)}}" class="img-thumbnail img-profile">
            </div>                                
            <h2>{{$userss->name}} {{$userss->lname}}</h2>   
        @if($userId == true)
        {!!Form::open(['route'=>['user.unfollow'],'enctype'=>'multipart/form-data'])!!}                             
            <div class="actions">
                <div class="btn-group">
                <!-- {{ csrf_field() }} -->
                <input type="hidden" id="custId" name="follow_id" value="{{$userss->id}}">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-check glyphicon glyphicon-white"></span> Following</button>
                    {!! Form::close() !!}
                    <a href="{{URL('chatify')}}"  class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</a>
                </div>
            </div>                                                                                                
        </div>  
        @elseif($userId == false) 
            {!!Form::open(['route'=>['user.follow'],'enctype'=>'multipart/form-data'])!!}                             
            <div class="actions">
                <div class="btn-group">
                <!-- {{ csrf_field() }} -->
                <input type="hidden" id="custId" name="follow_id" value="{{$userss->id}}">
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-plus glyphicon glyphicon-white"></span> Follow</button>
                    {!! Form::close() !!}
                    <button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Send message"><span class="glyphicon glyphicon-envelope glyphicon glyphicon-white"></span> Message</button>
                </div>
            </div>                                                                                                
        </div>
        @else($userId == 'guest')  
        none

        @endif
           
                                
        <div class="info">
 
        <p><span class="glyphicon glyphicon-user"></span> <span class="title">User Rating:</span> {{$totalRatings}}/5</p>       
            <p><span class="glyphicon glyphicon-globe"></span> <span class="title">{{$userss->address}}</span>, {{$userss->town}}</p>                                    
            <p><span class="glyphicon glyphicon-gift"></span> <span class="title">Date of birth:</span> {{$userss->birth}}</p>       
                                     
        </div>                              
    </div>


        <div class="container">
          <div class="row">
              <div class="col-sm-8">
                  <img src="{{asset($item->imagePath)}}" class="img-responsive" alt="">
                </div>
                <div class="col-sm-4">
                    <div class="box">
                    Product: {{ $item->title }}
                    Description: {{ $item->description }}
                    </div>
                    <div class="box">
            <ul class="list-unstyled">
                <li><button class="btn btn-default btn-sm tip btn-responsive" title="" data-original-title="Add to friends"><span class="glyphicon glyphicon-handshake glyphicon glyphicon-white"><i class="fas fa-handshake"></i>BARTER</li></button>
                          <li><i class="fa fa-calendar"></i>{{ $item->created_at->toDateString()}}</li>
                            <li><a href="#tab1" data-toggle="tab"><i class="fa fa-comment"></i>{{$count}} Feedback</a></li>
                            @if($report == true) 
                            <em><li><i class="fa fa-check-circle" style="color: #4BB543;"></i> Reported</li></em>
                            
                            @else  
                            <li><a onclick="openModal()" data-toggle="modal" data-target="#{{$item->id}}"><i class="fa fa-exclamation-circle"></i> Report</a></li>
                            
                            @endif
                    </div>
                </div>


                
                <style>
		.animated {
			-webkit-animation-duration: 1s;
			animation-duration: 1s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}

		.animated.faster {
			-webkit-animation-duration: 500ms;
			animation-duration: 500ms;
		}

		.fadeIn {
			-webkit-animation-name: fadeIn;
			animation-name: fadeIn;
		}

		.fadeOut {
			-webkit-animation-name: fadeOut;
			animation-name: fadeOut;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		@keyframes fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}
	</style>


	<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
		style="background: rgba(0,0,0,.7);">
		<div
			class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
			<div class="modal-content py-4 text-left px-6">
				<!--Title-->
				<div class="flex justify-between items-center pb-3">
					<p class="text-2xl font-bold">Report</p>
					<div class="modal-close cursor-pointer z-50">
						<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
							viewBox="0 0 18 18">
							<path
								d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
							</path>
						</svg>
					</div>
				</div>
                {!!Form::open(['route'=>['user.report'],'enctype'=>'multipart/form-data'])!!}   
{{ csrf_field() }}
				<div class="my-5">
                <input type="hidden" id="custId" name="owner_id" value="{{$userss->id}}">
                <input type="hidden" id="custId" name="item_id" value="{{ $item->id }}">
                <label for="report_description">Select a report: </label>
                                                <select name="report_description" class="form-control">
                                                  <option>Inaccurate Description</option>
                                                  <option>Promoting a business</option>
                                                  <option>Abusive or Harmful Content</option>
                                                  <option>No Itent to Barter</option>
                                                  <option>Weapon or Drugs Barter</option>
                                                  <option>Sexualized Content</option>
                                                  <option>Scam</option>
                                                </select>
				</div>
                <footer class="flex justify-center p-2">
            <button
              class="bg-red-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"
              
            >
              Report
            </button>
          </footer>
			</div>
		</div>
	</div>
    {!! Form::close() !!}

	<script>
		const modal = document.querySelector('.main-modal');
		const closeButton = document.querySelectorAll('.modal-close');

		const modalClose = () => {
			modal.classList.remove('fadeIn');
			modal.classList.add('fadeOut');
			setTimeout(() => {
				modal.style.display = 'none';
			}, 500);
		}

		const openModal = () => {
			modal.classList.remove('fadeOut');
			modal.classList.add('fadeIn');
			modal.style.display = 'flex';
		}

		for (let i = 0; i < closeButton.length; i++) {

			const elements = closeButton[i];

			elements.onclick = (e) => modalClose();

			modal.style.display = 'none';

			window.onclick = function (event) {
				if (event.target == modal) modalClose();
			}
		}
	</script>


 

                
                
            </div>
            




        









        </div>
        

        <div>
    <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        @auth
                         @if ( Session::has('fails'))
      <div class="alert alert-success">
        <p>{{ Session::get('fails') }}</p>
      </div><br />
     @endif   
                            <div id="tab1" class="w-full space-y-5">
                                <p class="font-medium text-blue-500 uppercase">
                                    Rate this product
                                </p>
                            </div>
                            @if (session()->has('message'))
                                <p class="text-xl text-gray-600 md:pr-16">
                                    {{ session('message') }}
                                </p>
                            @endif
                            @if($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                                                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            @error('comment')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.lazy="comment" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Rate</button>
                                        @auth
                                            @if($currentId)
                                                <button type="submit" class="w-full px-3 py-4 mt-4 font-medium text-white bg-red-400 rounded-lg" wire:click.prevent="delete({{ $currentId }})" class="text-sm cursor-pointer">Delete</button>
                                            @endif
                                        @endauth
                                    </div>
                                </form>
                            @endif
                        @else
                            <div>
                                <div class="mb-8 text-center text-gray-600">
                                    You need to login in order to be able to rate the product!
                                </div>
                                <a href="/signin"
                                    class="block px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100" 
                                >Login</a>
                            </div>
                        @endauth
                    </div>
                </div>
    
            </div>
        </div>
    </section>


     <section class="w-full px-8 pt-4 pb-10 xl:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">

                <div class="w-full mt-16 md:mt-0">
                    <div class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                       

    
    <section class="relative overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Product Ratings
                    </h2>
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        {{$totalRating}}/5⭐
                    </h2>
                </div>
            </div>
            
            <div class="box-border flex grid ">
                @forelse ($comments as $comment)

                    <div class="container">
<div class="row bootstrap snippets bootdeys">
    <div class="col-md-8 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">

                
                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="{{asset($comment->user->profilephoto)}}" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                </span>
                                @<strong class="text-success">{{  $comment->user->name }} {{  $comment->user->lname }}</strong>
                                <p>"{{ $comment->comment }}"</p>
                                <p>
                                Rating: <strong>{{ $comment->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id == $comment->user_id || auth()->user()->role == 'customer' ))
                                        - <a wire:click.prevent="delete({{ $comment->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse

            </div>
    </section>
    
</div>
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




