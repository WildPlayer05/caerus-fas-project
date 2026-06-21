<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
    body {
        font-family: 'Poppins';
        font-size: 22px;
    }
</style>

<div id="navbar" class="z-50 fixed top-0 w-full lg:drop-shadow-none">
    <div class="antialiased bg-gray-100">
        <div class="w-full text-gray-700 bg-white pb-2 pt-2">
            <div x-data="{ open: false }"
                class="flex flex-col px-4 mx-auto lg:items-center lg:justify-between lg:flex-row lg:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:w-1/6">

                    <button class="rounded-lg lg:hidden focus:outline-none focus:shadow-outline" onclick="shadow()" @click="open = !open">
                        <svg transform="scale(-1,1)" fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div><a href="{{route('welcome')}}"><img class="sm:h-11 h-9 w-auto"
                                src="{{url('images/Logo.png')}}"></a></div>

                    <div class="justify-center flex lg:hidden lg:w-1/6">
                        <button onclick="openModal()"><img src="{{url('images/user-icon.png')}}" class="sm:h-11 h-9"></button>
                    </div>
                </div>
                <nav id="menu" :class="{'flex': open, 'hidden': !open}"
                    class="flex-col flex-grow hidden pb-4 lg:pb-0 lg:flex lg:justify-center lg:flex-row">
                    <a class="align-middle text-center px-4 py-2 mt-2 text-base font-normal bg-transparent rounded-lg lg:mt-0 lg:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{route('ourvision')}}">Our Vision</a>
                    <a class="align-middle text-center px-4 py-2 mt-2 text-base font-normal bg-transparent rounded-lg lg:mt-0 lg:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{route('product')}}">Product</a>
                    <a class="align-middle text-center px-4 py-2 mt-2 text-base font-normal bg-transparent rounded-lg lg:mt-0 lg:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{route('user.dashboard')}}">Dashboard</a>
                    <a class="align-middle text-center px-4 py-2 mt-2 text-base font-normal bg-transparent rounded-lg lg:mt-0 lg:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{route('joinus')}}">Join Us</a>
                    <a class="align-middle text-center px-4 py-2 mt-2 text-base font-normal bg-transparent rounded-lg lg:mt-0 lg:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{route('aboutus')}}">About Us</a>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full lg:max-w-screen-sm lg:w-screen mt-2 origin-top-right">
                    </div>
                </nav>

                <div class="justify-center lg:flex hidden lg:w-1/6">
                    <button onclick="openModal()"><img src="{{url('images/user-icon.png')}}" class="sm:h-11 h-9"></button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.modal')
<script>
    let i = 0;
    let menu = document.getElementById("menu");

    function shadow() {
        const navbar = document.getElementById("navbar");

        if (i == 0) {
            navbar.classList.add("drop-shadow-xl");
            i = 1;
        } else {
            navbar.classList.remove("drop-shadow-xl");
            i = 0;
        }
    }
</script>
<div class="pb-[52px]"></div>
