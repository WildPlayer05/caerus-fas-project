@include('components/head')
@include('components/navbar')
<section class="bg-white">
    <div class="flex justify-center items-center">
        <div class="mt-6 flex items-center gap-x-3">
            <img class="h-20 w-20 rounded-full" src="{{url('images/user-icon.png')}}">
        </div>
    </div>
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-8 lg:px-6">
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
                                @if(Auth::user()->PIVA)
                                <div class="sm:col-span-3">
                                    <label for="first-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Business name</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="first-name" id="first-name"
                                            autocomplete="given-name" value="{{Auth::user()->ragSoc}}"
                                            class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Partita IVA</label>
                                    <div class="mt-2">
                                        <input disabled id="phoneNumber" name="phoneNumber" type="phoneNumber" autocomplete="phoneNumber"
                                               value="{{Auth::user()->PIVA}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                @else
                                <div class="sm:col-span-3">
                                    <label for="first-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="first-name" id="first-name"
                                            autocomplete="given-name" value="{{Auth::user()->name}}"
                                            class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="last-name" id="last-name"
                                            autocomplete="family-name" value="{{Auth::user()->surname}}"
                                            class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                @endif
                                <div class="sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                        address</label>
                                    <div class="mt-2">
                                        <input disabled id="email" name="email" type="email" autocomplete="email"
                                            value="{{Auth::user()->email}}"
                                            class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Phone number</label>
                                    <div class="mt-2">
                                        <input disabled id="phoneNumber" name="phoneNumber" type="phoneNumber" autocomplete="phoneNumber"
                                               value="{{Auth::user()->phoneNumber}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="cf" class="block text-sm font-medium leading-6 text-gray-900">Fiscal code
                                        </label>
                                    <div class="mt-2">
                                        <input disabled id="cf" name="cf" type="cf" autocomplete="cf"
                                               value="{{Auth::user()->CF}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden p-4 bg-white rounded-lg md:px-8 md:py-4" id="services" role="tabpanel"
                    aria-labelledby="services-tab">
                    <form method="post" action="{{route('profile.update',['profile' => Auth::user()->id])}}">
                        @csrf
                        @method('PATCH')
                    <div class="space-y-6">
                        <div class="pb-12">
                            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                @if(Auth::user()->PIVA)
                                <div class="col-span-1 sm:col-span-3">
                                    <label for="first-name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Business name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="name" value="{{Auth::user()->ragSoc}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Partiva IVA</label>
                                    <div class="mt-2">
                                        <input id="phoneNumber" name="phoneNumber" type="phoneNumber" autocomplete="phoneNumber"
                                               value="{{Auth::user()->PIVA}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                @else
                                <div class="col-span-1 sm:col-span-3">
                                    <label for="first-name"
                                           class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="name" value="{{Auth::user()->name}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="surname"
                                           class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                    <div class="mt-2">
                                        <input  type="text" name="surname" id="surname"
                                               autocomplete="surname" value="{{Auth::user()->surname}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                @endif

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
                                    <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Phone number</label>
                                    <div class="mt-2">
                                        <input id="phoneNumber" name="phoneNumber" type="phoneNumber" autocomplete="phoneNumber"
                                               value="{{Auth::user()->phoneNumber}}"
                                               class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="cf" class="block text-sm font-medium leading-6 text-gray-900">Fiscal code
                                    </label>
                                    <div class="mt-2">
                                        <input id="cf" name="cf" type="cf" autocomplete="cf" value="{{Auth::user()->CF}}"
                                         class="block w-full rounded-md border-0 p-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300  focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:font-light sm:leading-6">
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
                        <form method="post" action="{{route('profile.update',['profile' => Auth::user()->id])}}">
                            @csrf
                            @method('PATCH')
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
@include('components/footer')
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
