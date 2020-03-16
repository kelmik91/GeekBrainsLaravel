<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            form {
                display: flex;
                flex-direction: column;
                width: 165px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @include('layout.header')
                @include('layout.nav')

                <form action="#" method="post">
                    <label for="login">Login</label>
                    <input type="text" placeholder="Enter login">
                    <label for="password">Password</label>
                    <input type="password">
                    <input type="submit">
                </form>

                @include('layout.footer')
            </div>
        </div>
    </body>
</html>
