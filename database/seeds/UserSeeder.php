<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@email.com',
        	'email_verified_at' => now(),
        	'password' => bcrypt(12345678),

        ]);

        $admin->assignRole('admin');

        $user = User::create([
        	'name' => 'User',
        	'email' => 'user@email.com',
        	'email_verified_at' => now(),
        	'password' => bcrypt(12345678),

        ]);

        $user->assignRole('user');
    }
}
