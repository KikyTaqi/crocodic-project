<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidate')->insert([
            [
                'id_job' => 1,
                'nama' => 'John Doe',
                'process' => 'interview_hr',
                'tags' => rand(0, 2),
                'domisili' => 'Jakarta',
                'gender' => 1,
                'usia' => 30,
                'pendidikan' => 'S1 Teknik Informatika',
                'layanan' => 'Full-time',
                'jabatan' => 'Software Engineer',
                'minat' => 'Backend Development',
                'status' => 'on_process_hire',
                'email' => 'john.doe@example.com',
                'no_hp' => '081234567890',
                'rating' => 4.5,
                'foto_profile' => 'cowo.jpg',
                'foto_cv' => 'cv1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_job' => 2,
                'nama' => 'Jane Smith',
                'process' => 'screening',
                'tags' => rand(0, 2),
                'domisili' => 'Bandung',
                'gender' => 0,
                'usia' => 28,
                'pendidikan' => 'S1 Desain Grafis',
                'layanan' => 'Freelance',
                'jabatan' => 'Graphic Designer',
                'minat' => 'UI/UX Design',
                'status' => 'waiting_approval_hire',
                'email' => 'jane.smith@example.com',
                'no_hp' => '081298765432',
                'rating' => 4.8,
                'foto_profile' => 'cewe.jpg',
                'foto_cv' => 'cv2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_job' => 3,
                'nama' => 'Michael Johnson',
                'process' => 'psikotest',
                'tags' => rand(0, 2),
                'domisili' => 'Surabaya',
                'gender' => 1,
                'usia' => 35,
                'pendidikan' => 'S2 Manajemen Bisnis',
                'layanan' => 'Part-time',
                'jabatan' => 'Business Analyst',
                'minat' => 'Data Analysis',
                'status' => 'done_hire',
                'email' => 'michael.johnson@example.com',
                'no_hp' => '081276543210',
                'rating' => 4.7,
                'foto_profile' => 'cowo.jpg',
                'foto_cv' => 'cv1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
