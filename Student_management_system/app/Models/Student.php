<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'studentId','address', 'mobile','age'];
    use HasFactory;
}
