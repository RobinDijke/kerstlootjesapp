<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles')->insert([
            'name' => 'user'
        ]);

        \DB::table('roles')->insert([
            'name' => 'admin'
        ]);

        \App\Models\User::create(['name' => fake()->name(),
            'email' => 'f.vangils@curio.nl',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        \App\Models\User::factory(50)->create();

        \DB::table('groups')->insert([
            'owner_id' => 3,
            'budget' => 40.00,
            'name' => 'Kerstlootjes SSA3_WEB',
            'description' => 'Testgroep om te kijken of onze app een beetje werkt.',
            'event_date' => '2022-12-23 16:00:00',
        ]);

        \DB::table('group_user')->insert([
            [
                'group_id' => 1,
                'user_id'  => 3
            ],
            [
                'group_id' => 1,
                'user_id'  => 46,
            ],
            [
                'group_id' => 1,
                'user_id'  => 33
            ],
            [
                'group_id' => 1,
                'user_id'  => 28
            ],
            [
                'group_id' => 1,
                'user_id'  => 6
            ]
        ]);

    }
}
