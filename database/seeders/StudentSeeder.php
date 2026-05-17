<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['name' => 'Hana Benali', 'email' => 'hana@edutrack.ma', 'phone' => '0661000001', 'city' => 'Tétouan', 'level' => 'Advanced'],
            ['name' => 'Youssef Alami', 'email' => 'youssef@edutrack.ma', 'phone' => '0662000002', 'city' => 'Casablanca', 'level' => 'Intermediate'],
            ['name' => 'Sara El Idrissi', 'email' => 'sara@edutrack.ma', 'phone' => null, 'city' => 'Rabat', 'level' => 'Beginner'],
            ['name' => 'Amine Tazi', 'email' => 'amine@edutrack.ma', 'phone' => '0663000003', 'city' => 'Fès', 'level' => 'Advanced'],
            ['name' => 'Fatima Zahrae', 'email' => 'fatima@edutrack.ma', 'phone' => null, 'city' => 'Marrakech', 'level' => 'Beginner'],
            ['name' => 'Omar Bensalah', 'email' => 'omar@edutrack.ma', 'phone' => '0664000004', 'city' => 'Tanger', 'level' => 'Intermediate'],
            ['name' => 'Nadia Chraibi', 'email' => 'nadia@edutrack.ma', 'phone' => '0665000005', 'city' => 'Agadir', 'level' => 'Advanced'],
            ['name' => 'Khalid Mansouri', 'email' => 'khalid@edutrack.ma', 'phone' => null, 'city' => 'Oujda', 'level' => 'Beginner'],
            ['name' => 'Zineb Hamdouni', 'email' => 'zineb@edutrack.ma', 'phone' => '0666000006', 'city' => 'Casablanca', 'level' => 'Intermediate'],
            ['name' => 'Rachid El Fassi', 'email' => 'rachid@edutrack.ma', 'phone' => '0667000007', 'city' => 'Tétouan', 'level' => 'Advanced'],
        ];

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['email' => $student['email']],
                $student + ['photo' => null]
            );
        }
    }
}
