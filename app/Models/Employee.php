<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $primaryKey= "id";
    protected $fillable = [
        'name', 'email', 'mobile', 'address' , 'base_salary'
    ];

    function salary(){
        return $this->hasMany(Salary::class,'employee_id','id');
    }
}
