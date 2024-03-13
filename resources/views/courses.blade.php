<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        select{
            text-align: center;
            margin: auto;
            padding: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to Courses Page</h1>
    <h2>Here is list of courses</h2>
    @php
        $arr=["Introduction to Python Programming",
    "Data Structures and Algorithms",
    "Machine Learning Fundamentals",
    "Web Development with Django",
    "Database Management",
    "Artificial Intelligence Ethics",
    "Mobile App Development",
    "Cybersecurity Fundamentals",
    "Digital Marketing Strategies",
    "UI/UX Design Principles"];
    @endphp
    <select>
        
        @foreach ($arr as $course )
            <option>{{$course}}</option>
        @endforeach
   
</select>
</body>
</html>