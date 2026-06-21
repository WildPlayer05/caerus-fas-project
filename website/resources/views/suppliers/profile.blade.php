@include('components/head')
<body class="bg-gray-50">
<div class="antialiased">

    @include('components.sidebar')

    <main class="p-4 md:ml-64 relative overflow-x-auto h-auto sm:h-screen pt-20">
    <section class="">
    <div class="mx-auto">
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow ">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50  "
                id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="me-2">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                        aria-selected="true"
                        class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100">Personal
                        Information</button>
                </li>
                <li class="me-2">
                    <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                        aria-controls="services" aria-selected="false"
                        class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 ">Edit Personal Information</button>
                </li>
                <li class="me-2">
                    <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                        aria-controls="statistics" aria-selected="false"
                        class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100">Change Password</button>
                </li>
            </ul>
            <div id="defaultTabContent">
                <div class="hidden p-4 bg-white rounded-lg md:px-8 md:py-4" id="about" role="tabpanel"
                    aria-labelledby="about-tab">
                    <div class="space-y-6">
                        <div class="pb-12">
                            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="first-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="first-name" id="first-name"
                                            autocomplete="given-name" value="{{Auth::user()->ragSoc}}"
                                            class="bg-gray-200 block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                
                                <div class="sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                        address</label>
                                    <div class="mt-2">
                                        <input disabled id="email" name="email" type="email" autocomplete="email"
                                            value="{{Auth::user()->email}}"
                                            class="bg-gray-200 block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">IBAN</label>
                                    <div class="mt-2">
                                        <input disabled id="IBAN" name="IBAN" type="IBAN" autocomplete="IBAN"
                                               value="{{Auth::user()->IBAN}}"
                                               class="bg-gray-200 block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden p-4 bg-white rounded-lg md:px-8 md:py-4" id="services" role="tabpanel"
                    aria-labelledby="services-tab">
                    <form method="post" action="{{route('supplier.profile.update')}}">
                        @csrf
                    <div class="space-y-6">
                        <div class="pb-12">
                            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-1 sm:col-span-3">
                                    <label for="first-name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="name" value="{{Auth::user()->ragSoc}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                        address</label>
                                    <div class="mt-2">
                                        <input  id="email" name="email" type="email" autocomplete="email"
                                               value="{{Auth::user()->email}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">IBAN</label>
                                    <div class="mt-2">
                                        <input id="IBAN" name="IBAN" type="IBAN" autocomplete="IBAN"
                                               value="{{Auth::user()->IBAN}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="col-span-4">
                                    <button  type="submit" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="hidden p-4 bg-white rounded-lg md:px-8 md:py-4" id="statistics" role="tabpanel"
                    aria-labelledby="statistics-tab">
                    <div class="space-y-6">
                        <form method="post" action="{{route('supplier.profile.update')}}">
                            @csrf
                        <div class="pb-12">
                            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="oldpassword" class="block text-sm font-medium leading-6 text-gray-900">Insert old password
                                    </label>
                                    <div class="mt-2">
                                        <input  id="oldpassword" name="oldpassword" type="password"
                                                class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="col-span-3"></div>
                                <div class="sm:col-span-3">
                                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Insert new password</label>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" class="password-input block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="rpassword" class="block text-sm font-medium leading-6 text-gray-900">Repeat new password</label>
                                    <div class="mt-2">
                                        <input id="rpassword" name="rpassword" type="password" oninput="checkPasswordMatch()" class="password-input block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <span id="password-match" class="text-sm text-red-500 hidden">Passwords do not match</span>
                                    </div>
                                </div>
                                <div class="col-span-4">
                                    <button  type="submit" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        
    </main>
</div>
</body>

<script>
    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var rpassword = document.getElementById("rpassword").value;
        var passwordMatch = document.getElementById("password-match");

        if (password !== rpassword) {
            passwordMatch.classList.remove("hidden");
        } else {
            passwordMatch.classList.add("hidden");
        }
    }
</script>
