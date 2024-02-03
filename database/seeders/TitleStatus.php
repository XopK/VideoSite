<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            ['title_status' => 'Нет ограничений'],
            ['title_status' => 'Нарушение'],
            ['title_status' => 'Теневая блокировка'],
            ['title_status' => 'Блокировка'],
        ]);
    }
}
