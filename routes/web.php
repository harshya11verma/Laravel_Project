<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo;
use App\Http\Controllers\SingleAction;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/",[Demo::class,'index1'])->name('index.home');
Route::get("/about/{lang?}",function($lang=null){
    App::setLocale($lang);
return view('about');
});
Route::get("/no-access",function(){
    return view('no-access');
});
//Protected
Route::get("/register/view",[CustomerController::class,'view'])->middleware('check');
Route::get("/register/trash",[CustomerController::class,'trash'])->middleware('check');
//----------------------------------------------
Route::get('/login',function(){
    session()->put('user_id',1);
    session()->put('user_age',20);
    return redirect('/');
  
});
Route::get('/logout',function(){
    session()->forget('user_id');
    session()->forget('user_age');
    return redirect()->back();
  
});
//----------------------------------------------
Route::get("/courses",SingleAction::class);
Route::group(['prefix'=>'/register'],function(){
    Route::get("/",[CustomerController::class,'index']);
    Route::post("/",[CustomerController::class,'store']);
   
    Route::get("/delete/{id}",[CustomerController::class,'remove'])->name('customer.delete');
    Route::get("/forced-delete/{id}",[CustomerController::class,'delete'])->name('customer.Pdelete');
    Route::get("/restore/{id}",[CustomerController::class,'restore'])->name('customer.restore');
    Route::get("/edit/{id}",[CustomerController::class,'edit'])->name('customer.edit');
    Route::post("/update/{id}",[CustomerController::class,'update'])->name('customer.update');
});



Route::resource("/photo",PhotoController::class);
Route::get('/customers',function(){
    $customers=Customer::all();
    echo "<pre>";
    print_r($customers->toArray());
});
Route::get('get-all-session',function(){
$session=session()->all();
p($session);
});
Route::get('set-session',function(Request $request){
    $request->session()->put('username','Harshya');
    $request->session()->put('email','harshya@abc');
    $request->session()->put('password','harsh');
    return redirect('get-all-session');
});
Route::get('destroy-session',function(){
         session()->forget('username');
         session()->forget('password');
         return redirect('get-all-session');
});