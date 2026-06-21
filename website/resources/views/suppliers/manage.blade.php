@include('components.head')
<body class="bg-gray-50">
<div class="antialiased">

    @include('components.sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Your created contracts
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3">
                        Contract ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Costumer Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Energy Supply
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gas Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Electricity Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ongoing
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contracts as $contract)
                <tr class="bg-white border-b text-center">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$contract->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{ucfirst($contract->type)}}
                    </td>
                    <td class="px-6 py-4">
                        @if ($contract-> energyType === 'G')
                        <span>Gas</span>

                        @elseif ($contract-> energyType === 'E')
                        <span>Electricity</span>

                        @else
                        <span>Electricity/Gas</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if ($contract->PriceG == null)
                            <span>-</span>
                        @else
                            {{number_format((float)$contract->PriceG, 2)}}
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if ($contract->PriceE == null)
                            <span>-</span>
                        @else
                            {{number_format((float)$contract->PriceE, 2)}}
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if ($contract->isActive === 0)
                        <span>No</span>

                        @else
                        <span>Yes</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('supplier.edit', $contract->id)}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('supplier.delete', $contract->id)}}" class="font-medium text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
