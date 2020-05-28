<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
          'nama'         => 'admin',
          'email'        => 'admin@perumda.com',
          'password'     => Hash::make('123456'),
          'hak_akses'    => 80,
          'bidang_usaha' => ''
          
        ]);
    }
}
