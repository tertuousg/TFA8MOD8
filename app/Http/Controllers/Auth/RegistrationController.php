<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegistrationController extends Controller {
 public function create(){return view('auth.register');}
 public function store(Request $request){
  $data=$request->validate(['username'=>['required','string','max:100','unique:users,username'],'full_name'=>['required','string','max:255'],'email'=>['required','email','max:255','unique:users,email'],'password'=>['required','string','min:8','confirmed']]);
  $user=User::create($data);Auth::login($user);$request->session()->regenerate();return redirect()->route('customers.index');
 }
}
