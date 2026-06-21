<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" type="image/png" href="images/logo-square.png">
    <style>
        body {
            font-family: 'Poppins';
            font-size: 22px;
        }

        .log {
            height: 100%;
            width: 48%;
            float: left;
        }

        .image {
            height: 100%;
            width: 52%;
            float: left;
            display: flex;
            justify-content: center;
        }

        .form {
            height: auto;
            width: 62%;
            margin: auto;
            min-height: 75%;
        }

        .logg {
            overflow-y: auto;
        }

        .hidden {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .logg {
                width: 100%;
            }

            .log {
                width: 100%;
            }

            .form {
                width: 95%;
            }

            .image {
                display: none;
            }
        }
    </style>
    <script>
        const instagramLinks = ["https://www.instagram.com/giorgiagasparato/", "https://www.instagram.com/kevinscala2005/", "https://www.instagram.com/vittoriatagliani_/", "https://www.instagram.com/anna_s_nc/"];

        const instagramLink = document.getElementById("instagramLink");

        instagramLink.href = instagramLinks[Math.floor(Math.random() * instagramLinks.length)];

        function showBusiness() {
            const home = document.getElementById("home");
            const business = document.getElementById("business");
            const supplier = document.getElementById("supplier");

            home.classList.add("hidden");
            supplier.classList.add("hidden");
            business.classList.remove("hidden");

            //Business Button
            document.getElementById("bnb").classList.remove("text-gray-600");
            document.getElementById("bnb").classList.add("rounded-full");
            document.getElementById("bnb").classList.add("bg-gray-400");

            //Private Button
            document.getElementById("prb").classList.add("text-gray-600");
            document.getElementById("prb").classList.remove("rounded-full");
            document.getElementById("prb").classList.remove("bg-gray-400");

            //Supplier Button
            document.getElementById("spb").classList.add("text-gray-600");
            document.getElementById("spb").classList.remove("rounded-full");
            document.getElementById("spb").classList.remove("bg-gray-400");
        }

        function showHome() {
            const home = document.getElementById("home");
            const business = document.getElementById("business");

            home.classList.remove("hidden");
            supplier.classList.add("hidden");
            business.classList.add("hidden");

            //Business Button
            document.getElementById("bnb").classList.add("text-gray-600");
            document.getElementById("bnb").classList.remove("rounded-full");
            document.getElementById("bnb").classList.remove("bg-gray-400");

            //Private Button
            document.getElementById("prb").classList.remove("text-gray-600");
            document.getElementById("prb").classList.add("rounded-full");
            document.getElementById("prb").classList.add("bg-gray-400");

            //Supplier Button
            document.getElementById("spb").classList.add("text-gray-600");
            document.getElementById("spb").classList.remove("rounded-full");
            document.getElementById("spb").classList.remove("bg-gray-400");
        }

        function showSupplier() {
            const home = document.getElementById("home");
            const business = document.getElementById("business");

            home.classList.add("hidden");
            supplier.classList.remove("hidden");
            business.classList.add("hidden");

            //Business Button
            document.getElementById("bnb").classList.add("text-gray-600");
            document.getElementById("bnb").classList.remove("rounded-full");
            document.getElementById("bnb").classList.remove("bg-gray-400");

            //Private Button
            document.getElementById("spb").classList.remove("text-gray-600");
            document.getElementById("spb").classList.add("rounded-full");
            document.getElementById("spb").classList.add("bg-gray-400");

            //Supplier Button
            document.getElementById("prb").classList.add("text-gray-600");
            document.getElementById("prb").classList.remove("rounded-full");
            document.getElementById("prb").classList.remove("bg-gray-400");
        }

        function validatePassword(password) {
            if (password.length < 8) {
                return "The password must be at least 8 characters long.";
            }

            if (!/[A-Z]/.test(password)) {
                return "The password must contain at least one uppercase letter.";
            }


            if (!/[0-9]/.test(password)) {
                return "The password must contain at least one number.";
            }

            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                return "The password must contain at least one special character.";
            }

            return "top";
        }

        function validateP() {
            var val = validatePassword(document.getElementById("password-p").value);
            checkP();
            
            if (!val.includes('top')) {
                document.getElementById("validator-p").innerHTML=val;
                document.getElementById("submit-p").disabled=true;
            } else {
                document.getElementById("validator-p").innerHTML="";
            }
        }

        function validateB() {
            var val = validatePassword(document.getElementById("password-b").value);
            checkB();
            
            if (!val.includes('top')) {
                document.getElementById("validator-b").innerHTML=val;
                document.getElementById("submit-b").disabled=true;
            } else {
                document.getElementById("validator-b").innerHTML="";
            }
        }

        function validateS() {
            var val = validatePassword(document.getElementById("password-s").value);
            checkS();
            
            if (!val.includes('top')) {
                document.getElementById("validator-s").innerHTML=val;
                document.getElementById("submit-s").disabled=true;
            } else {
                document.getElementById("validator-s").innerHTML="";
            }
        }

        function checkP() {
            var password = document.getElementById("password-p").value;
            var rpassword = document.getElementById("password-cp").value;

            if (password !== rpassword) {
                document.getElementById("confirm-p").innerHTML="Passwords do not match";
                document.getElementById("submit-p").disabled=true;
            } else {
                document.getElementById("confirm-p").innerHTML="";
                document.getElementById("submit-p").disabled=false;
            }
        }

        function checkS() {
            var password = document.getElementById("password-s").value;
            var rpassword = document.getElementById("password-cs").value;

            if (password !== rpassword) {
                document.getElementById("confirm-s").innerHTML="Passwords do not match";
                document.getElementById("submit-s").disabled=true;
            } else {
                document.getElementById("confirm-s").innerHTML="";
                document.getElementById("submit-s").disabled=false;
            }
        }

        function checkB() {
            var password = document.getElementById("password-b").value;
            var rpassword = document.getElementById("password-cb").value;

            if (password !== rpassword) {
                document.getElementById("confirm-b").innerHTML="Passwords do not match";
                document.getElementById("submit-b").disabled=true;
            } else {
                document.getElementById("confirm-b").innerHTML="";
                document.getElementById("submit-b").disabled=false;
            }
        }
    </script>
    <title>Caerus Energy</title>
