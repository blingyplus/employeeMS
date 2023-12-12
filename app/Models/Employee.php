<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'firstname', 'lastname', 'phone', 'email'];

    protected static function booted()
    {
        static::creating(function ($employee) {
            $employee->uuid = Str::uuid();
        });
    }
}
