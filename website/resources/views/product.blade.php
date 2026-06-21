<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')

<br>
<div>
        <h1 class="text-center text-4xl mx-2 sm:mx-auto @auth mb-6 @endauth">Available Contract</h1>
</div>

@guest

<div class="flex w-full justify-center pt-10">

<button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700" type="button">Filter By <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>

<!-- Dropdown menu -->
<div id="dropdownSearch" class="-z-1 hidden bg-white rounded-lg shadow w-60">
    <ul class="h-fit px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
      <li>
        <div class="flex items-center p-2 mt-3 rounded hover:bg-gray-100">
          <input checked data-filter="all" id="all" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
          <label for="all" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">All Categories</label>
        </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100">
            <input id="home" data-filter="home" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
            <label for="home" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Private</label>
          </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100">
          <input id="business" data-filter="business" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
          <label for="business" class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Business</label>
        </div>
      </li>
    </ul>
</div>

</div>
<!--
<div class="flex items-center justify-center py-4 md:pt-6 flex-wrap">
    <button type="button" data-filter="all" class="text-gray-700 border border-white hover:border-gray-200 bg-white focus:outline-none rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">All categories</button>
    <button type="button" data-filter="home" class="text-gray-700 border border-white hover:border-gray-200 bg-white  rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">Private</button>
    <button type="button" data-filter="business" class="text-gray-700 border border-white hover:border-gray-200 bg-white rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">Business</button>
</div>
-->
@endguest

<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        <div class="space-y-8 justify-items-center grid md:grid-cols-2 lg:grid-cols-3 sm:gap-y-12 sm:space-y-0">

            @foreach ($contracts as $contract)
                @auth
                    @if (Auth::user()->PIVA == null && $contract->type == 'business')
                        @continue
                    @elseif (Auth::user()->PIVA != null  && $contract->type == 'home')
                        @continue
                    @endif
                @endauth

                @include('components.productCard', array('link' => true))
            @endforeach
        </div>
    </div>
</section>

@include('components.footer')
<script>
    document.addEventListener('click', function(event) {
        const all = document.getElementById('all');
        const home = document.getElementById('home');
        const business = document.getElementById('business');
        const contractCards = document.querySelectorAll('.contract-card');

        if (event.target == home) {
            all.checked = false;
            business.checked = false;
        }

        if (event.target == business) {
            all.checked = false;
            home.checked = false;
        }

        if (event.target == all) {
            home.checked = false;
            business.checked = false;
        }

        if (!home.checked && !business.checked) all.checked = true;

        contractCards.forEach(card => {
            const cardType = card.getAttribute('type');

            if (all.checked || ('home' == cardType && home.checked) || ('business' == cardType && business.checked)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