</head>
<!DOCTYPE html>
<html>

<body style="height: 100vh; overflow-y: hidden;">
    <div class="log">
        <div style="height: 8%; min-height: 35px;">
            <a href="{{route('welcome')}}"><img style="max-height: 100%; max-width: 100%; margin: auto;"
                    src="{{url('images/Logo.png')}}"></a>
        </div>

        @if (env('REGISTRATION'))
        <div class="logg" style=" justify-content: center; display: flex; height: 85%; margin-top: 3%;">
            <div class="form">
                <div class="mb-1">
                    <h2 class="text-3xl font-bold mb-2">Sign Up</h2>
                </div>
                <div class="mb-1 font-light text-base">
                    <h4>You already have an account? {{session('status')}}<br>
                        You can <a class="font-bold text-blue-800" href="{{ route('login')}}">Sign In here!</a>
                    </h4>
                    <br>
                    <div class="w-full flex justify-center">
                        <div class="w-full h-10 flex justify-around rounded-full bg-gray-200">
                            <button id="prb" class="w-full m-1" onclick="showHome();">Private</button>
                            <button id="bnb" class="text-gray-600 w-full m-1" onclick="showBusiness();">Business</button>
                            <button id="spb" class="text-gray-600 w-full m-1" onclick="showSupplier();">Supplier</button>
                        </div>
                    </div>
                </div>
                <br>
                <div>

                    <form id="home" action="{{ route('signup.registerPrivate') }}" method="post">
                        @csrf
                        <div class='mb-4 text-sm'>
                            <label for='email' class='font-light'>Name</label>
                            <input type='text' id='name' name='name' placeholder='Enter your name'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('name')}}">

                            <div class="text-red-500">
                                @error('name')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Surname</label>
                            <input type='text' id='surname' name='surname' placeholder='Enter your surname'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('surname')}}">

                            <div class="text-red-500">
                                @error('surname')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Email</label>
                            <input type='text' id='email' name='email' placeholder='Enter your email'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('email')}}">
                            
                            <div class="text-red-500">
                                @error('email')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Phone Number</label>
                            <input type='text' id='phoneNumber' name='phoneNumber' placeholder='Enter your phone number'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('phoneNumber')}}">
                            
                            <div class="text-red-500">
                                @error('phoneNumber')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>CF</label>
                            <input type='text' id='CF' name='CF' placeholder='Enter your CF'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('CF')}}">
                            
                            <div class="text-red-500">
                                @error('CF')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Password</label>
                            <input type='password' oninput="validateP()" id='password-p' name='password' placeholder='Enter your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="validator-p" class="text-red-500"></div>
                        </div>

                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Confirm Password</label>
                            <input type='password' oninput="checkP()" id='password-cp' name='password-c' placeholder='Confirm your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="confirm-p" class="text-red-500"></div>
                        </div>
                        <br>
                        <div class='flex justify-center'>
                            <input disabled id="submit-p" type='submit' value='Sign up'
                                class='w-11/12 bg-blue-900 text-white p-2 rounded-full shadow-md cursor-pointer'>
                        </div>

                    </form>

                    <form id="business" class="hidden" action="{{ route('signup.registerBusiness') }}" method="post">
                        @csrf
                        <div class='mb-4 text-sm'>
                            <label for='email' class='font-light'>Business Name</label>
                            <input type='text' id='businessName' name='businessName'
                                placeholder='Enter your business name'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('businessName')}}">
                            
                            <div class="text-red-500">
                                @error('businessName')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>P. IVA</label>
                            <input type='text' id='pIva' name='pIva' placeholder='Enter your P. IVA'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('pIva')}}">

                            <div class="text-red-500">
                                @error('pIva')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Email</label>
                            <input type='text' id='email' name='email' placeholder='Enter your email'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('email')}}">
                            
                            <div class="text-red-500">
                                @error('email')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Phone Number</label>
                            <input type='text' id='phoneNumber' name='phoneNumber' placeholder='Enter your phone number'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('phoneNumber')}}">

                            <div class="text-red-500">
                                @error('phoneNumber')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>CF</label>
                            <input type='text' id='CF' name='CF' placeholder='Enter your CF'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('CF')}}">
                            
                            <div class="text-red-500">
                                @error('CF')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Password</label>
                            <input type='password' oninput="validateB()" id='password-b' name='password' placeholder='Enter your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="validator-b" class="text-red-500"></div>
                        </div>

                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Confirm Password</label>
                            <input type='password' oninput="checkB()" id='password-cb' name='password-c' placeholder='Confirm your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="confirm-b" class="text-red-500"></div>
                        </div>
                        <br>
                        <div class='flex justify-center'>
                            <input disabled id="submit-b" type='submit' value='Sign up'
                                class='w-11/12 bg-blue-900 text-white p-2 rounded-full shadow-md cursor-pointer'>
                        </div>

                    </form>

                    <form id="supplier" action="{{ route('signup.registerSupplier') }}" method="post">
                        @csrf
                        <div class='mb-4 text-sm'>
                            <label for='email' class='font-light'>Name</label>
                            <input type='text' id='name' name='name' placeholder='Enter your name'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('name')}}">

                            <div class="text-red-500">
                                @error('name')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Email</label>
                            <input type='text' id='email' name='email' placeholder='Enter your email'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('email')}}">
                            
                            <div class="text-red-500">
                                @error('email')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>

                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>IBAN</label>
                            <input type='text' id='iban' name='iban' placeholder='Enter your IBAN'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'
                                value="{{old('iban')}}">
                            
                            <div class="text-red-500">
                                @error('iban')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        
                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Password</label>
                            <input type='password' oninput="validateS()" id='password-s' name='password' placeholder='Enter your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="validator-s" class="text-red-500"></div>
                        </div>

                        <div class='mb-4 text-sm'>
                            <label for='password' class='font-light'>Confirm Password</label>
                            <input type='password' oninput="checkS()" id='password-cs' name='password-c' placeholder='Confirm your password'
                                class='text-base sm:text-sm w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300'>
                            <div id="confirm-s" class="text-red-500"></div>
                        </div>
                        <br>
                        <div class='flex justify-center'>
                            <input disabled id="submit-s" type='submit' value='Sign up'
                                class='w-11/12 bg-blue-900 text-white p-2 rounded-full shadow-md cursor-pointer'>
                        </div>

                    </form>

                    <div lass="flex justify-center">
                        <p class="text-center text-sm">Follow us!</p>
                    </div>
                    <div class="flex justify-center mt-2 space-x-4 text-gray-400">
                        <a class="hover:opacity-75" href="#" target="_blank" rel="noreferrer" id="instagramLink">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">s
                                <path fillRule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clipRule="evenodd" />
                            </svg>
                        </a>
                        <a class="hover:opacity-75" href="https://github.com/CaerusEnergy" rel="noreferrer">
                            <span class="sr-only"> GitHub </span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fillRule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clipRule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="h-full text-center flex flex-col place-content-center">
            <span class="h-auto">
                This is a school project, not a real website!
            </span>
            <span class="mt-8">
                So, for privacy reasons, we have temporarily disabled the registration page! 
            </span>

            <svg class="h-64 mt-8" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 90 112.5" x="0px" y="0px">
                <path xmlns="http://www.w3.org/2000/svg" d="m10.004 7.0586h65.598c2.7461 0 5.0039 2.2578 5.0039 5.0039v38.578c-0.77344 0-1.5039 0.066406-2.2344 0.19922l-0.003906-31h-71.133v56.473h56.895c-0.10938 0.73047-0.15625 1.4844-0.15625 2.2383l-58.973-0.003906v-66.48c0-2.7461 2.2344-5.0078 5.0039-5.0078zm36.43 59.086c2.1055-0.46484 4.0312-1.2852 5.7773-2.3906l2.2578 0.99609c0.42188 0.17969 0.92969 0.066406 1.3086-0.30859l2.2617-2.2578c0.375-0.375 0.50781-0.90625 0.33203-1.3047l-1.0195-2.2812c1.1328-1.7266 1.9492-3.6758 2.3945-5.7578l2.3242-0.88672c0.41797-0.17578 0.6875-0.62109 0.6875-1.1523v-3.2109c0-0.53125-0.26562-0.97266-0.6875-1.1523l-2.3242-0.88672c-0.44141-2.082-1.2617-4.0312-2.3945-5.7578l1.0195-2.2812c0.17578-0.42188 0.042968-0.92969-0.33203-1.3086l-2.2617-2.2578c-0.37891-0.37891-0.88672-0.50781-1.3086-0.30859l-2.2578 0.99609c-1.75-1.1289-3.6758-1.9492-5.7773-2.3906l-0.88672-2.3047c-0.15234-0.42188-0.61719-0.70703-1.1484-0.70703h-3.1875c-0.53125 0-0.99609 0.28906-1.1523 0.70703l-0.88672 2.3047c-2.1055 0.44141-4.0312 1.2617-5.7812 2.3906l-2.2578-0.99609c-0.42187-0.19922-0.92969-0.066407-1.3086 0.30859l-2.2578 2.2578c-0.375 0.375-0.50781 0.88672-0.33203 1.3086l1.0195 2.2812c-1.1289 1.7266-1.9492 3.6758-2.3906 5.7578l-2.3242 0.88672c-0.42187 0.17578-0.6875 0.62109-0.6875 1.1523v3.2109c0 0.53125 0.26563 0.97656 0.6875 1.1523l2.3242 0.88672c0.44141 2.082 1.2617 4.0312 2.3906 5.7578l-1.0195 2.2812c-0.17969 0.39844-0.042969 0.92969 0.33203 1.3047l2.2578 2.2578c0.37891 0.37891 0.88672 0.48828 1.3086 0.30859l2.2578-0.99609c1.75 1.1055 3.6758 1.9258 5.7812 2.3906l0.88672 2.3047c0.15625 0.42188 0.62109 0.70703 1.1523 0.70703h3.1875c0.53125 0 0.99609-0.28906 1.1484-0.70703zm-3.6328-6.8438c5.582 0 10.098-4.5391 10.098-10.121 0-5.582-4.5156-10.098-10.098-10.098-5.5781 0-10.098 4.5156-10.098 10.098 0 5.582 4.5195 10.121 10.098 10.121zm26.223-19.398c-0.62109 0-1.1289-0.51172-1.1289-1.1289 0-0.62109 0.50781-1.1289 1.1289-1.1289h2.9453c0.62109 0 1.1094 0.50781 1.1094 1.1289 0 0.62109-0.48828 1.1289-1.1094 1.1289zm0-5.625c-0.62109 0-1.1289-0.50781-1.1289-1.1289 0-0.62109 0.50781-1.1289 1.1289-1.1289h2.9453c0.62109 0 1.1094 0.50781 1.1094 1.1289 0 0.62109-0.48828 1.1289-1.1094 1.1289zm0-5.625c-0.62109 0-1.1289-0.48828-1.1289-1.1055 0-0.62109 0.50781-1.1289 1.1289-1.1289h2.9453c0.62109 0 1.1094 0.50781 1.1094 1.1289s-0.48828 1.1055-1.1094 1.1055zm11.582 35.523c7.9531 0 14.395 6.4219 14.395 14.371s-6.4414 14.395-14.395 14.395c-7.9492 0-14.371-6.4453-14.371-14.395 0-3.7656 1.4414-7.1758 3.8086-9.7422v-5.3164l0.019531-0.82031c0.42188-5.4453 5.0078-9.7656 10.543-9.7656 5.4023 0 9.8984 4.0977 10.52 9.3477h-5.6055c-0.55469-2.1914-2.5664-3.832-4.9141-3.832-2.5039 0-4.6055 1.8594-4.9805 4.25v2.3945c1.5469-0.57812 3.2305-0.88672 4.9805-0.88672zm-68.32-49.609c-0.62109 0-1.1289-0.48828-1.1289-1.1055 0-0.62109 0.50781-1.1289 1.1289-1.1289h1.3711c0.61719 0 1.1055 0.50781 1.1055 1.1289 0 0.62109-0.48828 1.1055-1.1055 1.1055zm5.4922 0c-0.62109 0-1.1289-0.48828-1.1289-1.1055 0-0.62109 0.50781-1.1289 1.1289-1.1289h1.3711c0.62109 0 1.1055 0.50781 1.1055 1.1289 0 0.62109-0.48828 1.1055-1.1055 1.1055zm5.4922 0c-0.62109 0-1.1328-0.48828-1.1328-1.1055 0-0.62109 0.51172-1.1289 1.1328-1.1289h1.3711c0.61719 0 1.1055 0.50781 1.1055 1.1289 0 0.62109-0.48828 1.1055-1.1055 1.1055zm16.652 0c-0.61719 0-1.1289-0.48828-1.1289-1.1055 0-0.62109 0.51172-1.1289 1.1289-1.1289h33.395c0.61719 0 1.1289 0.50781 1.1289 1.1289 0 0.62109-0.51172 1.1055-1.1289 1.1055zm40.684 58.863c1.4844 0 2.6797 1.1953 2.6797 2.6797 0 1.0625-0.64453 1.9922-1.5508 2.4141v5.1406c0 0.62109-0.50781 1.1289-1.1289 1.1289-0.61719 0-1.1289-0.50781-1.1289-1.1289v-5.1406c-0.90625-0.42188-1.5273-1.3516-1.5273-2.4141 0-1.4844 1.1953-2.6797 2.6562-2.6797z" fill-rule="evenodd"/>
            </svg>
        </div>
        @endif
    </div>
    <div class="image">
        <div style="height: 97%;
               width: 97%;
               background-image: url({{url('images/Pale-2.jpg')}});
               background-position: center;
               background-repeat: no-repeat;
               background-size: cover;
               border-radius: 25px;
               margin: auto;
               text-align: center;">
            <p style="margin: 10%; color: white; font-size: 5vh; font-weight: bold;">
                The Future Is Ecological, With Caerus
            </p>
        </div>
    </div>

    @if (session('session') == 'business')
        <script>
            showBusiness();
        </script>
    @elseif (session('session') == 'supplier')
        <script>
            showSupplier();
        </script>
    @else
        <script>
            showHome();
        </script>
    @endif
</html>