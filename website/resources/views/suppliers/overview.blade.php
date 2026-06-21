@include('components.head')
<body class="bg-gray-50">
<div class="antialiased">

    @include('components.sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">

        <div class="space-y-8 justify-items-center grid md:grid-cols-2 gap-x-6 lg:grid-cols-3 sm:gap-y-6 sm:space-y-0">
            @include('components.charts.contract-chart', ['title' => 'prova1', 'text' => 'Created Contracts', 'type' => 'none', 'type1' => 'Active', 'type2' => 'Inactive', 'total' => $nContracts, 'data' => $activeContracts])
            @include('components.charts.contract-chart', ['title' => 'prova2', 'text' => 'Total Users', 'type' => 'none', 'type1' => 'Private', 'type2' => 'Business', 'total' => $nUsers, 'data' => $nPrivate])
            @include('components.charts.contract-chart', ['title' => 'prova3', 'text' => 'Stipulated Contracts', 'type' => 'none', 'type1' => 'Active', 'type2' => 'Dismissed', 'total' => $stipulatedContracts, 'data' => $nActive])
            @include('components.charts.contract-chart', ['title' => 'prova4', 'text' => $date, 'type' => 'money', 'type1' => 'Gas', 'type2' => 'Electricity', 'total' => $totIncome, 'data' => $totGas])
        </div>
    </main>
</div>
</body>