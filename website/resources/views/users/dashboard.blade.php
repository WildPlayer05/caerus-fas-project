<html>
@include('components.head')

<body>
    @include('components.navbar')

    <br>
    <div>
        <h1 class="text-center text-4xl mx-2 sm:mx-auto">Welcome {{Auth::user()->ragSoc}}</h1>
    </div>
    <br>
    <section class="px-2 hidden">
    <div class="w-1/6 text-sm font-medium text-gray-900 border border-gray-200 rounded-lg fixed">
        <a href="#contract" aria-current="true" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:text-blue-700 ">
            Contracts
        </a>
        <a href="#carbon-footprint" class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:text-blue-700">
            Carbon Footprint
        </a>
    </div>
    </section>
    <div>
        @if(count($contracts) != 0)
            <p class="font-light text-lg text-center">Your contracts</p>
        @else
            <p class="font-light text-lg text-center">You don't have any contract yet</p>
        @endif
    </div>

    @if(count($contracts) != 0)
    <section class="bg-white" id="contract">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="space-y-8 justify-items-center grid md:grid-cols-2 lg:grid-cols-3 sm:gap-y-12 sm:space-y-0">

                @foreach ($contracts as $contract)
                @include('components.card')
                @endforeach

            </div>
        </div>
    </section>
    <div>
        <p class="font-light text-lg text-center">Your carbon footprint</p>
    </div>
    <section id="carbon-footprint">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="space-y-8 flex justify-center items-center sm:gap-y-12 sm:space-y-0">
                 @include('components.charts.carbonfootprint-chart')
            </div>
        </div>
    </section>

    @else
    <div class="h-full"></div>
    @endif

    @include('components.footer')
</body>

</html>
