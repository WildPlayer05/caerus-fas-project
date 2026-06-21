<!DOCTYPE html>
<html lang="en">
@include('components.head')

<body>
    @include('components.navbar')
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-8">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                Effortless Billing, Secure Payments</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48">Gas and energy solutions for
                a
                sustainable lifestyle.</p>
            <div class="flex flex-col space-y-4 py-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{route('signup')}}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Learn more
                </a>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
            <div class="px-4 mx-auto max-w-screen-xl text-center lg:py-8">
                <h2
                    class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl">
                    What's important for us</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50  border border-gray-200 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-indigo-100 text-indigo-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-3.5 h-3.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                clip-rule="evenodd" />
                        </svg>
                        Transparency
                    </a>
                    <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Clear billing</h2>
                    <p class="text-lg font-normal text-gray-500 mb-4">In managing your energy expenses, transparency is
                        key.
                        Clear, detailed billing ensures you understand what you're paying for, empowering better
                        financial
                        decisions. Trust and clarity are fundamental for a smooth, hassle-free experience with your gas
                        and
                        electricity payments.</p>
                    <a href="#" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">Read
                        more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
                    <a href="#"
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md mb-2">
                        <svg class="w-3.5 h-3.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8.64 4.737A7.97 7.97 0 0 1 12 4a7.997 7.997 0 0 1 6.933 4.006h-.738c-.65 0-1.177.25-1.177.9 0 .33 0 2.04-2.026 2.008-1.972 0-1.972-1.732-1.972-2.008 0-1.429-.787-1.65-1.752-1.923-.374-.105-.774-.218-1.166-.411-1.004-.497-1.347-1.183-1.461-1.835ZM6 4a10.06 10.06 0 0 0-2.812 3.27A9.956 9.956 0 0 0 2 12c0 5.289 4.106 9.619 9.304 9.976l.054.004a10.12 10.12 0 0 0 1.155.007h.002a10.024 10.024 0 0 0 1.5-.19 9.925 9.925 0 0 0 2.259-.754 10.041 10.041 0 0 0 4.987-5.263A9.917 9.917 0 0 0 22 12a10.025 10.025 0 0 0-.315-2.5A10.001 10.001 0 0 0 12 2a9.964 9.964 0 0 0-6 2Zm13.372 11.113a2.575 2.575 0 0 0-.75-.112h-.217A3.405 3.405 0 0 0 15 18.405v1.014a8.027 8.027 0 0 0 4.372-4.307ZM12.114 20H12A8 8 0 0 1 5.1 7.95c.95.541 1.421 1.537 1.835 2.415.209.441.403.853.637 1.162.54.712 1.063 1.019 1.591 1.328.52.305 1.047.613 1.6 1.316 1.44 1.825 1.419 4.366 1.35 5.828Z"
                                clip-rule="evenodd" />
                        </svg>
                        Sustainability
                    </a>
                    <h2 class="text-gray-900 text-3xl font-extrabold mb-2">Carbon footprint</h2>
                    <p class="text-lg font-normal text-gray-500 mb-4">A carbon footprint is the total amount of
                        greenhouse
                        gases that are generated by our actions. To have the best chance of avoiding a rise in global
                        temperatures, the average global carbon footprint per year needs to drop to under 2 tons by
                        2050.</p>
                    <a href="{{route('carbonFootprint')}}" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">
                        Calculate footprint
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl text-center font-extrabold text-gray-900">Designed for the people</h2>
                <p class="text-gray-500 text-center sm:text-xl">Here are a few reasons why you should choose Caerus</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12c.1 3-.2 6-1 9M7.1 4.4a9 9 0 0 1 13 3.7M3 15v-3a9 9 0 0 1 1.7-5.3m12.9 3c.3.8.4 1.5.4 2.3 0 2 0 4.2-.5 6.2M6 12a6 6 0 0 1 9.4-5M4 21a6 6 0 0 1 1-3.3 5 5 0 0 0 .8-2m8.7 2.5a14 14 0 0 1-1 2.7m-6-1.6C9 17.1 9 14.8 9 12a3 3 0 1 1 6 0v2.3M12 12c0 3 0 6-2 9" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Secure payment</h3>
                    <p class="text-lg font-normal text-gray-500 mb-4">Caerus prioritizes the security of user data and
                        transactions. We employ robust encryption protocols and secure payment gateways to safeguard
                        users'
                        financial information. </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v15c0 .6.4 1 1 1h15M8 16l2.5-5.5 3 3L17.3 7 20 9.7" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Insightful analytics</h3>
                    <p class="text-lg font-normal text-gray-500 mb-4">Caerus provides personalized suggestions and tips,
                        so
                        users can optimize their energy usage to reduce waste and lower their bills, promoting
                        sustainability while saving money.</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 8a1 1 0 0 0-1 1v10H9a1 1 0 1 0 0 2h11c.6 0 1-.4 1-1V9c0-.6-.4-1-1-1h-8Zm4 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v6h6V9a3 3 0 0 1 3-3h8c.4 0 .7 0 1 .2V5a2 2 0 0 0-2-2H5Zm4 10H3v2c0 1.1.9 2 2 2h4v-4Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">User-friendly interface</h3>
                    <p class="text-lg font-normal text-gray-500 mb-4">Caerus features a sleek and intuitive interface
                        designed for ease of use. Users can navigate the app effortlessly, accessing all features with
                        just
                        a few taps.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white border-gray-200 border-t border-b">
        <div class=" py-6 lg:py-6 mx-auto max-w-screen-xl px-4">
            <h2
                class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900  md:text-4xl">
                We are business partners with</h2>
            <div class=" text-gray-500 sm:gap-12 ">
                <a href="#" class="flex justify-center items-center">
                    <img class="h-9" src="{{url('images/terranova.png')}}">
                </a>
            </div>
        </div>
    </section>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')
    </style>
    <div class="min-w-screen py-6 flex items-center justify-center py-2">
        <div class="w-full bg-white px-5 text-gray-800">
            <div class="w-full max-w-7xl mx-auto">
                <div class="text-center max-w-xl mx-auto mb-10">
                    <h2 class="mb-4 text-4xl text-center font-extrabold text-gray-900">Testimonials</h2>
                    <p class="text-gray-500 text-center sm:text-xl">What our clients have to say about us</p>
                </div>
                <div class="-mx-3 md:flex items-start">
                    <div class="px-3 md:w-1/3">
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user1.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Michael Menegoi</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic text-gray-400 mr-1">"</span>Impressed by this
                                    app's transparency and its subtle nudges towards sustainability. It's the little
                                    things
                                    that make a big difference!<span
                                        class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
                            </div>
                        </div>
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user2.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Alessandro Monastero</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>Absolutely
                                    love how this app streamlines bill payments while keeping everything transparent.
                                    It's a
                                    game-changer!<span
                                        class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 md:w-1/3">
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user3.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Thomas Panforte</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>This
                                    app
                                    redefines bill payment: easy, transparent, and user-friendly. Seamlessly manage
                                    bills
                                    while supporting sustainability. A must-have for conscious consumers.<span
                                        class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
                            </div>
                        </div>
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user4.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Lorenzo Giacomazzi</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>Efficient
                                    and user-friendly. Simplifies bill management effectively. Highly recommended for
                                    ease.<span class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 md:w-1/3">
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user5.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Mattia Albertini</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>Love the design and intuitive interface! Makes navigating so effortless.<span
                                        class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
                            </div>
                        </div>
                        <div
                            class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light mb-6">
                            <div class="w-full flex mb-4 items-center">
                                <div class="overflow-hidden rounded-full w-10 h-10 bg-gray-50 border border-gray-200">
                                    <img src="images/users/user6.jpg" alt="">
                                </div>
                                <div class="flex-grow pl-3">
                                    <h6 class="font-normal text-md text-gray-800">Gaia Zanotti</h6>
                                </div>
                            </div>
                            <div class="w-full">
                                <p class="text-sm leading-tight"><span
                                        class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>This app is a lifesaver! So glad I discovered it - it's made paying bills so much easier.<span
                                        class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (env('MEME'))
    <div id="bottom-banner" tabindex="-1" class="fixed bottom-0 start-0 z-50 flex justify-between w-full p-4 border-t border-gray-200 bg-gray-50">
        <div class="flex items-center mx-auto">
            <p class="flex items-center text-sm font-normal text-gray-500">
            <span class="inline-flex p-1 me-3 bg-gray-200 rounded-full w-6 h-6 items-center justify-center">
                <svg class="w-3.5 h-3.5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2"/>
                </svg>
                <span class="sr-only">Discount</span>
            </span>
                <span>Donate for a new NAS<a href="https://www.youtube.com/watch?v=poa_QBvtIBA" class="flex items-center ms-0 text-sm font-medium text-blue-600 md:ms-1 md:inline-flex hover:underline">Become a donor <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg></a></span>
            </p>
        </div>
        <div class="flex items-center">
            <button data-dismiss-target="#bottom-banner" type="button" class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    </div>
    @endif

    @include('components.footer')
</body>

</html>

@if (env('ALERT'))
<script>
alert("ATTENZIONE: \nQuesto è un progetto scolastico, non siamo una vera azienda. \nNon registratevi!");
</script>
@endif
