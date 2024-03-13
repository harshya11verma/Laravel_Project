<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa; /* Light gray background color */
      }
      form {
        background-color: #ffffff; /* White background color */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Shadow effect */
      }
      </style>
</head>
<body>
   
    <h1>{{$title}}</h1>
    <form method="POST" action="{{$url}}">
        {{-- {{url('/')}}/register --}}
        @csrf
     
         <x-input type="text" name="name" label="Name:" value="{{$customer->name}}"/>
         <x-input type="email" name="email" label="Email:" value="{{$customer->email}}" />
         <x-input type="date" name="dob" label="D.O.B:" value="{{$customer->dob}}" />
         <x-input type="password" name="password" label="Password:" value=""/>
         <x-input type="password" name="password_confirmation" label="Confirm Password:" value=""/>
         <x-input type="text" name="status" label="Status:" value="" />
         
        <button type="submit">Register</button>
    </form>
</body>
</html>















{{-- <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{old('name')}}"><br>
       <span class="text-danger"> @error('name')
            {{$message}}
        @enderror
       </span>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{old('email')}}"><br>
        <span class="text-danger"> @error('email')
            {{$message}}
        @enderror
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <span class="text-danger"> @error('password')
            {{$message}}
        @enderror
    <label for="password_confirmation">Confirm Password:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>
        <span class="text-danger"> @error('password')
            {{$message}}
        @enderror --}}
      