<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('customers')->insert(
            array(
                'active' => 1,
                'type'=>'Admin',
                'name' => 'super master',
                'code' => '123',
                'emails' => 'master@master.com',
                'user' => 'Admin',
                'password' => Hash::make('master'),
                'created_at' => new \Datetime(),
                'updated_at' => new \Datetime(),
            )
        );
    }
}
