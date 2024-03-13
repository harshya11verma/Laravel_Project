<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
  </head>
  <body>
<h1>{{session()->get('username')}}</h1>
    <div class="container align-center">
      <a href="{{url('/reg')}}">
      <button name="button" class="btn btn-primary d-inline-block m-2 float-right">Add</button>
      </a>
      <a href="{{url('/register/view')}}">
        <button name="button" class="btn btn-success d-inline-block m-2 float-right">Customer View</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>D.O.B</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer )
                <tr>
                    <td scope="row"></td>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->dob}}</td>
                    <td>{{$customer->password}}</td>
                    <td>{{$customer->password_confirmation}}</td>
                    <td>
                      @if ($customer->status=="Active")
                      <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">InActive</span>
                      @endif
                    </td>
                    <td >
                      <a href="{{route('customer.Pdelete',['id'=>$customer->id])}}"><button class="badge badge-danger" >Delete</button></a>
                      <a href="{{route('customer.restore',['id'=>$customer->id])}}"><button class="badge badge-success" >Restore</button></a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
  </body>
</html>
