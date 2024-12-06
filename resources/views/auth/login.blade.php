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
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form>
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="txt" placeholder="User name" required="">
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button>Sign up</button>
                </form>
            </div>

            <div class="login">
                <form action="{{ route('admin.dashboard') }}">
                    <label for="chk" aria-hidden="true">Login</label>
                    {{-- <input type="email" name="email" placeholder="Email" required=""> --}}
                    <input type="email" name="email" placeholder="Email">

                    <input type="password" name="pswd" placeholder="Password">
                    {{-- <input type="password" name="pswd" placeholder="Password" required=""> --}}

                    <button>Login</button>
                </form>
            </div>
        </div>
    </body>
    </html>
    <!-- partial -->

</body>
</html>

