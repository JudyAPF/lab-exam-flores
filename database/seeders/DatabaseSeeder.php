<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Two test accounts
        $jflores = User::create([
            'name' => 'Judy Ann Flores',
            'email' => 'jflores@example.com',
            'password' => Hash::make('password123'),
        ]);

        $hroa = User::create([
            'name' => 'Hannah Keziah Roa',
            'email' => 'hroa@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Three courses
        $bsit = Course::create(['name' => 'BS Information Technology']);
        $bscs = Course::create(['name' => 'BS Computer Science']);
        Course::create(['name' => 'BS Information Systems']);

        // One sample student per user (useful for testing Edit/Delete permissions)
        Student::create([
            'name' => 'Marielle Santos',
            'email' => 'msantos@example.com',
            'course_id' => $bsit->id,
            'user_id' => $jflores->id,
        ]);

        Student::create([
            'name' => 'Kenji Reyes',
            'email' => 'kreyes@example.com',
            'course_id' => $bscs->id,
            'user_id' => $hroa->id,
        ]);
    }
}
