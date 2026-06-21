<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reset Password</title>
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
</head>

<body style="height: 100vh; overflow-y: hidden;">
<div class="log">
    <div style="height: 8%; min-height: 35px;">
        <a href="{{route('welcome')}}"><img style="max-height: 100%; max-width: 100%; margin: auto;" src="{{url('images/Logo.png')}}"></a>
    </div>
    <div class="logg" style=" justify-content: center; display: flex; height: 85%; margin-top: 3%;">
        <div class="form">
            <div class="mb-1">
                <h2 class="text-3xl font-bold mb-2">Reset Password</h2>
            </div>
            @if ($errors->count() > 0)
                <p>The following errors have occurred:</p>

                <ul>
                    @foreach( $errors->all() as $message )
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            <br>
            <div>
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-4 text-sm">
                        <label for="email" class="font-light">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" class="w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <br>
                    <div class="mb-4 text-sm">
                        <label for="password" class="font-light">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your new password" class="w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300" required autocomplete="new-password">
                    </div>
                    <br>
                    <div class="mb-4 text-sm">
                        <label for="password_confirmation" class="font-light">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password" class="w-full p-2 border-b-2 border-gray-300 hover:border-indigo-300" required autocomplete="new-password">
                    </div>
                    <br>
                    <div class="flex justify-center">
                        <input type="submit" value="Reset Password" class="w-11/12 bg-blue-900 text-white p-2 rounded-full shadow-md cursor-pointer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="image">
    <div style="height: 97%; width: 97%; background-image: url({{url('images/Pale.jpg')}}); background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 25px; margin: auto; text-align: center;">
        <p style="margin: 10%; color: white; font-size: 5vh; font-weight: bold;">
            The future is ecological, with Caerus
        </p>
    </div>
</div>
</body>

<script>
    const instagramLinks = ["https://www.instagram.com/giorgiagasparato/", "https://www.instagram.com/kevinscala2005/", "https://www.instagram.com/vittoriatagliani_/", "https://www.instagram.com/anna_s_nc/"];

    const instagramLink = document.getElementById("instagramLink");

    instagramLink.href = instagramLinks[Math.floor(Math.random() * instagramLinks.length)];
</script>

</html>
