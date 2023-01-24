<?php

use App\Models\User;
use App\Models\UserTemplate;
use Illuminate\Database\Seeder;
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
        $admin = UserTemplate::where("name", '=', 'admin')->first();

        $this->rootUser($admin);

    }


    public function rootUser($template)
    {
        $rootUser                 = new User;
        $rootUser->username       = "admin";
        $rootUser->email          = "saloodo@admin.com";
        $rootUser->password       = Hash::make('123456');
        $rootUser->remember_token = str_random(10);
        $rootUser->template()->associate($template);
        $rootUser->save();
    }

}
