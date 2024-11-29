<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nik_ish' => '00786733565',
                'name' => 'Nisa',
                'email' => 'nisa06@gmail.com',
                'password' => bcrypt('nisacookie'),
                'foto_profile' => 'user2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
