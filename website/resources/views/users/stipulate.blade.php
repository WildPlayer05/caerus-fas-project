@include('components.head')

<body class="bg-white">
    @include('components.navbar')
    <main class="h-auto">

        <h1 class="text-center text-4xl mx-2 sm:mx-auto mt-8 ">Stipulate Contract</h1>
        <div class="space-y-8 flex justify-center h-auto">
            <section class="bg-white h-auto grid grid-cols-1 sm:w-10/12 lg:grid-cols-5">
                <div class="col-span-3 px-4 py-8 w-full">


                    <form method="post" action="{{route('user.store', $contract->id)}}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 sm:mb-5">
                            <div class="sm:col-span-2"></div>
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                                    Type</label>
                                <select id="type" name="paymentType"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="transfer">Transfer</option>
                                    <option value="cc">Credit Card</option>
                                </select>
                            </div>
                            <div>
                                <label for="energyType"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Building</label>
                                <select onchange="disableForm()" id="building" name="building"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="none" disabled selected>Select A Building</option>
                                    <option value="add">Add New Building</option>
                                    @foreach ($buildings as $building)
                                    <option value="{{$building->id}}">{{$building->street}}, {{$building->civicNumber}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="PriceE" class="block mb-2 text-sm font-medium text-gray-900">Insert the name
                                    of your city</label>
                                <input disabled type="text" name="city" id="city"
                                    class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200"
                                    value="" placeholder="" required>
                                <div class="text-red-500 text-sm">
                                    @error('city')
                                    {{ $message}}
                                    @enderror
                                </div>
                            </div>


                            <div class="w-full">
                                <label for="PriceE" class="block mb-2 text-sm font-medium text-gray-900">Insert your
                                    CAP</label>
                                <input disabled type="text" name="CAP" id="CAP"
                                    class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200"
                                    value="" placeholder="" required>
                                <div class="text-red-500 text-sm">
                                    @error('CAP')
                                    {{ $message}}
                                    @enderror
                                </div>
                            </div>


                            <div class="w-full">
                                <label for="PriceE" class="block mb-2 text-sm font-medium text-gray-900">Insert the name
                                    of your street</label>
                                <input disabled type="text" name="street" id="street"
                                    class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200"
                                    value="" placeholder="" required>
                                <div class="text-red-500 text-sm">
                                    @error('street')
                                    {{ $message}}
                                    @enderror
                                </div>
                            </div>


                            <div class="w-full">
                                <label for="PriceE" class="block mb-2 text-sm font-medium text-gray-900">Insert yout
                                    civic number</label>
                                <input disabled type="text" name="civicNumber" id="civicNumber"
                                    class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200"
                                    value="" placeholder="" required>
                                <div class="text-red-500 text-sm">
                                    @error('civicNumber')
                                    {{ $message}}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 flex justify-center space-x-4">
                            <button type="submit"
                                class="text-gray-600 inline-flex items-center hover:text-white border border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-5 h-5 mr-1 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Stipulate Contract

                            </button>
                            <button onclick="location.href='{{route('product')}}'" type="button"
                                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Delete Draft
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-span-2 w-full flex justify-center items-center -mt-24 hidden lg:flex">
                    @include('components.productCard', array('link' => false))
                </div>
            </section>

        </div>
    </main>
    @include('components.footer')
</body>
<script>
    window.onload = disableForm();

    function disableForm() {
        const building = document.getElementById("building").value;

        if (building == 'add') {
            document.getElementById("city").removeAttribute("disabled");
            document.getElementById("street").removeAttribute("disabled");
            document.getElementById("CAP").removeAttribute("disabled");
            document.getElementById("civicNumber").removeAttribute("disabled");
        } else {
            document.getElementById("city").setAttribute("disabled", "");
            document.getElementById("street").setAttribute("disabled", "");
            document.getElementById("CAP").setAttribute("disabled", "");
            document.getElementById("civicNumber").setAttribute("disabled", "");
        }
    }
</script>
