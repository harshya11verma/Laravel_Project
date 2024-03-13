<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
{
    public function index(){
        $url=url('/register');
        $title="Customer Registration";
        $data= compact('url','title');
        return view('register')->with($data);
    }
    public function store(Request $request){
       
    //    p($request->all());
    //    die;
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'password'=>'required|confirmed',
                'password_confirmation'=>'required'
            ]
        );
        echo "<pre>";
        print_r(($request->all()));
        $customers= new Register();
        $customers->name=$request['name'];
        $customers->email=$request['email'];
        $customers->dob=$request['dob'];
        $customers->password=md5( $request['password']);
        $customers->password_confirmation=md5( $request['password_confirmation']);
        $customers->status=$request['status'];
        $customers->save();
        return redirect('/register/view');
    }
    public function view(Request $request){
        
        $Search=$request['search'] ?? "";
       
        if($Search!=""){
            $customers= Register::where('name','like',"%$Search%")->get();
        }
        else{
            $customers= Register::all(); 
        }
        
        $customers= Register::paginate(15);
        $data=compact('customers','Search');
        return view('customer-view')->with($data);
    }
    public function trash(){
        $customers=Register::onlyTrashed()->get();
        $data=compact('customers');
        return view('customer-trash')->with($data);
    }
    public function restore($id){
        $customer=Register::withTrashed()->find($id);
        if($customer){
            $customer->restore();
        }
     return redirect('/register/view');

    }
    public function edit($id){
        $customer=Register::find($id);
        if(is_null($customer)){
          return redirect('/register/view');
        }
        else{
            $url=url('/register/update')."/".$id;
            $title="Update Customer";
           $data=compact('customer','url','title');
           return view('register')->with($data);
        }
    }
    public function update($id,Request $request){
        $customer=Register::find($id);
        $customer->name=$request['name'];
        $customer->email=$request['email'];
        $customer->dob=$request['dob'];
        $customer->password=md5( $request['password']);
        $customer->password_confirmation=md5( $request['password_confirmation']);
        $customer->status=$request['status'];
        $customer->save();
        return redirect('/register/view');


    }
    public function remove($id){
        
        $customer=Register::find($id);
        if($customer){
            $customer->delete();
        }
        // $customer = Register::find($id);
        // $customer->delete();
     return redirect('/register/view');
    }
    public function delete($id){
        
        $customer=Register:: withTrashed()->find($id);
        if($customer){
            $customer-> forceDelete();
        }
     return redirect('/register/trash');
    }
    

   
    }

