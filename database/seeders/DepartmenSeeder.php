<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $departments =[
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Iformation Technology Department',
                'department_code' => 'IT',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Human Resource Department',
                'department_code' => 'HR',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Logistic Department',
                'department_code' => 'LOG',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Finance Department',
                'department_code' => 'IT',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Marketing Department',
                'department_code' => 'MR',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Operasional Department',
                'department_code' => 'OP',
                'created_at' => now(),
            ],
            [
                 'id' => (string) Str::uuid(),
                'department_name' => 'Production Department',
                'department_code' => 'PO',
                'created_at' => now(),
            ],
        ];
    }
}
