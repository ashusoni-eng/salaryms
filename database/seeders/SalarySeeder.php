<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salaries')->insert([
            'employee_id'=>'1',
            'month'=>'7',
            'year'=>'2024',
            'total_working_days'=>'21',
            'total_leave_taken'=>'4',
            'overtime'=>'2'            
        ]);
    }
}
