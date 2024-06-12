<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $primaryLey= "id";
    protected $fillable = [
        'name', 'email', 'mobile', 'address' , 'base_salary'
    ];
}
