<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('slogin/dist/style.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html>

    <head>
        <title>Slide Navbar</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('slogin/slide navbar style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>
        {{-- <div class="wrap-all-cus"> --}}
        <img src="{{ asset('assets/images/bg-login2.jpg') }}" class="bg-login-cus"></img>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <span class="logo-login-cus">AL-ZAHRA</span>

            <div class="signup">
                <form action="{{ route('register.proses') }}" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Daftar</label>
                    <input type="text" name="name" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button>Daftar</button>
                </form>
            </div>

            <div class="login">
                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Masuk</label>
                    {{-- <input type="email" name="email" placeholder="Email" required=""> --}}
                    <input type="email" name="email" placeholder="Email">

                    <input type="password" name="password" placeholder="Password">
                    {{-- <input type="password" name="pswd" placeholder="Password" required=""> --}}

                    <button>Masuk</button>
                </form>
            </div>
        </div>
        {{-- </div> --}}
    </body>

    </html>
    <!-- partial -->

</body>

</html>
