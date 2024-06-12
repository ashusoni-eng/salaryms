<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'name'=>'Amit', 
            'email'=>'amit@email.com',
            'mobile'=>'9999999999',
            'address'=>'Gwalior' ,
            'base_salary'=>'50000'
        ]);
    }
}
