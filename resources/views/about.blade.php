<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <style>
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="{{url('/about/en')}}">English</a>
    <a href="{{url('/about/hi')}}">Hindi</a>
    <a href="{{url('/about/punjabi')}}">Punjabi</a>
    <h1 class="text-center" >@lang('lang.about')</h1>
</body>
</html>