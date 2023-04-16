<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
   protected $table = 'tblusers';
// column sa table
   protected $fillable = [
    'fullname', 'password', 'email'
    ];

   public $timestamps = false;
   protected $primaryKey = 'id';

   protected $hidden = ['password'];
}