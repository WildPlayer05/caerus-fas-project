<div class="w-full sm:w-11/12 max-w-[355px] bg-white border border-gray-200 rounded-lg shadow">
    <div class="w-full flex justify-center mt-3">
        @if (env('MEME'))
        <img class="h-24 rounded-t-lg max-w-10/12" src="{{url('images/suppliers/'.$contract->idS.'-meme.png')}}"
            alt="" />
        @else
        <img class="h-24 rounded-t-lg max-w-10/12" src="{{url('images/suppliers/'.$contract->idS.'.png')}}"
            alt="" />
        @endif
    </div>
    <div class="p-5">
        <a>
            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Contract n° {{$contract->id}}
            </h5>
        </a>
        <ul role="list" class="mb-8 space-y-4 text-left">
            <li class="flex justify-center items-center space-x-3">

                @if ($contract-> energyType === 'G')
                <span>Gas</span>
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M8.6 3.2a1 1 0 0 0-1.6 1 3.5 3.5 0 0 1-.8 3.6c-.6.8-4 5.6-1 10.7A7.7 7.7 0 0 0 12 22a8 8 0 0 0 7-3.8 7.8 7.8 0 0 0 .6-6.5 8.7 8.7 0 0 0-2.6-4 1 1 0 0 0-1.6.7 10 10 0 0 1-.8 3.4 9.9 9.9 0 0 0-2.2-5.5A14.4 14.4 0 0 0 9 3.5l-.4-.3Z" />
                </svg>

                @elseif ($contract-> energyType === 'E')
                <span>Electricity</span>
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M18,11.74a1,1,0,0,0-.52-.63L14.09,9.43,15,3.14a1,1,0,0,0-1.78-.75l-7,9a1,1,0,0,0-.17.87,1,1,0,0,0,.59.67l4.27,1.71L10,20.86a1,1,0,0,0,.63,1.07A.92.92,0,0,0,11,22a1,1,0,0,0,.83-.45l6-9A1,1,0,0,0,18,11.74Z" />
                </svg>

                @else
                <span>Electricity/Gas</span>
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M18,11.74a1,1,0,0,0-.52-.63L14.09,9.43,15,3.14a1,1,0,0,0-1.78-.75l-7,9a1,1,0,0,0-.17.87,1,1,0,0,0,.59.67l4.27,1.71L10,20.86a1,1,0,0,0,.63,1.07A.92.92,0,0,0,11,22a1,1,0,0,0,.83-.45l6-9A1,1,0,0,0,18,11.74Z" />
                </svg>
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M8.6 3.2a1 1 0 0 0-1.6 1 3.5 3.5 0 0 1-.8 3.6c-.6.8-4 5.6-1 10.7A7.7 7.7 0 0 0 12 22a8 8 0 0 0 7-3.8 7.8 7.8 0 0 0 .6-6.5 8.7 8.7 0 0 0-2.6-4 1 1 0 0 0-1.6.7 10 10 0 0 1-.8 3.4 9.9 9.9 0 0 0-2.2-5.5A14.4 14.4 0 0 0 9 3.5l-.4-.3Z" />
                </svg>
                @endif
            </li>
            <p class="font-light text-gray-500 sm:text-lg">Via {{$contract->street}}, {{$contract->civicNumber}}</p>
        </ul>
        <div class="justify-center flex">
            <a href="{{route('user.contract', $contract->id)}}" class="text-blue-600 hover:underline font-medium text-lg inline-flex items-center">Manage
                contract
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</div>
