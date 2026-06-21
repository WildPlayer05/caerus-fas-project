<div class="flex items-start ml-3">
    <div class="bg-gray-100 p-3 rounded-lg">
    <p class="text-sm text-gray-800">Hello, how can I help you?</p>
    </div>
    </div>

    @foreach ($messages as $message)

    <!-- Received Message -->
    @if ($message->sender == 'admin')

    <div class="flex items-start mr-6 ml-3">
    <div class="bg-gray-100 p-3 rounded-lg">
    <p class="text-sm text-gray-800">{{$message->message}}</p>
    </div>
    </div>

    @else

    <!-- Sent Message -->
    <div class="flex items-end justify-end ml-6 mr-3">
    <div class="bg-blue-600 p-3 rounded-lg">
    <p class="text-sm text-white">{{$message->message}}</p>
    </div>
    </div>

    @endif

@endforeach