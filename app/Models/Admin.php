<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins'; // Ensure this matches your database table name

    protected $fillable = ['name', 'email', 'password']; // Define fillable fields
}