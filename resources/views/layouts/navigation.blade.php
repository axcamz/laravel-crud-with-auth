<nav class="bg-black">
    <div class="lg:container lg:mx-auto py-3 px-3 flex justify-between items-center">
        <div class="font-bold text-3xl text-white">Diary.</div>
        <ul class="flex text-white justify-between items-center">
            <li class="ml-5"><a href="">home</a></li>
            <li class="ml-5"><a href="">posts</a></li>
            {{-- <li class="ml-5"><a href="">about</a></li> --}}
            {{-- <li class="ml-5"><a href="">contact</a></li> --}}
            @auth
            <li>
                <div class="dropdown flex items-center ml-20 text-lg bg-white text-black px-2 py-1 rounded" >
                    <p class="mr-5 md:text-base text-sm">{{ Auth::user()->name }}</p>
                    <div>
                        <svg  width="25" height="25" viewBox="0 0 500 500">
                            <path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751
                            c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0
                            c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/>
                        </svg>
                    </div>
                    <ul class="dropdown-items rounded">
                        <li class="py-1 px-2"><a href="#">Profile</a></li>
                        <li class="py-1 px-2"><a href="#">Logout</a></li>
                    </ul>
                </div>
            </li>
            @else
            <li><a href="{{ route('login') }}" class="ml-20 font-semibold text-lg bg-white text-black px-2 py-1 rounded" >Log in</a></li>
            @endauth
        </ul>
    </div>
</nav>
