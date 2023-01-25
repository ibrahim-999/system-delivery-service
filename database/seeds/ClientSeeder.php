<?php

use App\Models\Client;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            "name" => "Ali",
            "trade_name" => "Ali trade",
            "password" => Hash::make('123456'),
            "phone_number" => 0114326456,
            "email" => "ali@mail.com",
            "address_country" => "ain shams",
            "address_city" => "ain shams",
            "address_sub" => "ain shams",
            "address_pickup_text" => "ain shams",
            "address_maps" => "ain shams",
            "address_pickup_maps" => "ain shams",
            "url_facebook" => "facebook.com",
            "url_instagram" => "insta.com",
            "sector" => "sector",
            "category" => null,
            "bank_name" => "alahly",
            "bank_account_number" => 112154689,
            "bank_holder_name" => "Ali",
            "bank_iban" => "iban",
            "zone_id" => 1
        ]);
    }
}
