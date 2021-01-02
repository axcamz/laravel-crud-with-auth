<nav class="bg-black">
    <div class="flex flex-col lg:flex-row lg:px-0 px-3 py-2 lg:py-4  lg:container lg:mx-auto">
        <div class="flex  items-center justify-between">
            <div class="font-bold text-xl lg:text-3xl text-white">Friday.</div>
            <button class="lg:hidden focus:outline-none" id="trigger">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="35" height="35"  viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg class="icon hidden" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="lg:flex items-center w-full justify-end lg:mt-0 mt-2 text-white nav-link hidden" id="nav-link">
            <div class="flex lg:flex-row flex-col">
                <div class="lg:ml-5"><a href="/">home</a></div>
                <div class="lg:ml-5 mb-3 lg:mb-0"><a href="{{ route('posts.getAllPost') }}">posts</a></div>
                {{-- <div class="ml-5"><a href="">about</a></div> --}}
                {{-- <div class="ml-5"><a href="">contact</a></div> --}}
            </div>
            <div class="lg:ml-10 lg:w-auto w-1/2">
                @guest
                    @if (request()->is('login'))
                    <div><a href="{{ route('register') }}" class=" font-semibold text-lg bg-white text-black px-2 py-1 rounded" >Sign Up</a></div>
                    @else
                    <div><a href="{{ route('login') }}" class=" font-semibold text-lg bg-white text-black px-2 py-1 rounded" >Log in</a></div>
                    @endif
                @else
                    <div class="dropdown flex justify-between items-center text-lg bg-white text-black px-2 py-1 rounded">
                        <p class="mr-5 md:text-base text-sm">{{ Auth::user()->name }}</p>
                        <svg class="dropdown-icon" width="20" height="20" viewBox="-50 0 550 400">
                            <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                            c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                            c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                        </svg>
                        <div class="dropdown-items rounded">
                            <div class="py-1 px-2 link hover:bg-black hover:text-white">
                                <a href="#">Profile</a>
                            </div>
                            <div class="py-1 px-2 link hover:bg-black hover:text-white">
                                <a class="logout" href="#">Logout</a>
                            </div>
                            <p class="px-2 py-2 text-xs whitespace-nowrap cursor-default hidden lg:block">click Esc to close</p>
                        </div>
                        <form action="{{ route('logout') }}" method="post" id="logout" class="hidden">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
