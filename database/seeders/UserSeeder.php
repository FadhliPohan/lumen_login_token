<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     

    public function run()
    {
              $user = User::factory()->create([
            'name' => 'Example user',
            'email' => 'user@mail.com',
            'phone' => '03434243434',
            'address' => 'jakrta',
            'phone' => '03434243434',
            'password' => password_hash('password', PASSWORD_BCRYPT)
            // 'password' => Hash::make('12345678')
        ]);
      
   
    }
}
