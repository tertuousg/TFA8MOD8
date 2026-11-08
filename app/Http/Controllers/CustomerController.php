<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class CustomerController extends Controller {
 public function index(){return view('customers.index',['customers'=>Customer::latest()->get()]);}
 public function create(){return view('customers.create');}
 public function store(Request $request){$data=$request->validate(['full_name'=>['required','string','max:255'],'email'=>['required','email','max:255'],'phone'=>['nullable','string','max:30']]);Customer::create($data);return redirect()->route('customers.index')->with('success','Customer created successfully.');}
 public function edit(Customer $customer){return view('customers.edit',compact('customer'));}
 public function update(Request $request,Customer $customer){$data=$request->validate(['full_name'=>['required','string','max:255'],'email'=>['required','email','max:255'],'phone'=>['nullable','string','max:30']]);$customer->update($data);return redirect()->route('customers.index')->with('success','Customer updated successfully.');}
 public function show(\App\Models\Customer $customer){return view('customers.show',compact('customer'));}
 public function destroy(\App\Models\Customer $customer){$customer->delete();return redirect()->route('customers.index')->with('success','Customer deleted.');}
}
