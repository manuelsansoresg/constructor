<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = bcrypt('demor00txx!');
        $data_user = array(
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => $pass
        );
        $user = new User($data_user);
        $user->save();

    }
}
