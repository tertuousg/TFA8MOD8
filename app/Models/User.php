<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable {
 use Notifiable;
 protected $fillable=['username','full_name','email','password','avatar'];
 protected $hidden=['password','remember_token'];
 protected function casts(): array {return ['password'=>'hashed'];}
 public function getNameAttribute(): string {return $this->full_name;}
}
