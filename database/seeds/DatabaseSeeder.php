<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
            'name' => 'Kyle Defreitas',
            'email' => 'kyledef@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
