@include('components.head')
<body class="bg-gray-50">
<div class="antialiased">

    @include('components.sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Your payments
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        PAYMENT ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        COSTUMER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ENERGY SUPPLY
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PAYMENT DATE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PAID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        AMOUNT
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$payment->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$payment->ragSoc}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($payment-> energyType === 'G')
                                <span>Gas</span>

                            @elseif ($payment-> energyType === 'E')
                                <span>Electricity</span>

                            @else
                                <span>Electricity/Gas</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$payment->month}}/{{$payment->year}}
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>
                        <td class="px-6 py-4">
                            €{{number_format((float)$payment->amount, 2)}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
