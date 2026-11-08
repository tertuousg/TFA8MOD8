<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;
class DatabaseSeeder extends Seeder {
 public function run(): void {
  Customer::create(['full_name'=>'Maria Santos','email'=>'maria@example.com','phone'=>'09170000001']);
  Customer::create(['full_name'=>'Juan Dela Cruz','email'=>'juan@example.com','phone'=>'09170000002']);
  User::create(['username'=>'paulterence','full_name'=>'Paul Terence Guadalupe','email'=>'paul@example.com','password'=>'Password123!' ]);
  User::create(['username'=>'cashier01','full_name'=>'Alex Reyes','email'=>'alex@example.com','password'=>'Password123!' ]);
 }
}
