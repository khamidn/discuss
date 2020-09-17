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
        	'created_at' => now(),

        ]);

        $admin->assignRole('admin');

        for($i=1; $i<=5; $i++) {
        	$ahli =  User::create([
                'name' => 'Ahli'.$i,
                'email' => 'ahli'.$i.'@email.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'created_at' => now(),
            ]);

           $ahli->assignRole('ahli');


           $user =  User::create([
                'name' => 'User'.$i,
                'email' => 'user'.$i.'@email.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'created_at' => now(),
            ]);

           $user->assignRole('user');
        }
        
    }
}
