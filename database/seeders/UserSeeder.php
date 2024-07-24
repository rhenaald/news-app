<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::Create([
        //     'name' => 'ikhwan Kurniawan Julianto',
        //     'username' => "ikhwan-kurniawan",
        //     'email' => 'ikhwan@example.com',
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'two_factor_secret' => null,
        //     'two_factor_recovery_codes' => null,
        //     'remember_token' => Str::random(10),
        //     'profile_photo_path' => null,
        //     'current_team_id' => null,
        // ]);

        User::factory()->create([
            'name' => 'ikhwan Kurniawan Julianto',
            'email' => 'ikhwan@example.com',
        ]);
        
        User::factory()->create([
            'name' => 'Lutfi Fajar Salladin',
            'email' => 'lutfi@example.com',
        ]);

        User::factory(1)->create();
    }
}
