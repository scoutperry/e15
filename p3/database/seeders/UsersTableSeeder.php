<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            # Note the use of the `updateOrCreate` Eloquent method
            # This is useful here because the email for each user has to be unique
            $user = User::updateOrCreate(
                ['email' => 'jill@harvard.edu', 'name' => 'Jill Harvard'],
                ['password' => Hash::make('helloworld')
            ]);
            
            $user = User::updateOrCreate(
                ['email' => 'jamal@harvard.edu', 'name' => 'Jamal Harvard'],
                ['password' => Hash::make('helloworld')
            ]);

            $user = User::updateOrCreate(
                ['email' => 'scout.perry@gmail.com', 'name' => 'Scout Perry'],
                ['password' => Hash::make('asdfasdf')
            ]);
        }
    }
}