<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class UserController extends Controller {
 public function index(){return view('users.index',['users'=>User::latest()->get()]);}
 public function create(){return view('users.create');}
 public function store(Request $request){$data=$request->validate(['username'=>['required','string','max:100','unique:users,username'],'full_name'=>['required','string','max:255'],'email'=>['required','email','max:255','unique:users,email'],'password'=>['required','string','min:8','confirmed']]);User::create($data);return redirect()->route('users.index')->with('success','User created successfully.');}
 public function edit(User $user){return view('users.edit',compact('user'));}
 public function update(Request $request,User $user){
  $data=$request->validate(['username'=>['required','string','max:100',Rule::unique('users','username')->ignore($user->id)],'full_name'=>['required','string','max:255'],'email'=>['required','email','max:255',Rule::unique('users','email')->ignore($user->id)],'avatar'=>['nullable','image','mimes:jpg,jpeg,png,webp','max:2048']]);
  if($request->hasFile('avatar')){
   $manager=new ImageManager(new Driver());
   $image=$manager->read($request->file('avatar')->getRealPath());
   $image->cover(240,240);
   $encoded=$image->toJpeg(85);
   $path='avatars/'.(string) \Illuminate\Support\Str::uuid().'.jpg';
   Storage::disk('public')->put($path,(string)$encoded);
   if($user->avatar){Storage::disk('public')->delete($user->avatar);}
   $data['avatar']=$path;
  }
  $user->update($data);
  return redirect()->route('users.index')->with('success','User updated successfully.');
 }
 public function show(\App\Models\User $user){return view('users.show',compact('user'));}
 public function destroy(\App\Models\User $user){if(auth()->id()===$user->id){return back()->withErrors(['account'=>'You cannot delete your own account.']);} if($user->avatar){Storage::disk('public')->delete($user->avatar);} $user->delete();return redirect()->route('users.index')->with('success','User deleted.');}
}
