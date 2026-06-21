<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
    @include('components.navbar')

    <br>
    <div>
        <h1 class="text-center text-4xl mx-2 sm:mx-auto">Our Vision</h1>
        <br>
        <p class="font-light text-lg text-center">What is important for us </p>
    </div>

<section class="bg-white">
        <div class="pt-8 px-4 mx-auto max-w-screen-xl lg:pt-16">
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-8 md:p-12">
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
                <div class="place-self-center">
                    <img class="border rounded-lg" src="{{url('images/Mulino-a-vento.jpg')}}">
                </div>
            </div>
        </div>

        <div class="py-8 sm:py-16 px-4 mx-auto max-w-screen-xl">
            <div class="grid md:grid-cols-2 gap-8">
            <div class="place-self-center">
                    <img class="border rounded-lg" src="{{url('images/Mulino-a-vento.jpg')}}">
                </div>
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
</section>
    







    @include('components.footer')
</body>
</html>
