<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller {
 public function create(){return view('auth.login');}
 public function store(Request $request){
  $credentials=$request->validate(['email'=>['required','email'],'password'=>['required','string']]);
  if(!Auth::attempt($credentials,$request->boolean('remember'))){return back()->withErrors(['email'=>'The provided credentials are incorrect.'])->onlyInput('email');}
  $request->session()->regenerate();return redirect()->intended(route('customers.index'));
 }
 public function destroy(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}
