<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        //
          /**
         * Run the database seeds.
         *
         * @return void
         */
        $user = new User();
        $user->first_name = 'Super';
        $user->last_name = 'Admin';
        $user->email = 'superadmin@admin.com';
        $user->username = 'superadmin';
        $user->phone_number = '256778296611';
        $user->address = 'admin';
        $user->status = 0;
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->user_id = 1;
        $user->password = Hash::make('12345678');
        $user->save();

    }
}
