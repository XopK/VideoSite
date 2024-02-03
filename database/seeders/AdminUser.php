<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = Carbon::now();
        DB::table('users')->insert([
            'login' => 'admin',
            'email' => 'dmahmutov12@gmail.com',
            'id_role' => 1,
            'password' => Hash::make('dmahmutov12@gmail.com'),
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);
    }
}
