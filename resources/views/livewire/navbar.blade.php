<div class="fixed w-full top-0 z-50">
	@if (Route::has('login'))
	    <div class="flex items-center flex-wrap bg-white text-black p-3 border-b border-gray-300 shadow">
	        <div class="flex-1 ">
	        	<a href="{{route('diskusi.index')}}">
		            <h1 class="flex text-2xl font-bold md:ml-12 items-center">
		                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
		                <span class="text-3xl ml-2">Discuss</span>
		            </h1>
	            </a>
	        </div>

	        <div class="justify-end md:mr-12">
	            @auth
	            	<div class="flex items-center">
	            	
	                	<a class="font-bold mr-2 "href="{{ url('/home') }}">Home</a>
	                	<a class="font-bold" href="{{ route('logout') }}"
	                       onclick="event.preventDefault();
	                                     document.getElementById('logout-form').submit();">
	                        {{ __('Logout') }}
	                    </a>
	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                        @csrf
	                    </form>
	            	</div>
	                
                    
                                
	            @else
	                <a href="{{ route('login') }}" class="font-bold mr-2">Login</a>
	                @if (Route::has('register'))
	                    <a href="{{ route('register') }}" class="font-bold">Register</a>
	                @endif
	            @endauth
	        </div>
	    </div>
	@endif
</div>