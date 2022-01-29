@include('stack.script')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Log in</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    @stack('stylesheet')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-4 tect-center">
            </div>
            <div class="col-4 text-center mt-5">
                <form class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control mt-1" placeholder="Email address" required autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control mt-1" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
                </form>
            </div>
            <div class="col-4 tect-center">
            </div>
        </div>
    </div>
</body>

</html>