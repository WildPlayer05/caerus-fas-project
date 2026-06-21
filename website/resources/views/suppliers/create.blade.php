@include('components.head')
<body class="bg-gray-50">
<div class="antialiased">

    @include('components.sidebar')

    <main class="p-4 md:ml-64 relative overflow-x-auto h-auto sm:h-screen pt-20">

        <div class="space-y-8 justify-items-center h-auto">
            <section class="bg-white h-auto sm:h-full">
                <div class="px-4 py-8">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 text-center">Create New Contract</h2>
                    <form method="post" action="{{route('supplier.store')}}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 sm:mb-5">
                            <div class="sm:col-span-2"></div>
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 ">Customer Type</label>
                                <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="home" class="text-gray-900 text-sm">Home</option>
                                    <option value="business">Business</option>
                                </select>
                            </div>
                            <div>
                                <label for="energyType" class="block mb-2 text-sm font-medium text-gray-900 ">Energy Type</label>
                                <select onchange="disableForm()" id="energyType" name="energyType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                    <option value="G">Gas</option>
                                    <option value="E">Electricity</option>
                                    <option value="EG">Gas/Electricity</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="PriceE" class="block mb-2 text-sm font-medium text-gray-900">Electricity Price</label>
                                <input type="text" name="PriceE" id="PriceE" class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                            </div>
                            <div class="w-full">
                                <label for="KWh" class="block mb-2 text-sm font-medium text-gray-900">Available Power KW/h</label>
                                <input type="text" name="KWh" id="KWh" class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                            </div>
                            <div class="w-full">
                                <label for="PriceG" class="block mb-2 text-sm font-medium text-gray-900">Gas Price</label>
                                <input type="text" name="PriceG" id="PriceG" class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 disabled:bg-gray-200" value="" placeholder="" required>
                            </div>
                            <div class="w-full">
                                <label for="minimumDuration" class="block mb-2 text-sm font-medium text-gray-900">Minimum Duration Days</label>
                                <input type="number" name="minimumDuration" id="minimumDuration" class="text-base sm:text-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="" placeholder="">
                            </div>
                            <div class="w-full text-lg flex sm:col-span-2 justify-center items-center mt-4 mb-7">
                                <label for="isActive" class="block mr-4  text-sm font-medium text-gray-900">Enable Contract:</label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input id="isActive" onclick="changeValue()" type="checkbox" name="isActive" value="0" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                            </div>
                        </div>

                        <div class="flex justify-center space-x-4">
                            <button type="submit" class="text-gray-600 inline-flex items-center hover:text-white border border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="w-5 h-5 mr-1 -ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                            </svg>
                            Create Contract

                            </button>
                            <button onclick="location.href='{{route('supplier.manage')}}'" type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Delete Draft
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
</div>
</body>
<script>
    window.onload = disableForm();

    function changeValue() {
        const checkbox = document.getElementById("isActive");

        if (checkbox.value == 1) checkbox.value = 0;
        else checkbox.value = 1;
    }

    function disableForm() {
        const energyType = document.getElementById("energyType").value;

        if (energyType == 'E') {
            document.getElementById("PriceE").removeAttribute("disabled");
            document.getElementById("KWh").removeAttribute("disabled");
            document.getElementById("PriceG").setAttribute("disabled", "");
        } else if (energyType == 'G') {
            document.getElementById("PriceE").setAttribute("disabled", "");
            document.getElementById("KWh").setAttribute("disabled", "");
            document.getElementById("PriceG").removeAttribute("disabled");
        } else {
            document.getElementById("PriceE").removeAttribute("disabled");
            document.getElementById("KWh").removeAttribute("disabled");
            document.getElementById("PriceG").removeAttribute("disabled");
        }
    }
</script>