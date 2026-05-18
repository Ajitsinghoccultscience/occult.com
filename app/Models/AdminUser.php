<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table    = 'admin_users';
    protected $hidden   = ['password'];
    protected $fillable = ['name', 'email', 'password', 'role', 'whatsapp_phone_number_id'];
}
