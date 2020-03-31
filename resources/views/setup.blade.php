<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sales Ruby Limited, Lagos, Nigeria">
    <meta name="keywords" content="Sales Ruby Limited, Lagos, Nigeria">
    <meta name="author" content="Chilaka Michael Obinna, Johnson Inya, Hannah Okwelum">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales CRM | Setup</title>
    <link rel="stylesheet" href="{{asset('theme-login/bcss/bootstrap.min.css')}}" type="text/css"/>
</head>

<body style="display:flex; justify-content: center; align-items:center;">
    <div class="container" style="display:flex;">
        @if($success)
            <div class="alert alert-success">
                <p>{{$success}}</p>
            </div>
        @endif
    </div>
    <script src="{{asset('theme-login/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('theme-login/js/bootstrap.min.js')}}"></script>
</body>
</html>