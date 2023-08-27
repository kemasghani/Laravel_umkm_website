<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        $users = [
            [
                'username' => 'adminumkmmaros_01',
                'password' => Hash::make('adminpendataan'),
                'role' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'adminumkmmaros_02',
                'password' => Hash::make('adminseleksi'),
                'role' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user',
                'password' => Hash::make('user'),
                'role' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($users);
    }
}
