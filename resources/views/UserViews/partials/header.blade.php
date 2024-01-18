    <header id="header" class="header-scrolled">
			<div class="header-top">
				  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="{{asset('userpluggins/coffe/img/logo.png')}}" alt="" title=""></a>
				      </div>
					  
				      <nav id="nav-menu-container">
					  <ul class="nav-menu">
				          <li class=><a href="{{url('homee')}}">Home</a></li>
				          <li><a href="{{route('menu')}}">Menu</a></li>
				          <li><a href="{{url('about')}}">About</a></li>
				          <li><a href="{{url('booking-create')}}">booking</a></li>
				          <li><a href="{{url('cart')}}">cart</a></li>
						
				          <!-- <li class="menu-has-children"><a href="" class="sf-with-ul">Pages</a>
				            <ul style="display: none;">
				              <li><a href="generic.html">Generic</a></li>
				              <li><a href="elements.html">Elements</a></li>
				            </ul>
				          </li> -->
				        </ul>
                     </nav>
					 
                        @guest
                            @if (Route::has('login'))
                            <a href="{{route('login')}}" class="nav-item nav-link">login /</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{route('register')}}" class="nav-item nav-link">register</a>
                           @endif
                        @else
                        <div class="nav-item dropdown">
                     
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="dropdown-item">logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                            </form>   
                            </div>
                        </div>
                        @endguest
				   <!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</div>
			 </header>