<html>
@include('components.head')

<body>
    @include('components.navbar')
    <!-- Contract detail -->
    <br>
    <div>
        <h1 class="text-center text-4xl mx-2 sm:mx-auto">Contract n° {{$contract->id}}</h1>
    </div>
    <br>
    @if(!($contract->rinovate))
    <div class="w-full flex justify-center">
                <p class="text-red-600 font-medium text-lg inline-flex items-center">This contract is dismissed</button>
            </div>
            <br>
    @endif
    <div>
    <p id="details" class="text-gray-700 text-center sm:text-xl">Your contract's details</p>
    </div>

    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                <div  class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm2 4a3 3 0 0 0-3 2v.2c0 .1-.1.2 0 .2v.2c.3.2.6.4.9.4h6c.3 0 .6-.2.8-.4l.2-.2v-.2l-.1-.1A3 3 0 0 0 10 14H7.9Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class=" text-lg font-normal text-gray-500 mb-4">
                        @if ($contract->energyType == "G")
                            We provide gas to
                        @elseif ($contract->energyType == "E")
                            We provide electricity to
                        @else
                            We provide gas and electricity to
                        @endif
                    </p>
                    <h3 class=" mb-2 text-xl font-normal">{{Auth::user()->ragSoc}}</h3>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.5a6 6 0 0 1 1.5 4v4a1 1 0 1 1-2 0v-4a4 4 0 0 0-4-4h-.5C5 6 3 8 3 10.5V16c0 .6.4 1 1 1h7v3c0 .6.4 1 1 1h2c.6 0 1-.4 1-1v-3h5c.6 0 1-.4 1-1v-6a4 4 0 0 0-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z"/>
                            />
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Where</p>
                    <h3 class="mb-2 text-xl font-normal">{{$contract->street}}, {{$contract->civicNumber}}</h3>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="m5.5 7.7 1-2.7h11A56 56 0 0 1 19 9.7v.6l-.3.4a1 1 0 0 1-.4.2.8.8 0 0 1-.6 0 1 1 0 0 1-.4-.2l-.2-.4-.1-.6a1 1 0 1 0-2 0c0 .4-.1.7-.3 1a1 1 0 0 1-.7.3.9.9 0 0 1-.7-.3c-.2-.3-.3-.6-.3-1a1 1 0 1 0-2 0c0 .4-.1.7-.3 1a1 1 0 0 1-.7.3.9.9 0 0 1-.7-.3c-.2-.3-.3-.6-.3-1a1 1 0 0 0-2 0 1.5 1.5 0 0 1-.2.8l-.1.2a1 1 0 0 1-.4.2L6 11a1 1 0 0 1-.5-.3h-.1c-.2-.3-.4-.6-.4-1v-.2l.1-.5.4-1.3ZM4 12l-.1-.1A3.5 3.5 0 0 1 3 9.7l.2-1.2a26.3 26.3 0 0 1 1.4-4.2A2 2 0 0 1 6.5 3h11a2 2 0 0 1 1.8 1.2A58 58 0 0 1 21 9.7a3.5 3.5 0 0 1-.8 2.3l-.2.2V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4c0 .6-.4 1-1 1H6a2 2 0 0 1-2-2v-6.9Zm9 2.9c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Provider</p>
                    <h3 class="mb-2 text-xl font-normal">{{$contract->ragSoc}}</h3>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Customer type</p>
                    <h3 class="mb-2 text-xl font-normal capitalize">{{$contract->type}}</h3>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 5a2 2 0 0 0-2 2v10c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M5 14c0-.6.4-1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0c0-.6.4-1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Payment type</p>
                    <h3 class="mb-2 text-xl font-normal">{{$contract->paymentType}}</h3>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.5 8.7a2.5 2.5 0 0 1 3.5 0 2.5 2.5 0 0 1 0 3.5l-1.1 1a1 1 0 0 0-.2-.2l-3-3-.3-.2 1.1-1Zm-2.4 2.5L7.3 14a1 1 0 0 0-.3.7v2c0 .6.4 1 1 1h2c.3 0 .5 0 .7-.3l2.8-2.8-.2-.2-3-3-.2-.2Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M7 3c.6 0 1 .4 1 1v1h3V4a1 1 0 1 1 2 0v1h3V4a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7c0-1.1.9-2 2-2h1V4c0-.6.4-1 1-1Zm10.7 8H19v8H5v-8h3.9l.5-.5c.2-.3.5-.4.9-.3 0 0 .2.1.2 0V10a1 1 0 0 1 .2-.9l1.1-1a3.5 3.5 0 0 1 4.9 0 3.5 3.5 0 0 1 1 2.9Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Activation date</p>
                    <h3 class="mb-2 text-xl font-normal">{{$contract->date}}</h3>
                </div>

                @if ($contract->energyType == 'E' || $contract->energyType == 'EG')
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600  lg:w-6 lg:h-6" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 4a7 7 0 0 1 12 5c0 2.4-1.2 3.9-2.2 5v.1c-1 1.3-1.8 2.2-1.8 3.9 0 .6-.4 1-1 1h-4a1 1 0 0 1-1-1c0-1.6-.8-2.6-1.8-3.9C6.2 12.8 5 11.4 5 9a7 7 0 0 1 2-5Zm2 17c0-.6.4-1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1Zm1.6-13.4A2 2 0 0 1 12 7a1 1 0 1 0 0-2 4 4 0 0 0-4 4 1 1 0 0 0 2 0c0-.5.2-1 .6-1.4Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Forniture tension</p>
                    <h3 class="mb-2 text-xl font-normal">220V</h3>
                </div>

                <div class="grid grid-cols-1 justify-items-center text-center">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                            <svg class="w-5 h-5  lg:w-6 lg:h-6 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                            </svg>
                    </div>
                    <p class="text-lg font-normal text-gray-500 mb-4">Available power</p>
                    <h3 class="mb-2 text-xl font-normal">{{$contract->KWh}} KW</h3>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mb-8 lg:mb-16">
                <p id="consumption" class="text-gray-700 text-center sm:text-xl">Your latest consumption</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">57 W</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Monthly consumption</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">691.2 W</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Annual estimate</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">122.36 €</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Monthly cost</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">1357.89 €</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Annual estimate</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">034546</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Bill number</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">31/03</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Date of issue</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">March</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Period</p>
                </div>
                <div class="grid grid-cols-1 justify-items-center text-center">
                    <h3 class="mb-2 text-lg font-normal">18/04</h3>
                    <p class="text-base font-normal text-gray-500 mb-4">Payment deadline</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="hidden py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            @include('components.charts.chart')
        </div>
    </section>

    <section class="mb-16 pt-8 px-4 mx-auto max-w-screen-xl sm:pt-16 lg:px-6">
    <div class="mb-8 lg:mb-16">
                <p id="invoices" class="text-gray-700 text-center sm:text-xl">Old invoices</p>
            </div>
    <div class="overflow-x-auto flex justify-center">
        <div class="w-11/12 sm:w-10/12 text-base text-left text-gray-500 ">
            <div class="grid justify-items-center items-center grid-cols-3 sm:grid-cols-5 font-medium text-gray-900 bg-gray-200 h-10 rounded-t-md">
                <div>Bill Number</div>
                <div>Period</div>
                <div class="hidden sm:block">Date of payment</div>
                <div class="hidden sm:block">Amount</div>
                <div>PDF</div>
            </div>
            <div class="h-fit max-h-44 sm:max-h-60 overflow-y-auto rounded-b-md">

                @foreach ($invoices as $invoice)
                <div class="bg-gray-50 grid justify-items-center items-center grid-cols-3 sm:grid-cols-5 text-xs text-gray-700 h-12 border-b">
                    <div>{{sprintf('%08d',$invoice->id);}}</div>
                    <div>{{$invoice->month}}/{{$invoice->year}}</div>
                    <div class="hidden sm:block">10/03</div>
                    <div class="hidden sm:block">€{{number_format((float)$invoice->amount, 2)}}</div>
                    <div>
                        <a href="{{route('user.invoice', $invoice->id)}}" class="font-medium text-blue-600 hover:underline">Download</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    </section>
    <section>
        @if ($contract->rinovate)
            <div class="w-full flex justify-center">
                <button onclick="location.href='{{route('user.contract.dismiss', $contract->id)}}'" type="button" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">Dismiss Contract</button>
            </div>
            <br><br>
        @endif
    </section>
</body>

@include('components.footer')
</html>
