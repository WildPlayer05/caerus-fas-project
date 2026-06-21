<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Verification Code</title>
</head>
<body>

<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        <a href="#">
            <img class="w-auto h-7 sm:h-8" src="{{url('images/logo.png')}}" alt="">
        </a>
    </header>

    <main class="mt-8">
        <h2 class="text-gray-700 dark:text-gray-200">Hi,</h2>

        <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
            This is your verification code:
        </p>

        <div class="flex items-center mt-4 gap-x-4">
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[0]}}</p>
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[1]}}</p>
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[2]}}</p>
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[3]}}</p>
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[4]}}</p>
            <p class="flex items-center justify-center w-10 h-10 text-2xl font-medium text-blue-500 border border-blue-500 rounded-md dark:border-blue-400 dark:text-blue-400 ">{{((string)$verificationCode)[5]}}</p>
        </div>

        <p class="mt-4 leading-loose text-gray-600 dark:text-gray-300">
            This code will only be valid for the next 5 minutes.
        </p>

        <p class="mt-8 text-gray-600 dark:text-gray-300">
            Thanks, <br>
            Caerus team
        </p>
    </main>


    <footer class="mt-8">

        <p class="mt-3 text-gray-500 dark:text-gray-400">© 2024 Caerus. All Rights Reserved.</p>
    </footer>
</section>
</body>
</html>
