<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sportat Vendor - Login</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('image\logo\favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/demo.css') }}" />

    <!-- Page CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            /* background: linear-gradient(135deg, #ccddcc, #36b43c); */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login {
            max-width: 650px;
            width: 450px;
            padding: 30px;
            background: #28a745;
            border-radius: 10px;
            color: white
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        .login h3 {
            text-align: center;
            margin-bottom: 10px;
            color: white;
            /* Green color for heading */
        }

        .login p {
            text-align: center;
            margin-bottom: 20px;
            color: #ddcece;
        }

        .login img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            object-fit: cover;
        }

        .login__button {
            width: 100%;
            background-color: #137e2c;
            /* Green button color */
            border: none;
            padding: 10px;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login__button:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-link {
            color: #28a745;
            /* Green color for links */
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


    </style>
</head>

<body>
    <div class="login">

        <!-- Logo Image -->
        <img src="{{ asset('image/logo/logo.svg') }}" alt="Sports System Logo" class="w-100" style="height: 200px;" />
        <h3>أهلا بك</h3>
        <p>من فضلك سجل الدخول للإستمرار</p>

        <!-- Login Form -->
        <form method="POST" action="{{ route('vendor.login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required />
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password"
                    required />
                @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button class="login__button" type="submit">تسجيل دخول تاجر </button>
            </div>
        </form>




    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    <script src="{{ asset('asset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
</body>

</html>
