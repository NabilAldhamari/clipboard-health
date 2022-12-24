<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
        $users = [["username" => "nabil", "password" => "supersecret", "token" => "976ed9579b72d74d80c752e04df2bfee"]];

        foreach ($users as $user) {
            dump($user);
            User::query()->updateOrCreate([
                'username' => $user['username'],
                'password' => Hash::make($user['password']),
                'token' => $user['token']
            ]);
        }
    }
}